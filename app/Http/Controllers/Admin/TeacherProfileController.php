<?php

namespace App\Http\Controllers\Admin;

use App\TeacherProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Image;
use Input;
use Lang; 

class TeacherProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $profiles = TeacherProfile::has('admin')->get();

        return view('admin.teacher_profile.index', compact('profiles'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Admin::where('type', 'teacher')->get();
        return view('admin.teacher_profile.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'admin_id' => 'required',
            'overview' => 'required',
            'message'  => 'required',
        ]);

        $profile = new TeacherProfile;
        $profile->admin_id = $request->admin_id;
        $profile->message = $request->message;
        $profile->overview = $request->overview;
        $request->is_show ? $profile->is_show = 1 : $profile->is_show = 0;

        if($request->hasFile('profile_image'))
        {
            $image = $request->file('profile_image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            
            $destinationPath = www_path('profile');
            $img = Image::make($image->getRealPath());

           
            //return $old_image;
            $img->resize(200, 200, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            
            $profile->profile_image = $uploaded_image;
        }

        if($request->hasFile('background_image'))
        {
            $image = $request->file('background_image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            
            $destinationPath = www_path('background');
            $img = Image::make($image->getRealPath());

           
            //return $old_image;
            $img->resize(935, 250, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            
            $profile->background_image = $uploaded_image;
        }

        if($request->hasFile('audio_file'))
        {
            $music_file = $request->file('audio_file'); 
            if(isset($music_file))
            {
                 $filename = $music_file->getClientOriginalName();
                 $location = www_path('audio/'); 
                 $music_file->move($location,$filename); 
                 $profile->audio_file = asset('audio/'. $filename); 
            }
        }else{
            $profile->audio_file = $request->audio_url;  
        }

        $profile->save();
        return redirect()->route('admin.teacherprofile.index')->with('message', Lang::get('label.item_saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherProfile $teacherprofile)
    {
        return view('admin.teacher_profile.show', compact('teacherprofile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $teachers = Admin::where('type', 'teacher')->get();
        $profile = TeacherProfile::find($id);
        return view('admin.teacher_profile.edit', compact('profile', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'admin_id' => 'required',
            'overview' => 'required',
            'message'  => 'required',
        ]);

        $profile = TeacherProfile::find($id);
        $profile->admin_id = $request->admin_id;
        $profile->message = $request->message;
        $profile->overview = $request->overview;
        $request->is_show ? $profile->is_show = 1 : $profile->is_show = 0;

        if($request->hasFile('profile_image'))
        {
            $image = $request->file('profile_image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            
            $destinationPath = www_path('profile');
            $img = Image::make($image->getRealPath());

           
            //return $old_image;
            $img->resize(200, 200, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            
            $profile->profile_image = $uploaded_image;
        }

        if($request->hasFile('background_image'))
        {
            $image = $request->file('background_image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            
            $destinationPath = www_path('background');
            $img = Image::make($image->getRealPath());

           
            //return $old_image;
            $img->resize(935, 250, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            
            $profile->background_image = $uploaded_image;
        }

        if($request->hasFile('audio_file'))
        {
         //   $profile->audio_file = $request->audio_file->store('audio_file');
            $music_file = $request->file('audio_file'); 
            if(isset($music_file))
            {
                 $filename = $music_file->getClientOriginalName();
                 $location = www_path('audio/'); 
                 $music_file->move($location,$filename); 
                 $profile->audio_file = asset('audio/'. $filename ); 
            }
        }else{
            $profile->audio_file = $request->audio_url;  
        }

        $profile->save();
        return redirect()->route('admin.teacherprofile.index')->with('message', Lang::get('label.item_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeacherProfile::findOrFail($id)->delete();
        return back();
    }
}
