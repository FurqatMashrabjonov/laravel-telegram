<?php


test('text exists', function (){
    $this->artisan('db:seed --class=TextSeeder');
    $this->assertDatabaseHas('texts', [
        'key' => 'start',
    ]);

    $this->assertDatabaseHas('texts', [
        'key' => 'ask_language',
    ]);
});

//test('lang() helper function', function (){
//    $this->artisan('db:seed --class=TextSeeder');
//    $this->assertEquals('Hello, John!', lang('start', 'en', ['name' => 'John']));
////    $this->assertEquals('Salom, John!', lang('start', 'uz', ['name' => 'John']));
//});
