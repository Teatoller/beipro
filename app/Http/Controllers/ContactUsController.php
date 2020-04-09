<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function getContact()
    {
        $contacts = ContactUs::all();
        return response($contacts, 200);
    }

    public function saveContact(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $contact = new ContactUs;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

        $contact->save();

        // Mail::send('contact',
        //     array(
        //         'name' => $request->get('name'),
        //         'email' => $request->get('email'),
        //         'subject' => $request->get('subject'),
        //         'phone_number' => $request->get('phone_number'),
        //         'message' => $request->get('message'),
        //     ), function ($message) use ($request) {
        //         $message->from($request->email);
        //         $message->to('beipro002@gmail.com');
        //     });

        return response()->json([
            "message" => "Thank you for contacting us!",
        ], 200);

    }
}
