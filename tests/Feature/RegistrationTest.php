<?php

use Illuminate\Support\Facades\Mail;


test('Testing Creating new user through POST request', function () {
    Mail::fake();
    $response = $this->post('/register',[
        'password'=> 'wael@123',
        "confirm-password"=>"wael@123",
            'name'=> 'ahmed',
            'username'=> 'phoenix1387',
            'email'=> 'ahmedwael@gmail.com',
            'phone'=> '01064697292',
            'address'=> 'elmaadi',
            'birthdate'=>"2024-06-06",
    ]);

    $response->assertStatus(200)
        ->assertSee('You Registered Successfully');
});
