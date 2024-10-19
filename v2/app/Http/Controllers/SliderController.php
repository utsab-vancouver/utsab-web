<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use File;

class SliderController extends Controller
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
        $data['sliders'] = Slider::orderBy('id', 'desc')->get();
        return view('admin.add-slider', $data);
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
            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($request->hasFile('slider_image')){
            $path = 'uploads/slider';
            // --create directory if not exists
            if(!File::exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('slider_image');
            $name = $image->getClientOriginalName();
            $image->move($path, $name);

            if(Slider::create(['slider_image' => $name])){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect('/add-slider');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect('/add-slider');
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['slider'] = Slider::where('id', $id)->first();
        return view('admin.edit-slider', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->hasFile('slider_image')){
            $path = 'uploads/slider';

            if(!File::exists($path)){
                File::makeDerectory($path, $mode = 0777, true, true);
            }

            $oldImage = 'uploads/slider';

            if(File::exists($oldImage)){
                unlink($oldImage.'/'.$request->slider_image_old);
            }

            $image = $request->file('slider_image');
            $name = $image->getClientOriginalName();
            $image->move($path, $name);

            if(Slider::where('id', $request->id)->update(['slider_image' => $name])){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect('/add-slider');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect('/add-slider');
                }            
        }else {
            $request->session()->flash('alert-danger', 'No data has been changed.');
                    return redirect('/add-slider');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $res = Slider::where('id', $request->id)->first();

        if(Slider::where('id', $request->id)->delete()){

            $path = 'uploads/slider';

            if(File::exists($path)){
                unlink($path.'/'.$res->slider_image);
            }

            echo 1;
        }else {
            echo 0;
        }
    }

    public function sliderStatus(Request $request)
    {
        $res = Slider::where('id', $request->id)->first();
        $data['is_active'] = ($request->is_active == 1)?0:1;
        if(Slider::where('id', $request->id)->update($data)){
            echo 1;
        }else {
            echo 0;
        }
    }
}
