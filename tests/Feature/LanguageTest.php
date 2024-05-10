<?php

test('Testing Arabic', function () {
    $response = $this->get('/ar');

    $response->assertRedirect('/');
});
test('Testing English', function () {
    $response = $this->get('/en');

    $response->assertRedirect('/');
});