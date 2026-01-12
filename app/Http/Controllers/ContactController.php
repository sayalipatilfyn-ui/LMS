<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function add(Request $request){
        $request->validate([
            'name'=> 'required|min:3',
            'email'=>'required|email',
            'subject'=>'required|min:5',
            'message'=>'required'
        ]);

        Contact::create($request->all());
        return redirect()->back()->with('success','Thank you for your response..');

    }
}
