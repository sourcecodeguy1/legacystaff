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

            @if(Auth::user()->privilege_type === 'admin')
                <div class=""><a href="/dashboard/{{$datas->id}}/edit" class="btn btn-success btn-block">Edit</a></div><br />
                @endif
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
@endsection
