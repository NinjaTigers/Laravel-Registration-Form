<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\UploadedFile;

test('Testing Creating new user through POST request', function () {
    Mail::fake();
    $image = UploadedFile::fake()->image('avatar.jpg');
    $response = $this->post('/register',[
        'password'=> 'wael@123',
        "confirm-password"=>"wael@123",
            'name'=> 'ahmed',
            'username'=> 'sampleuser4',
            'email'=> 'ahmedwael@gmail.com',
            'phone'=> '01064697292',
            'address'=> 'elmaadi',
            'birthdate'=>"2024-06-06",
            'image'=> $image
    ]);


    // Assert that the response is a redirect to the root URL
    $response->assertRedirect('/');

    // Assert that the session has the expected success message
    $response->assertSessionHas('message', 'You Registered Successfully');
});
