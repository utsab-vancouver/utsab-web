<?php

namespace App\Http\Controllers;

use App\ExecutiveCommittee;
use Illuminate\Http\Request;
use App\Gallery;
use App\GroupGallery;
use File;

class ExecutiveCommitteeController extends Controller
{
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
        $data['executives'] = ExecutiveCommittee::orderBy('id', 'desc')->get();
        return view('admin.executive-committee', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);  

        // dd($request);

        if ($request->hasFile('image')) {

            $path = 'uploads/executive';

            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'uploads/executive';
            $image->move($destinationPath, $name);
            // $this->save();

            $inputs = array(
                'name' => $request->name,
                'title' => $request->title,
                'image' => $name
            );

            if(ExecutiveCommittee::create($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect()->route('add-executive-committee');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect()->route('add-executive-committee');
                }

        }else{
            $inputs = array(
                'name' => $request->name,
                'title' => $request->title,
            );

            if(ExecutiveCommittee::create($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect()->route('add-executive-committee');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect()->route('add-executive-committee');
                }
        }
    }

    public function executiveStatus(Request $request)
    {
        $res = ExecutiveCommittee::where('id', $request->id)->first();
        $data['is_active'] = ($request->is_active == 1)?0:1;
        if(ExecutiveCommittee::where('id', $request->id)->update($data)){
            echo 1;
        }else {
            echo 0;
        }
    }

    public function destroy(Request $request)
    {
        $res = ExecutiveCommittee::where('id', $request->id)->first();

        if(ExecutiveCommittee::where('id', $request->id)->delete()){

            if($res->image == NULL || $res->image == ''){
                echo 1;exit;
            }else{

                $path = 'uploads/executive';

                if(File::exists($path)){
                    unlink($path.'/'.$res->image);
                }

                echo 1;
            }

        }else {
            echo 0;
        }
    }

    public function show($id)
    {
        $data['executive'] = ExecutiveCommittee::where('id', $id)->first();
        return view('admin.edit-executive', $data);
    }


    public function update(Request $request)
    {
        if($request->hasFile('image')){
            $path = 'uploads/executive';

            if(!File::exists($path)){
                File::makeDerectory($path, $mode = 0777, true, true);
            }

            $oldImage = 'uploads/executive';

            if(File::exists($oldImage)){
                unlink($oldImage.'/'.$request->image_old);
            }

            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move($path, $name);

            $inputs = array(
                'name' => $request->name,
                'image' => $name,
                'title' => $request->title,
            );

            if(ExecutiveCommittee::where('id', $request->id)->update($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect()->route('add-executive-committee');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect()->route('add-executive-committee');
                }            
        }else {

            $inputs = array(
                'name' => $request->name,
                'title' => $request->title,
            );

            if(ExecutiveCommittee::where('id', $request->id)->update($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect()->route('add-executive-committee');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect()->route('add-executive-committee');
                }
        }
    }




    public function rmdir_recursive($dir) 
    {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }
}
