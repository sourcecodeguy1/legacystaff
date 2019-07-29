@extends('layouts.app')

@section('content')
        @if(Auth::user()->privilege_type === "admin")
            <h1>{{Auth::user()->name}} you have administrator privileges</h1>
            @else
            <h1>You do not have administrator privileges</h1>
            @endif

@endsection
