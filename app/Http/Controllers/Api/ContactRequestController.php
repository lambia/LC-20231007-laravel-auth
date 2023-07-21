<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactRequestController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                "name" => "required",
                "email" => "required|email",
                "message" => "required",
            ]
        );

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ]);
        }

        $newContactRequest = new ContactRequest();
        $newContactRequest->fill($data);
        $newContactRequest->save();

        // invio mail
        $newMail = new NewContact($data);
        Mail::to("info@miosito.it")->send($newMail);

        return response()->json([
            "success" => true
        ]);

    }
}
