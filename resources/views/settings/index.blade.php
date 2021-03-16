@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col-md-3">
        @include('file.menu')
    </div>
    <h3 class="font-weight-bold">Settings</h3>

    <div class='mx-auto my-auto col-md-6'>
        @foreach($profile as $data)
            @if(isset($data->avatar))
                <div class="mx-auto text-center">
                <img class="img-fluid img-thumbnail rounded-circle " src="{{asset('storage'.'/'.($data->avatar))}}" width="250">
                </div>
            @endif
        @endforeach
                <div class="mx-auto text-center mt-3 p-2">
                    <a class="btn btn-primary" href='#' title="Create" id="btn-create">Create</a>
                    <a class="btn btn-primary" title="Upload" href="#" id="btn-update">Update</a>
                </div>
    </div>
    <div class="container mx-auto col-md-8">
    <div class="col-md-6 my-auto mx-auto" id="form-create">
        <h3>Create your profile picture</h3>
        <div>


            <form class="form-group" action="{{url('/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('settings.form',['modo'=>'Create'])

            </form>
        </div>
    </div>

    <div class="col-md-6 my-auto mx-auto" id="form-update">
        <h3>Update your profile picture</h3>
        <div>
            @foreach($profile as $data)
                @if(isset($data->avatar))
            <form class="form-group" action="{{url('/settings/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                @endif
            @endforeach
                @csrf
                {{ method_field('PATCH') }}
                @include('settings.form', ['modo'=>'Update'])

            </form>
        </div>
    </div>



</div>
<script>
    $(document).ready(function(){
        $('#form-create').hide();
        $('#form-update').hide();

            $(document).on('click', '#btn-create', function(){
                $('#form-create').show('slow');
                $('#form-update').hide('slow');
            });
             $(document).on('click', '#btn-update', function(){
                $('#form-create').hide('slow');
                $('#form-update').show('slow');
            });



        })
</script>
</div>

@endsection
