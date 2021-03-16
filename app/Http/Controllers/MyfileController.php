<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Setting;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;



class MyfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request){
            $data = Auth::user()->id;
            $datafiles['myfiles']=File::
                where('user_id', '=', $data)
                    ->orderBy('id', 'desc')
                    ->paginate(1);
        }
        if($request){
            $data = Auth::user()->id;
            $dataProfile['profile']=Setting::
                where('user_id', '=', $data)
                    ->paginate(0);
        }

        return view('myfiles.index', $datafiles, $dataProfile);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request){
            $data = Auth::user()->id;
            $dataProfile['profile']=Setting::
                where('user_id', '=', $data)
                    ->paginate(1);
        }

        $myfile=File::findOrFail($id);
            return view('myfiles.edit', compact('myfile'), $dataProfile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $myfile = request()->except(['_token', '_method']);

        if($request->hasFile('avatar')){
            $file=File::findOrFail($id);

            Storage::delete('public/'.$setting->avatar);

            $myfile['avatar']=$request->file('avatar')->store('uploads','public');
        }
        File::where('id', '=', $id)->update($myfile);
        $myfile=Setting::findOrFail($id);
        return redirect('/myfiles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myfile=File::findOrFail($id);
        if(Storage::delete('public/'.$myfile->photo)){
            File::destroy($id);
        }
        return redirect('/myfiles');
    }
}
