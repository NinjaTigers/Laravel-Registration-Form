<?php

namespace App\Http\Controllers;

use App\Mail\RegisterationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'password'=> 'required',
            'name'=> 'required',
            'username'=> ['required',Rule::unique('users','username')],
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'birthdate'=> 'required',

        ]);
        $fields['password'] = bcrypt($request['password']);
        $fields['image'] = '';
        if($request->hasFile('image')){
        $file = $request->file('image');
        $fields['image'] = time() . '.' . $file->getClientOriginalExtension();   }
        User::create($fields);

        Mail::to('alyeyad03@gmail.com')->send(new RegisterationMail($fields['username']));

        return view('welcome')->with('message', 'You Registered Successfully');

    }

    public function store(Request $request)
    {

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = Storage::putFileAs('uploads', $file, $fileName);


    }
}

