<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

test('Testing the Mail Sending Functionality', function () {
    // Disable sending real emails and capture sent emails
    Mail::fake();

    // Perform an action that should trigger sending an email
    // For example, sending a sample email
    Mail::to('alyeyad03@gmail.com')->send(new RegistrationMail("Mail Test"));

    // Assert that an email was sent to the specified recipient
    Mail::assertSent(RegistrationMail::class, function ($mail) {
        return $mail->hasTo('alyeyad03@gmail.com');
    });
});
