<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

/* Emails are sent:
    * From: web13123@outlook.com
    * To: web29711@gmail.com
    * Password for both accounts: Web12345#
*/

class UserController extends Controller
{
    public function register(Request $request)
    {

        $fields = $request->validate([
            'password' => 'required',
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'birthdate' => 'required',

        ]);
        $fields['password'] = bcrypt($request['password']);
        $fields['image'] = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fields['image'] = time() . '.' . $file->getClientOriginalExtension();
        }
        User::create($fields);

        Mail::to('web29711@gmail.com')->send(new RegistrationMail($fields['username']));

        $this->store($request);

        // Clear old form input values from session
        $request->session()->forget(['name', 'email', 'password', 'confirm-password', 'username',
            'phone', 'birthdate', 'address']);

        // Flash success message to session
        $request->session()->flash('message', "You Registered Successfully");

        // Redirect to root route with message
        return redirect('/');
    }

    public function store(Request $request)
    {

        $file = $request->file('image');
//        print(`$file\n`);
        $fileName = time() . '.' . $file->getClientOriginalExtension();

//        print(`$fileName\n`);
        $path = Storage::putFileAs('uploads', $file, $fileName);
//        print(`$path\n`);
        return $path;
    }
}

