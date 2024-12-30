<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCharacterRequest;
use App\Mail\NewCharacterApplication;
use Illuminate\Support\Facades\Mail;

class NewCharacterController extends Controller
{
    public function create()
    {
        return view('character.application');
    }

    public function store(NewCharacterRequest $request)
    {
        Mail::to([
                //'alicia@akddev.net',
                //'angelapierce2009@gmail.com',
                'first.age.characters@gmail.com',
		        'ascendancynikolai@gmail.com'
            ])
            ->send(new NewCharacterApplication($request));

        return response()->json(['message' => 'Your application has been submitted. You will be contacted shortly with approval or any questions via PM on the forums at the username you provided.']);
    }
}
