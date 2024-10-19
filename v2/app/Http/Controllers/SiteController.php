<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\GroupGallery;
use App\Slider;
use App\ExecutiveCommittee;
use App\Puja;
use App\PujaSchedule;
use App\PujaHeader;

class SiteController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::orderBy('id', 'desc')->where('is_active', 1)->get();
    	return view('pages.home', $data);
    }

    public function membershipInfo()
    {
    	return view('pages.membership');
    }

    public function executiveCommiteeInfo()
    {
        $data['executives'] = ExecutiveCommittee::where('is_active', 1)->orderBy('id', 'desc')->get();
    	return view('pages.executive-commitee', $data);
    }

    public function pujaScheduleInfo()
    {
        $res = PujaSchedule::select('puja_id', 'puja_name')->groupBy('puja_id', 'puja_name')->leftJoin('pujas', 'pujas.id', '=', 'puja_schedules.puja_id')->get();
        foreach ($res as $key => $value) {
            $pujaschedules = PujaSchedule::select('pujas.puja_name', 'puja_schedules.*')->where('puja_id', $value->puja_id)->leftJoin('pujas', 'pujas.id', '=', 'puja_schedules.puja_id')->get();
            
            foreach ($pujaschedules as $key => $ps) {
                // echo 
                $data['pujaschedules'][$value->puja_name][$key]['id'] = $ps->id;
                $data['pujaschedules'][$value->puja_name][$key]['event_name'] = $ps->event_name;
                $data['pujaschedules'][$value->puja_name][$key]['date'] = $ps->date;
                $data['pujaschedules'][$value->puja_name][$key]['timings'] = $ps->timings;
                $data['pujaschedules'][$value->puja_name][$key]['activities'] = $ps->activities;
                $data['pujaschedules'][$value->puja_name][$key]['prasadam'] = $ps->prasadam;
            }
        }
        $data['puja_header'] = PujaHeader::first();
    	return view('pages.puja-schedule', $data);
    }

    public function galleryInfo()
    {
        $data['galleries'] = Gallery::orderBy('id', 'desc')->get();
    	return view('pages.gallery', $data);
    }

    public function galleryDetails($id)
    {
        $data['gallery'] = GroupGallery::leftJoin('gallery', 'gallery.id', '=', 'group_gallerys.gallery_id')->where('group_gallerys.gallery_id', $id)->orderBy('group_gallerys.id', 'desc')->first();
        return view('pages.group-gallery', $data);
    }
}
