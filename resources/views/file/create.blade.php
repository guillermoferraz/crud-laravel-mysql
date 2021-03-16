@extends('layouts.app')
@section('content')


<div class='row'>
    <div class="col-md-3">
        @include('file.menu')
    </div>


    <div class="container col-md-8 my-auto m-4">
        <form class="form-group" action="{{ url('/file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('file.form')
        </form>
    </div>
</div>
@endsection
