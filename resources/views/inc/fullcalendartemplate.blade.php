@include('inc/addModal')
@include('inc/editModal')
<script>
    $(document).ready(function() {
        /*let edit_id;
        let edit_title;
        let edit_color;*/

        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            plugins: [ 'dayGrid', 'timeGrid' ],
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },

            defaultView: 'month',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end){
                // Call Add Model Here
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },

            eventClick: function(event) {

                $('#ModalEdit #id').val(event.id);
                $('#ModalEdit #title').val(event.title);
                $('#ModalEdit #color').val(event.color);
                $('#ModalEdit').modal('show');

            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);
                //alert("Hello World");

            },
            events : [
                    <?php
                    foreach ($tasks as $task){
                    $start = explode(" ", $task['start']);
                    $end = explode(" ", $task['end']);
                    if($start == '00:00:00'){
                        $start = $start[0];
                    }else{
                        $start = $task['start'];
                    }
                    if($end == '00:00:00'){
                        $end = $end[0];
                    }else{
                        $end = $task['end'];
                    }

                    ?>
                {
                    id: '<?php echo $task['id']; ?>',
                    title: '<?php echo addslashes($task['title']); ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $task['color']; ?>',
                },
                <?php } ?>
            ],
            eventRender: function(event, element, view) {

                // Display the tooltip only in Month view!!!
                if(view.type === 'month'){
                    $(element).tooltip({title: event.title, color: event.color});
                }

                /*$(element).on('mouseenter', function () {
                    alert([event.start, event.end]);
                });*/
            }
        });

        function edit(event){

           start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }

           let id =  event.id;

            let _id = id;
            let _start  = start;
            let _end = end;

            //let url = 'tasks/update?'+"id="+_id+"&"+"start="+_start+"&"+"end="+_end;
            console.log("Current Event id: " + _id + " Current Event Start: " + _start + " Current Event end " + _end);

            //let url = "{{--{{$url === '9th_grade' ? 'NineGradeTasks/update' : 'tasks/update'}}--}}";
            let url = "{{$url === '9th_grade' ? route('NineGradeTasks.update', ':id') : route('tasks.update', ':id')}}";
            url = url.replace(':id', _id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                dataType: "JSON",
                method: "PUT",
                data: {"id": _id, "start":_start, "end": _end},
                success: function(data) {
                    //alert('Event updated');
                    console.log(data);
                    if(data.status === 200){
                        alert('Event updated');
                    }else{
                        alert('Could not be saved. Try again.');
                    }
                }
            });
        }

        $(window).keydown(function(event){
            if(event.keyCode === 13) {
                event.preventDefault();
                return false;
            }
        });

        $('#btnAddEvent').on('click', function (e) {
            e.preventDefault();

            let formData = {
                title : $('#ModalAdd #title').val(),
                color : $('#ModalAdd #color').val(),
                start : $('#ModalAdd #start').val(),
                end : $('#ModalAdd #end').val()
            };

            if(formData.title !== ""){

                let url = "{{$url === '9th_grade' ? route('NineGradeTasks.store') : route('tasks.store')}}";

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    dataType: "JSON",
                    method: "POST",
                    data: formData,
                    success: function (data) {
                        if (data.status === 200) {

                            $('#ModalAdd #title').val('');
                            $('#ModalAdd #color').val('');
                            $('#ModalAdd').modal('hide');

                            $('#calendar').fullCalendar( 'renderEvent', data.allData );

                        } else {
                            alert('Could not be saved. Try again.');
                        }
                    }
                });
            }else {
                alert('Please enter a title');
            }

        });

        $('#btnSaveChanges').on('click', function (e) {
            e.preventDefault();

            let data = {
                edit_id : $('#ModalEdit #id').val(),
                title : $('#ModalEdit #title').val(),
                color : $('#ModalEdit #color').val()
            };
            if(data.title !== "") {
                //let url = 'tasks/' + data.edit_id + '/edit';
                //let url = '{{--{!! action('TasksController@edit', ':id') !!}--}}';
                let url = "{{$url === '9th_grade' ? route('NineGradeTasks.edit', ':id') : route('tasks.edit', ':id')}}";
                url = url.replace(':id', data.edit_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    dataType: "JSON",
                    method: "GET",
                    data: data,
                    success: function (data) {
                        //alert('Event updated');
                        console.log(data);
                        if (data.status === 200) {
                            $('#ModalEdit').modal('hide');

                            location.reload(true);

                        } else {
                            alert('Could not be saved. Try again.');
                        }
                    }
                });
            } else {
                alert('Please enter a title');
            }
        });
        /**========================DELETE AJAX CALL=======================================**/

        $('#btnDelete').on('click', function (e) {
            e.preventDefault();

            let data = {
                delete_id : $('#ModalEdit #id').val(),
                title : $('#ModalEdit #title').val(),
                color : $('#ModalEdit #color').val()
            };
            //console.log(data.delete_id);
            let url = "{{$url === '9th_grade' ? route('NineGradeTasks.destroy', ':id') : route('tasks.destroy', ':id')}}";
            url = url.replace(':id', data.delete_id);


            /*$('#calendar').fullCalendar('removeEvents',data.delete_id);
            $('#ModalEdit').modal('hide');*/

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                dataType: "JSON",
                method: "DELETE",
                data: data,
                success: function (data2) {

                    if (data2.status === 200) {
                        $('#calendar').fullCalendar('removeEvents',data.delete_id);
                        $('#ModalEdit').modal('hide');
                        /*setTimeout(function () {
                            location.reload(true);
                        },1000);*/
                    } else {
                        alert('Could not delete. Try again.');
                    }
                }
            });

        });

    });
</script>
