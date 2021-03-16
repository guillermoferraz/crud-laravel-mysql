<div class="container">
    <div class='card-body m-2 p-2 text-center'>

        <div class="mx-auto">
            <div class="float-right p-1">
                <a href="{{url('/settings')}}" title="Settings"><i class="fas fa-user-cog" style="font-size: 20px; "></i></a>
            </div>



                        @foreach($profile as $data)
                        <img class="rounded-circle img-fluid img-thumbnail" src="{{asset('storage').'/'.$data->avatar }}"/>
                    @endforeach



        </div>


        <strong class="p-2 text-center mx-auto">{{Auth::user()->name}}</strong>
        <strong class="m-0 p-0">{{Auth::user()->email}}</strong>
    </div>
    <div>
        <a class="btn btn-primary btn-block" href="{{url('/file')}}">Home</a>
        <a class="btn btn-primary btn-block" href="{{url('/file/create')}}">Create</a>
       <a class="btn btn-primary btn-block" href="{{url('/myfiles')}}">My files</a>

    </div>

</div>

