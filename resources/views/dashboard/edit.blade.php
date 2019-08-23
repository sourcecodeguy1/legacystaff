@extends('layouts.app')

@section('content')
@if(Auth::user()->privilege_type === 'admin')
    <form action="{!! action('DashboardController@update',$dashboard_edit->id) !!}" method="POST">

        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <div class="row">
            <div class="col-lg-6">
                <label for="week_of">Week of (Ex. Week 2)</label>
                <input type="text" name="week_of" id="week_of" class="form-control" value="{{$dashboard_edit->week_of}}" placeholder="Ex. Week 2">
            </div>

            <div class="col-lg-6">
                <label for="week_of_date">Week of Date (Ex. 7/30-8/03) </label>
                <input type="text" name="week_of_date" id="week_of_date" class="form-control" value="{{$dashboard_edit->week_of_date}}" placeholder="Enter week date">
            </div>
        </div>

        <br />
        <div class="row">

            <div class="col-lg-12">
                <label for="article-ckeditor1">Message Board</label>
                <textarea style="resize: none" class="form-control" name="quote_message" id="article-ckeditor1" rows="3" placeholder="Enter a quote">{{$dashboard_edit->quote_message}}</textarea>
            </div>

        </div>

        <br />

        <div class="row">

            <div class="col-lg-4">
                <label for="article-ckeditor2">SHOUT OUTS</label>
                <textarea class="form-control" name="Monday" id="article-ckeditor2" rows="3" placeholder="Enter content">{{$dashboard_edit->Monday}}</textarea>
            </div>

            <div class="col-lg-4">
                <label for="article-ckeditor3">DATA HIGHLIGHTS</label>
                <textarea class="form-control" name="Tuesday" id="article-ckeditor3" rows="3" placeholder="Enter content">{{$dashboard_edit->Tuesday}}</textarea>
            </div>

            <div class="col-lg-4">
                <label for="article-ckeditor4">WEEK UPDATES</label>
                <textarea class="form-control" name="Wednesday" id="article-ckeditor4" rows="3" placeholder="Enter content">{{$dashboard_edit->Wednesday}}</textarea>
            </div>

        </div>

        <br />

        <div class="row">

            <div class="col-lg-4">
                <label for="article-ckeditor5">SAVE THE DATES</label>
                <textarea class="form-control" name="Thursday" id="article-ckeditor5" rows="3" placeholder="Enter content">{{$dashboard_edit->Thursday}}</textarea>
            </div>

            <div class="col-lg-4">
                <label for="article-ckeditor6">PILAR ACTION ITEMS</label>
                <textarea class="form-control" name="Friday" id="article-ckeditor6" rows="3" placeholder="Enter content">{{$dashboard_edit->Friday}}</textarea>
            </div>

            <div class="col-lg-4">
                <label for="article-ckeditor7">EXPO ACTION ITEMS</label>
                <textarea class="form-control" name="Saturday" id="article-ckeditor7" rows="3" placeholder="Enter content">{{$dashboard_edit->Saturday}}</textarea>
            </div>

        </div>

        <br />

        <div class="row">

            {{--<div class="col-lg-4">
                <label for="article-ckeditor8">Theme</label>
                <textarea class="form-control" name="message_board" id="article-ckeditor8" rows="3" placeholder="Enter message board">{{$dashboard_edit->message_board}}</textarea>
            </div>--}}

            <div class="col-lg-4">
                <label for="article-ckeditor8">Staff Picture Title</label>
                <textarea class="form-control" name="staff_picture_title" id="article-ckeditor8" rows="3" placeholder="Enter a title for your staff picture">{{$dashboard_edit->staff_picture_title}}</textarea>
            </div>

            <div class="col-lg-4">
                <label for="article-ckeditor9">Staff Picture Secondary Title</label>
                <textarea class="form-control" name="staff_picture_year" id="article-ckeditor9" rows="3" placeholder="Enter secondary title for your staff picture">{{$dashboard_edit->staff_picture_year}}</textarea>
            </div>

        </div>
        <br />

        <div class="row">
            <div class="col-lg-11">
                <input type="submit" class="btn btn-success" value="Update" />
            </div>
            <div class="col-lg-1">
                <a href="/dashboard" class="btn btn-dark">Back</a>
            </div>
        </div>
    </form>
    <br />
    <br />
    <br />
@else
    <h2>Sorry, you don't have authorization to view this page. Contact your administrator if you feel this is an error.</h2>
    @endif
@endsection
