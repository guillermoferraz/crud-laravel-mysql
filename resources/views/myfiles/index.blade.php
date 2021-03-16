@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-3">
        @include('myfiles.menu')
    </div>

    @foreach($myfiles as $file)
    <div class="container col-md-7 border boreder-dark">
        <div class="row  mx-auto">
            <div>
                <a class="btn btn-info btn-sm m-3 p-2" href="{{url('/myfiles/'.$file->id.'/edit')}}">Edit</a>
            </div>

            <div>
                <form action="{{url('/myfiles/'.$file->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger btn-sm m-3 p-2" type="submit" onclick="return confirm('Delete data?')" value="Delete">
                </form>
            </div>

        </div>


        <div class="float-left mt-3">
            <div class="form-inline p-2">
                <strong>First name:</strong><strong class="ml-3">{{$file->name}}</strong>

            </div>
            <div class="form-inline p-2">
                <strong>Last name:</strong><strong class="ml-3">{{$file->last_name}}</strong>

            </div>
            <div class="form-inline p-2">
                <strong>Email:</strong><strong class="ml-3">{{$file->email}}</strong>
            </div>
        </div>
        <div>
            <img class='float-right img-fluid img-thumbnail' src="{{asset ('storage').'/'.$file->photo}}" width="150" height="150"/>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Document</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date of birdth</th>
                        <th scope="col">Career</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$file->id}}</th>
                        <td>{{$file->id_document}}</td>
                        <td>{{$file->phone}}</td>
                        <td>{{$file->date_of_birth}}</td>
                        <td>{{$file->career}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="jumbotron">
                <strong>Description:</strong>
                <p>{{$file->description}}</p>
            </div>
            {!! $myfiles->links() !!}

        </div>
    </div>
    @endforeach
</div>

@endsection
