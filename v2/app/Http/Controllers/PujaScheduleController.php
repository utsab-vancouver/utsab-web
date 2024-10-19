<?php

namespace App\Http\Controllers;

use App\Puja;
use App\PujaSchedule;
use Illuminate\Http\Request;

class PujaScheduleController extends Controller
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
        $res = PujaSchedule::select('puja_id', 'puja_name')->groupBy('puja_id', 'puja_name')->leftJoin('pujas', 'pujas.id', '=', 'puja_schedules.puja_id')->orderBy('pujas.id', 'desc')->get();
        foreach ($res as $key => $value) {
            $pujaschedules = PujaSchedule::select('pujas.puja_name', 'puja_schedules.*')->where('puja_id', $value->puja_id)->leftJoin('pujas', 'pujas.id', '=', 'puja_schedules.puja_id')->orderBy('id', 'desc')->get();
            
            foreach ($pujaschedules as $key => $ps) {
                $data['pujaschedules'][$value->puja_name][$key]['id'] = $ps->id;
                $data['pujaschedules'][$value->puja_name][$key]['event_name'] = $ps->event_name;
                $data['pujaschedules'][$value->puja_name][$key]['date'] = $ps->date;
                $data['pujaschedules'][$value->puja_name][$key]['timings'] = $ps->timings;
                $data['pujaschedules'][$value->puja_name][$key]['activities'] = $ps->activities;
                $data['pujaschedules'][$value->puja_name][$key]['prasadam'] = $ps->prasadam;
            }
        }
            /*echo "<pre>";
            print_r($data);
            exit;
        $data['pujaschedules'] = PujaSchedule::leftJoin('pujas', 'pujas.id', '=', 'puja_schedules.puja_id')->get();*/
        return view('admin.add-puja-schedule', $data);
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
            'puja_name' => 'required',
            'event_name' => 'required',
            'date' => 'required'
        ]);

        $inputs = array(
            'puja_id' => $request->puja_name,
            'event_name' => $request->event_name,
            'date' => $request->date,
            'timings' => $request->timings,
            'activities' => $request->activities,
            'prasadam' => $request->prasadam
        );

        if(PujaSchedule::create($inputs)){
            return redirect()->route('add-puja-schedule')->with('alert-success','Request successfully completed.');
        }else{
            return redirect()->route('add-puja-schedule')->with('alert-danger','Request failed!!');
        }
    }



    public function destroy(Request $request)
    {
        $res = PujaSchedule::where('id', $request->id)->first();

        $total = PujaSchedule::where('puja_id', $res->puja_id)->count();

        if($total == 1){
            $data['total'] = 0;
        }else{
            $data['total'] = 1;
        }

        // dd($data);

        if(PujaSchedule::where('id', $request->id)->delete()){
            $data['response'] = 1;
        }else {
            $data['response'] = 0;
        }

        echo json_encode($data);
    }

    public function show($id)
    {
        $data['pujas'] = Puja::get();
        $data['puja_schedule'] = PujaSchedule::where('id', $id)->first();
        return view('admin.edit-puja-schedule', $data);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'puja_name' => 'required',
            'event_name' => 'required',
            'date' => 'required'
        ]);

        $inputs = array(
            'puja_id' => $request->puja_name,
            'event_name' => $request->event_name,
            'date' => $request->date,
            'timings' => $request->timings,
            'activities' => $request->activities,
            'prasadam' => $request->prasadam
        );

        if(PujaSchedule::where('id', $request->id)->update($inputs)){
            return redirect()->route('add-puja-schedule')->with('alert-success','Request successfully completed.');
        }else{
            return redirect()->route('add-puja-schedule')->with('alert-danger','Request failed!!');
        }
    }
}
