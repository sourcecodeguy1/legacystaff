@extends('layouts.app')

@section('content')

    {{------------------------------------------Layout Content-----------------------------------}}

    @foreach($data as $datas)
        <div class="container">
            {{--<div class="row">
                <div class="" style="width: 100%;">
                    <div class="p-3 mb-2 bg-secondary text-white text-center"><strong>{!! $datas->message_board !!}</strong></div>
                </div>
            </div>--}}
            <div class="row">
                <div class="" style="width: 100%;">
                   {{-- <div class="p-3 mb-2 bg-secondary text-white"><p></p></div>--}}
                    {!! $datas->quote_message !!}
                </div>
            </div>
        </div>
    @endforeach

    <div class="">
        <div class="row">
        <div class="col-lg-4">
            <div class="card" {{--style="width: 20rem;"--}}>
                <img src="{{ asset('staff2019/staff2019.jpg') }}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    @foreach($data as $datas)
                        <h5 class="card-title">{!! $datas->staff_picture_title !!}</h5>
                        <p class="card-text">{!! $datas->staff_picture_year !!}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="p-3 mb-2 bg-dark text-white text-center">{{$datas->week_of.' '. $datas->daterange}}</div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-Monday-tab" data-toggle="tab" href="#nav-Monday" role="tab" aria-controls="nav-Monday" aria-selected="true">{!! $datas->tab_1 !!}</a>
                    <a class="nav-item nav-link" id="nav-Tuesday-tab" data-toggle="tab" href="#nav-Tuesday" role="tab" aria-controls="nav-Tuesday" aria-selected="false">{!! $datas->tab_2 !!}</a>
                    <a class="nav-item nav-link" id="nav-Wednesday-tab" data-toggle="tab" href="#nav-Wednesday" role="tab" aria-controls="nav-Wednesday" aria-selected="false">{!! $datas->tab_3 !!}</a>
                    <a class="nav-item nav-link" id="nav-Thursday-tab" data-toggle="tab" href="#nav-Thursday" role="tab" aria-controls="nav-Thursday" aria-selected="false">{!! $datas->tab_4 !!}</a>
                    <a class="nav-item nav-link" id="nav-Friday-tab" data-toggle="tab" href="#nav-Friday" role="tab" aria-controls="nav-Friday" aria-selected="false">{!! $datas->tab_5 !!}</a>
                    <a class="nav-item nav-link" id="nav-Saturday-tab" data-toggle="tab" href="#nav-Saturday" role="tab" aria-controls="nav-Saturday" aria-selected="false">{!! $datas->tab_6 !!}</a>
                </div>
            </nav>
            <br />
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-Monday" role="tabpanel" aria-labelledby="nav-Monday-tab">{!! $datas->Monday !!}</div>
                <div class="tab-pane fade" id="nav-Tuesday" role="tabpanel" aria-labelledby="nav-Tuesday-tab">{!! $datas->Tuesday !!}</div>
                <div class="tab-pane fade" id="nav-Wednesday" role="tabpanel" aria-labelledby="nav-Wednesday-tab">{!! $datas->Wednesday !!}</div>
                <div class="tab-pane fade" id="nav-Thursday" role="tabpanel" aria-labelledby="nav-Thursday-tab">{!! $datas->Thursday !!}</div>
                <div class="tab-pane fade" id="nav-Friday" role="tabpanel" aria-labelledby="nav-Friday-tab">{!! $datas->Friday !!}</div>
                <div class="tab-pane fade" id="nav-Saturday" role="tabpanel" aria-labelledby="nav-Saturday-tab">{!! $datas->Saturday !!}</div>
            </div>

        </div>

    </div>
    </div>
    <br />
    {{---------------------------------EDIT BUTTON AND CALENDAR---------------------------------}}
    <div class="">

        <div class="row">
            <div class="col-lg-4"></div>
             @if(Auth::user()->privilege_type === 'admin')
            <div class="col-lg-8"><a href="{{url('/dashboard')}}/{{$datas->id}}/edit" class="btn btn-success btn-block">Edit</a></div>
        @endif
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" name="dashboard_card_link">
                       {{-- <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                        {!! $datas->dashboard_card_links !!}
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-body" name="dashboard_card_contacts">
                       {{-- <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                        {!! $datas->dashboard_card_contacts !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-8 ">
                <br />
                <div id="calendar"></div>
            </div>

        </div>{{--End of row--}}
        <br />

    </div>
        @include('inc/fullcalendartemplate')

    <br />
    <br />
    <br />
    <br />
    <br />
    <!-------Include jQuery File Here-------->

    <!--===================================--->
@endsection
