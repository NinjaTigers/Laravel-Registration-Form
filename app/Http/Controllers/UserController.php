<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        
            return $fields;

    }

    public function store(Request $request)
    {

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = Storage::putFileAs('uploads', $file, $fileName); 

        
    }
}
