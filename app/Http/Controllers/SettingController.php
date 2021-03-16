<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
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
            $dataProfile['profile']=Setting::
                where('user_id', '=', $data)
                    ->paginate(1);
        }

        return view('settings.index', $dataProfile);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataSetting =  request()->except('_token');

        if($request->hasFile('avatar')){
            $dataSetting['avatar']=$request->file('avatar')->store('uploads', 'public');
        }
        Setting::insert($dataSetting);

        return redirect('/settings');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProfile = request()->except(['_token', '_method']);

        if($request->hasFile('avatar')){
            $setting=Setting::findOrFail($id);

            Storage::delete('public/'.$setting->avatar);

            $dataProfile['avatar']=$request->file('avatar')->store('uploads','public');
        }
        Setting::where('id', '=', $id)->update($dataProfile);
        $setting=Setting::findOrFail($id);
        return redirect('/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
