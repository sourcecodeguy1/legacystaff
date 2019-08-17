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
            ]
        });

        function edit(event){

            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }

            id =  event.id;
            //console.log(event.id);
            /*Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;*/

            let _id = id;
            let _start  = start;
            let _end = end;

            //let url = 'tasks/update?'+"id="+_id+"&"+"start="+_start+"&"+"end="+_end;
            console.log("Current Event id: " + _id + " Current Event Start: " + _start + " Current Event end " + _end);

            let url = 'tasks/update';
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
                    //console.log(data);
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
        $('#btnSaveChanges').on('click', function (e) {
            e.preventDefault();

            let data = {
                edit_id : $('#ModalEdit #id').val(),
                title : $('#ModalEdit #title').val(),
                color : $('#ModalEdit #color').val()
            };
            if(data.title !== "") {
                //let url = 'tasks/' + data.edit_id + '/edit';
                let url = '{!! action('TasksController@edit', ':id') !!}';
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

            let url = 'tasks/destroy';
            //url = url.replace(':id', data.edit_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                dataType: "JSON",
                method: "DELETE",
                data: data,
                success: function (data) {
                    //alert('Event updated');
                    console.log(data);
                    if (data.status === 200) {
                        $('#ModalEdit').modal('hide');
                        $('#eventDeleteMessage').css('display','block');
                        setTimeout(function () {
                            location.reload(true);
                        },1000)


                    } else {
                        alert('Could not delete. Try again.');
                    }
                }
            });

        });

    });
</script>
