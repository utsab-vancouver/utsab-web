<?php

namespace App\Http\Controllers;

use App\PujaHeader;
use Illuminate\Http\Request;

class PujaHeaderController extends Controller
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
        $data['puja_headers'] = PujaHeader::orderBy('id', 'desc')->first();
        return view('admin.puja-header', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required'
        ]);

        $inputs = array(
            'title' => $request->title,
            'address' => $request->address
        );

        $total = PujaHeader::count();

        if($total > 0){
            return redirect()->route('add-puja-header')->with('alert-danger','Please first delete existing data. Then add new data.');
        }

        if(PujaHeader::create($inputs)){
            return redirect()->route('add-puja-header')->with('alert-success','Request successfully completed.');
        }else{
            return redirect()->route('add-puja-header')->with('alert-danger','Request failed!!');
        }
    }

    public function destroy(Request $request)
    {
        $res = PujaHeader::where('id', $request->id)->first();

        if(PujaHeader::where('id', $request->id)->delete()){
            echo 1;
        }else {
            echo 0;
        }
    }
}
