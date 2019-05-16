<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Admin\NewTestimonialNotification;
use App\Testimonial;
use App\Admin; 
use Auth; 

class TestimonialController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }
    
    public function index()
    {
        $testimonials = Auth::user()->testimonials()->orderBy('id', 'DESC')->paginate(10);
        return view('student.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers =  Admin::find(Auth::user()->teachers());
        return view('student.testimonial.create', compact('teachers'));
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
            'message' => 'required',
        ]);

        $testimonial = new Testimonial;
        $testimonial->admin_id = $request->admin_id;
        $testimonial->message = $request->message;
        $testimonial->user_id = Auth::user()->id;
        $testimonial->created_at = date('Y-m-d H:i:s');
        $testimonial->save();
        
        $admins = Admin::where('type', 'administrator')->get();
        foreach($admins as $admin)
        {
            $admin->notify( new NewTestimonialNotification($testimonial));
        }
        return redirect()->route('dashboard.testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('student.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $teachers =  Admin::find(Auth::user()->teachers());
        $testimonial = Testimonial::find($id);
        return view('student.testimonial.edit', compact('testimonial', 'teachers'));
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
        $this->validate($request, [
            'message' => 'required',
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->admin_id = $request->admin_id;
        $testimonial->message = $request->message;
        $testimonial->save();

        return redirect()->route('dashboard.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->route('dashboard.testimonial.index');
    }
}
