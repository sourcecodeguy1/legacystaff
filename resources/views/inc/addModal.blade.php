<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <form class="form-horizontal" method="POST" action="{!! action('TasksController@store') !!}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="color">
                                <option value="">Choose</option>
                                <option style="color:#03A9F3;" value="#03A9F3">&#9724; Light blue</option>
                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                <option style="color:#000;" value="#000">&#9724; Black</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start" class="col-sm-4 control-label">Start date</label>
                        <div class="col-sm-10">
                            <input type="text" name="start" class="form-control" id="start" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end" class="col-sm-4 control-label">End date</label>
                        <div class="col-sm-10">
                            <input type="text" name="end" class="form-control" id="end" readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>