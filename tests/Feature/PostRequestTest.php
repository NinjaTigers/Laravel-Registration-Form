<?php

test('Testing Creating new user through POST request', function () {
    $response = $this->post('/register',[
        'password'=> 'wael@123',
        "confirm-password"=>"wael@123",
            'name'=> 'ahmed',
            'username'=> 'phynix',
            'email'=> 'ahmedwael@gmail.com',
            'phone'=> '01064697292',
            'address'=> 'elmaadi',
            'birthdate'=>"2024-06-06",

            
    ]);

    $response->assertRedirect('/');
});


test('Testing Sending Data incomplete to the Server', function () {
    $response = $this->post('/register',[
        'password'=> 'wael@123',
        "confirm-password"=>"wael@123",
            'name'=> 'ahmed',
            // 'username'=> 'phynix',
            'email'=> 'ahmedwael@gmail.com',
            'phone'=> '01064697292',
            // 'address'=> 'elmaadi',
            'birthdate'=>"2024/06/06",

            
    ]);

    $response->assertRedirect('/');
    
});
