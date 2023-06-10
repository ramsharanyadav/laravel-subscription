<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
  
        $profilePhotoName = time().'.'.$request->profile_photo->getClientOriginalExtension();
        $request->profile_photo->move(public_path('profile_photo'), $profilePhotoName);
  
        Auth()->user()->update(['profile_photo'=>$profilePhotoName]);
  
        return back()->with('success', 'profile Photo updated successfully.');
    }
}
