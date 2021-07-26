<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWordController extends Controller
{

    function __invoke()
    {

        return view('welcome', ['name' => 'Joãozinho']); //passar algum valor para view de um controller
    }
}
