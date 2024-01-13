<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ExampleController extends Controller
{
    public function show(){
        return 'Welcome to my first controller';
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }

    public function createSession(){
        session()->flash('testSession', 'My first session value');
        //session()->forget('testSession');
        return 'session created ';
    }

    public function sendContactUs(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'email'=> 'required|string',
            'phone' => 'required|string',
            'subject' => 'required',
            'message' => 'required',
           ]);
           Contact::create($data);
           Mail::to( 'info@un.com')->send( 
                new ContactMail($data)
            );
        return "mail sent!";
    }
}
