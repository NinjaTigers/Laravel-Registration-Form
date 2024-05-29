<?php
use function Pest\Laravel\assertDatabaseHas;
test('Testing if Seed Exists in the database', function () {
    assertDatabaseHas('users',['username'=>'kareem']);
});
