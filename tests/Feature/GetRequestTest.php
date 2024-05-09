<?php

test('Get Request Testing', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
