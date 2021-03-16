<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Setting;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataSetting['settings']=Setting::paginate(0);

        if($request){
            $data = Auth::user()->id;
            $dataProfile['profile']=Setting::
                where('user_id', '=', $data)
                    ->paginate(0);

        }


        $dataFile['files']=File::orderBy('id', 'desc')->paginate(1);
        return view('file.home', $dataProfile,  $dataFile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

            if($request){
            $data = Auth::user()->id;
            $dataProfile['profile']=Setting::
                where('user_id', '=', $data)
                    ->paginate(0);
        }

        return view('file.create', $dataProfile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataFile =  request()->except('_token');

        if($request->hasFile('photo')){
            $dataFile['photo']=$request->file('photo')->store('uploads', 'public');
        }
        File::insert($dataFile);

        return redirect('/file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
