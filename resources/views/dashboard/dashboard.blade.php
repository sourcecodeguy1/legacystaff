@extends('layouts.app')

@section('content')

    {{------------------------------------------Layout Content-----------------------------------}}

    @foreach($data as $datas)
        <div class="p-3 mb-2 bg-secondary text-white text-center"><strong>{!! $datas->message_board !!}</strong></div>
        <div class="p-3 mb-2 bg-secondary text-white text-center">
            <p>
                {!! $datas->quote_message !!}
            </p>
        </div>
    @endforeach

    {{--<div class="text-center p-3 mb-2 bg-secondary text-white"><strong>Week 2</strong> 7/31 - 8/02</div>--}}
    <div class="row container">
        <div class="card" style="width: 20rem;">
            <img src="{{ asset('staff2019/staff2019.jpg') }}" class="card-img-top img-thumbnail" alt="...">
            <div class="card-body">
                @foreach($data as $datas)
                <h5 class="card-title">{!! $datas->staff_picture_title !!}</h5>
                <p class="card-text">{!! $datas->staff_picture_year !!}</p>
                    @endforeach
            </div>
        </div>

        <div class="col-lg-8">
            <table class="table table-responsive">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center" colspan="6">{{$datas->week_of.' '. $datas->week_of_date}}</th>
                </tr>
                <tr>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                    <th scope="col">Saturday</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $datas)
                    <tr>
                        <td>{!! $datas->Monday !!}</td>
                        <td>{!! $datas->Tuesday !!}</td>
                        <td>{!! $datas->Wednesday !!}</td>
                        <td>{!! $datas->Thursday !!}</td>
                        <td>{!! $datas->Friday !!}</td>
                        <td>{!! $datas->Saturday !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="eventDeleteMessage" class="alert alert-success alert-dismissible fade show col-lg-7" style="margin-left: 340px; display: none">
                Event Deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="col-lg-8" style="margin-left: 325px;">
                <div id="calendar"></div>
            </div>
        </div>
        @include('inc/fullcalendartemplate')
    </div>
    <br />
    <div class="container">
        <div class="row" style="margin-left: 325px;">
            @if(Auth::user()->privilege_type === 'admin')
                <div class="col-lg-11"><a href="/dashboard/{{$datas->id}}/edit" class="btn btn-success btn-block">Edit</a></div>
            @endif
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <!-------CDN includes-------->
    {{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>--}}
    <!--======================--->
@endsection
