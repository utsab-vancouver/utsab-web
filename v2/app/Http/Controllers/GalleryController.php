<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GroupGallery;
use File;
use Illuminate\Http\Request;
use Session;

class GalleryController extends Controller
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
    public function addGalleryInfo()
    {
        $data['galleries'] = Gallery::get();
        return view('admin.gallery', $data);
    }


    /**
     * [saveGalleryInfo description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function saveGalleryInfo(Request $request)
    {
        $this->validate(request(), [
            'gallery_name' => 'required',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);  

        // dd($request);

        if ($request->hasFile('gallery_image')) {

            $path = 'uploads/gallery/'.$request->gallery_name;

            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('gallery_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'uploads/gallery/'.$request->gallery_name;
            $image->move($destinationPath, $name);
            // $this->save();

            $inputs = array(
                'gallery_name' => $request->gallery_name,
                'gallery_image' => $name
            );

            if(Gallery::create($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect('/add-gallery');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect('/add-gallery');
                }

        }
    }

    /**
     * [editGalleryInfo description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function editGalleryInfo($id)
    {
        $data['gallery'] = Gallery::where('id', $id)->first();
        return view('admin.edit-gallery', $data);
    }

    /**
     * [updateGalleryInfo description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateGalleryInfo(Request $request)
    {
        $this->validate(request(), [
            'gallery_name' => 'required',
            'gallery_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);  

        if ($request->hasFile('gallery_image')) {


            
            $path = 'uploads/gallery/'.$request->gallery_name;


            $imgOldPath = 'uploads/gallery/'.$request->gallery_name_old;

            if(File::exists($imgOldPath)) {
                $this->rmdir_recursive($imgOldPath);
            }

            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('gallery_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'uploads/gallery/'.$request->gallery_name;
            $image->move($destinationPath, $name);
            // $this->save();

            $inputs = array(
                'gallery_name' => $request->gallery_name,
                'gallery_image' => $name
            );

            if(Gallery::where('id', $request->id)->update($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect('/add-gallery');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect('/add-gallery');
                }

        }else{

            $inputs = array(
                'gallery_name' => $request->gallery_name,
                'gallery_image' => $request->gallery_image_old
            );



            $path = 'uploads/gallery/'.$request->gallery_name;

            $imgOldPath = 'uploads/gallery/'.$request->gallery_name_old;


            rename($imgOldPath, $path);


            if(Gallery::where('id', $request->id)->update($inputs)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect('/add-gallery');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect('/add-gallery');
                }
        }
    }


    public function deleteGallery(Request $request)
    {   
        $res = Gallery::where('id', $request->id)->first();

        if(Gallery::where('id', $request->id)->delete()){

            $path = 'uploads/gallery/'.$res->gallery_name.'/group';

            if(File::exists($path)) {
                $this->rmdir_recursive($path);
            }

            $path = 'uploads/gallery/'.$res->gallery_name;

            if(File::exists($path)) {
                $this->rmdir_recursive($path);
            }
            echo 1;
        }else {
            echo 0;
        }
    }

    /**
     * [galleryMultipleImage description]
     * @return [type] [description]
     */
    public function galleryMultipleImage()
    {
        $data['galleries'] = GroupGallery::leftJoin('gallery', 'gallery.id', '=', 'group_gallerys.gallery_id')->get();
        // dd($data);
        $data['galleriess'] = Gallery::all();
        return view('admin.gallery-group', $data);
    }


    public function createGalleryMultipleImage(Request $request)
    {
        $this->validate(request(), [
            'gallery' => 'required',
            'gallery_group_image' => 'required'
        ]);

        $galleryName = Gallery::where('id', $request->gallery)->first();

        if($request->hasFile('gallery_group_image')){
            if($files = $request->file('gallery_group_image')){
                $images = array();

                foreach ($files as $file) {

                   $path = 'uploads/gallery/'.$galleryName->gallery_name.'/group';

                    if(!File::exists($path)) {
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }

                    $name = $file->getClientOriginalName();
                    $destinationPath = 'uploads/gallery/'.$galleryName->gallery_name.'/group';
                    $file->move($destinationPath, $name);

                    $images[] = $name;
                }

                $uploadImage = implode(',', $images);
                $data['image'] = $uploadImage;
                $data['gallery_id'] = $request->gallery;

                if(GroupGallery::create($data)){
                $request->session()->flash('alert-success', 'Request successfully');
                return redirect('/gallery-multiple-image');
                }else{
                    $request->session()->flash('alert-danger', 'Request failed!!');
                    return redirect('/gallery-multiple-image');
                }
            }
        }
    }


    public function deleteGroupGallery(Request $request)
    {   
        $res = GroupGallery::leftJoin('gallery', 'gallery.id', '=', 'group_gallerys.gallery_id')->where('group_gallerys.id', $request->id)->first();

        if(GroupGallery::where('id', $request->id)->delete()){

            $path = 'uploads/gallery/'.$res->gallery_name.'/group';

            if(File::exists($path)) {
                $this->rmdir_recursive($path);
            }
            echo 1;
        }else {
            echo 0;
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
