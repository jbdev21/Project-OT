<?php

namespace App\Http\Controllers;

use App\Events\LevelTestCreated;
use Library\Braincert\Braincert;
use Illuminate\Http\Request;
use App\LevelTest;
use App\ClassSession;
use Session;
use Auth;
use Lang;

class LevelTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(Session::has('leveltest')){
            $leveltest = LevelTest::find(session('leveltest'));
            $data['leveltest'] = $leveltest;
            $data['overall'] = ($leveltest->comprehension + $leveltest->pronounciation + $leveltest->fluency + $leveltest->vocabulary + $leveltest->grammar) / 5; 
             
            $data['avg_comprehension'] = round($this->getScoreAverage('comprehension'), 0);
            $data['avg_pronounciation'] = round($this->getScoreAverage('pronounciation'), 0);
            $data['avg_fluency'] = round($this->getScoreAverage('fluency'), 0);
            $data['avg_vocabulary'] = round($this->getScoreAverage('vocabulary'), 0);
            $data['avg_grammar'] = round($this->getScoreAverage('grammar'), 0);

            return view(theme('leveltest.new-design'), $data);
        }else{
            return redirect('/');
        }
    }

    public function register()
    {
        return view(theme('leveltest.register'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required'
        ]);

        $leveltest = LevelTest::where('mobile', $request->mobile)->first();
        if(count($leveltest)){
            Session::put('leveltest', $leveltest->id);
            return ['status' => true];
        }else{
            return ['status' => false];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.leveltest.create');
    }

    public function getScoreAverage($type)
    {
        return LevelTest::where('status', 'present')->avg($type) * 10;
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
            'name' => 'required',
            'korean_name' => 'required',
            'mobile' => 'required|unique:level_tests',
            'type' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $leveltest = new LevelTest;
        $leveltest->name = $request->name;
        $leveltest->korean_name = $request->korean_name;
        $leveltest->mobile = $request->mobile;
        $leveltest->type = $request->type;
        $leveltest->date = $request->date;
        $leveltest->time = $request->time;
        $leveltest->age_group = $request->age_group;
        $leveltest->self_assesment = $request->self_assesment;
        $leveltest->code = time();
        $leveltest->save();

        event(new LevelTestCreated($leveltest));
        
         

        return $leveltest;
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success()
    {
        //if(Session::has('leveltest_success'))
       // {
            $leveltest = Auth::user()->leveltest()->first();
            return view('template.leveltest.success', compact('leveltest'));
      //  }else{
      //     return redirect('/');
//}
    }
}
