<?php

namespace App\Http\Controllers;

use App\Puja;
use Illuminate\Http\Request;

class PujaController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pujas'] = Puja::get();
        return view('admin.add-puja', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'puja_name' => 'required'
        ]);

        $inputs = array(
            'puja_name' => $request->puja_name
        );

        if(Puja::create($inputs)){
            return redirect()->route('add-puja')->with('alert-success','Request successfully completed.');
        }else{
            return redirect()->route('add-puja')->with('alert-danger','Request failed!!');
        }
    }

    public function destroy(Request $request)
    {
        $res = Puja::where('id', $request->id)->first();

        if(Puja::where('id', $request->id)->delete()){
            echo 1;
        }else {
            echo 0;
        }
    }


    public function show($id)
    {
        $data['puja'] = Puja::where('id', $id)->first();
        return view('admin.edit-puja', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'puja_name' => 'required'
        ]);

        $inputs = array(
            'puja_name' => $request->puja_name
        );

        if(Puja::where('id', $request->id)->update($inputs)){
            return redirect()->route('add-puja')->with('alert-success','Request successfully completed.');
        }else{
            return redirect()->route('add-puja')->with('alert-danger','Request failed!!');
        }
    }
}
