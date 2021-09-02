<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getHero($id)
    {
        return 'User Id = ' . $id;
    }

    public function generateKey()
    {
        return str_random(32);
    }
    //
}
