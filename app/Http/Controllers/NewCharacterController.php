<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewCharacterApplication;


class NewCharacterController extends Controller
{
    public function create()
    {
        return view('character.application');
    }
    
    public function store(\App\Http\Requests\NewCharacterRequest $request)
    {
        dd('here');
        \Mail::to([
                'alicia@akddev.net',
                'angelapierce2009@gmail.com',
                'first.age.characters@gmail.com'
            ])
            ->send(new NewCharacterApplication($request));
    }
}
