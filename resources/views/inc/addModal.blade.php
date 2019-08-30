<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <form class="form-horizontal">

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
                        <label for="datepicker" class="col-sm-4 control-label">Start date</label>
                        <div class="col-sm-10">
                            <input type="text" name="datepicker" class="form-control" id="datepicker" width="276">
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4'
                                });
                            </script>
                        </div>
                        <br />
                        <div class="container">
                            <div class="row">

                                <div class="col-sm-4">
                                    <label for="start_hour" class="col-sm-4 control-label">Hour</label>
                                    <select name="start_hour" class="form-control" id="start_hour">

                                        <option value="">Choose</option>
                                        <option  value="1">1</option>
                                        <option  value="2">2</option>
                                        <option  value="3">3</option>
                                        <option  value="4">4</option>
                                        <option  value="5">5</option>
                                        <option  value="6">6</option>
                                        <option  value="7">7</option>
                                        <option  value="8">8</option>
                                        <option  value="9">9</option>
                                        <option  value="10">10</option>
                                        <option  value="11">11</option>
                                        <option  value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="start_minute" class="col-sm-4 control-label">Minute</label>
                                    <select name="start_minute" class="form-control" id="start_minute">

                                        <option value="">Choose</option>
                                        <option value="00">:00</option>
                                        <option value="15">:15</option>
                                        <option value="30">:30</option>
                                        <option value="45">:45</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">

                                    <label for="start_am_pm" class="control-label">AM-PM</label>

                                    <select name="start_am_pm" class="form-control" id="start_am_pm">

                                        <option value="">Choose</option>
                                        <option  value="AM">AM</option>
                                        <option  value="PM">PM</option>

                                    </select>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datepicker2" class="col-sm-4 control-label">End date</label>
                        <div class="col-sm-10">
                            <input type="text" name="datepicker2" class="form-control" id="datepicker2" width="276">
                            <script>
                                $('#datepicker2').datepicker({
                                    uiLibrary: 'bootstrap4'
                                });
                            </script>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">

                            <div class="col-sm-4">
                                <label for="end_hour" class="col-sm-4 control-label">Hour</label>
                                <select name="end_hour" class="form-control" id="end_hour">

                                    <option value="">Choose</option>
                                    <option  value="1">1</option>
                                    <option  value="2">2</option>
                                    <option  value="3">3</option>
                                    <option  value="4">4</option>
                                    <option  value="5">5</option>
                                    <option  value="6">6</option>
                                    <option  value="7">7</option>
                                    <option  value="8">8</option>
                                    <option  value="9">9</option>
                                    <option  value="10">10</option>
                                    <option  value="11">11</option>
                                    <option  value="12">12</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="end_minute" class="col-sm-4 control-label">Minute</label>
                                <select name="end_minute" class="form-control" id="end_minute">

                                    <option value="">Choose</option>
                                    <option value="00">:00</option>
                                    <option value="15">:15</option>
                                    <option value="30">:30</option>
                                    <option value="45">:45</option>

                                </select>
                            </div>
                            <div class="col-sm-4">

                                <label for="end_am_pm" class="control-label">AM-PM</label>

                                <select name="end_am_pm" class="form-control" id="end_am_pm">

                                    <option value="">Choose</option>
                                    <option  value="AM">AM</option>
                                    <option  value="PM">PM</option>

                                </select>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnAddEvent" class="btn btn-primary">Add Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
