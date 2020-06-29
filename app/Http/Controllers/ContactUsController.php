<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::all();
        return response($contacts, 200);
    }

    public function store(Request $request)
    {

        $data = $this->validateRequest();

        $contact = ContactUs::create($data);

        Mail::to('beipro002@gmail.com')->send(new ContactFormMail($contact));

        return response()->json([
            "message" => "Thank you for contacting us!",
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (ContactUs::where('id', $id)->exists()) {
            $contact = ContactUs::where('id', $id)->get();
            return response($contact, 200);
        } else {
            return response()->json([
                "message" => "Feedback not found",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (ContactUs::where('id', $id)->exists()) {
            $contact = ContactUs::find($id);
            $contact->delete();
            return response()->json([
                "message" => "Feedback deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Feedback not found",
            ], 404);
        }

    }

    public function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'nullable',
            'phone_number' => 'nullable',
            'message' => 'required',
        ]);
    }

}
