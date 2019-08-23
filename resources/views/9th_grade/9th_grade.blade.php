@extends('layouts.app')

@section('content')
       {{-- @if(Auth::user()->privilege_type === "admin")
            <h1>{{Auth::user()->name}} you have administrator privileges</h1>
            @else
            <h1>You do not have administrator privileges</h1>
            @endif--}}
       <div class="row">

           <div class="col-lg-12">
               <div class="p-3 mb-2 bg-dark text-white text-center">9th Grade</div>
               <nav>
                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                       <a class="nav-item nav-link active" id="nav-Monday-tab" data-toggle="tab" href="#nav-Monday" role="tab" aria-controls="nav-Monday" aria-selected="true">WEEKLY BLAST</a>
                       <a class="nav-item nav-link" id="nav-Tuesday-tab" data-toggle="tab" href="#nav-Tuesday" role="tab" aria-controls="nav-Tuesday" aria-selected="false">DATA HIGHLIGHTS</a>
                       <a class="nav-item nav-link" id="nav-Wednesday-tab" data-toggle="tab" href="#nav-Wednesday" role="tab" aria-controls="nav-Wednesday" aria-selected="false">WEEK UPDATES</a>
                       <a class="nav-item nav-link" id="nav-Thursday-tab" data-toggle="tab" href="#nav-Thursday" role="tab" aria-controls="nav-Thursday" aria-selected="false">SAVE THE DATES</a>{{--
                       <a class="nav-item nav-link" id="nav-Friday-tab" data-toggle="tab" href="#nav-Friday" role="tab" aria-controls="nav-Friday" aria-selected="false">PILAR ACTIONS ITEMS</a>
                       <a class="nav-item nav-link" id="nav-Saturday-tab" data-toggle="tab" href="#nav-Saturday" role="tab" aria-controls="nav-Saturday" aria-selected="false">EXPO ACTIONS ITEMS</a>--}}
                   </div>
               </nav>
               <br />
               <div class="tab-content" id="nav-tabContent">
                   <div class="tab-pane fade show active" id="nav-Monday" role="tabpanel" aria-labelledby="nav-Monday-tab">Weekly Blast</div>
                   <div class="tab-pane fade" id="nav-Tuesday" role="tabpanel" aria-labelledby="nav-Tuesday-tab">Data Highlights</div>
                   <div class="tab-pane fade" id="nav-Wednesday" role="tabpanel" aria-labelledby="nav-Wednesday-tab">Week Updates</div>
                   <div class="tab-pane fade" id="nav-Thursday" role="tabpanel" aria-labelledby="nav-Thursday-tab">Save the dates</div>{{--
                   <div class="tab-pane fade" id="nav-Friday" role="tabpanel" aria-labelledby="nav-Friday-tab">Some data goes here</div>
                   <div class="tab-pane fade" id="nav-Saturday" role="tabpanel" aria-labelledby="nav-Saturday-tab">Some data goes here</div>--}}
               </div>

           </div>

       </div>
       <br />
       <div class="container">
           <div class="row">
               <div id="eventDeleteMessage" class="alert alert-success alert-dismissible fade show col-lg-12" style="display: none"></div>
               <br />
               <div class="container">
                   <div class="row">

                       @if(Auth::user()->privilege_type === 'admin')
                           <div class="col-lg-12"><a href="/9th_grade/edit" class="btn btn-success btn-block">Edit</a></div>
                       @endif
                   </div>
                   <br />
               </div>
               <div class="row">
                   <div class="col-lg-12">
                       <div id="calendar"></div>
                   </div>
               </div>
           </div>
           @include('inc/fullcalendartemplate')
       </div>

@endsection
