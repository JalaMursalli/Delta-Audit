<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('backend.contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the incoming request
         $request->validate([
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'sub_title_az' => ['nullable'],
            'sub_title_en' => ['nullable'],
            'sub_title_ru' => ['nullable'],
            'address_title_az' => ['required','max:200'],
            'address_title_en' => ['required','max:200'],
            'address_title_ru' => ['required','max:200'],
            'voen_title_az' => ['required','max:200'],
            'voen_title_en' => ['required','max:200'],
            'voen_title_ru' => ['required','max:200'],
            'email_title' => ['required','max:200'],
            'phone_title' => ['required','max:200'],
            'address_icon' => ['nullable','image'],
            'voen_icon' => ['nullable','image'],
            'email_icon' => ['nullable','image'],
            'phone_icon' => ['nullable','image'],
            'map' => ['required'],

        ]);


        $contact = Contact::find($id);


        if (!$contact) {
            $contact = new Contact();
        }


        if ($request->hasFile('address_icon')) {
            $addressPath = handleUpload('address_icon');
        } else {

            $addressPath = $contact->address_icon;
        }

        if ($request->hasFile('voen_icon')) {
            $voenPath = handleUpload('voen_icon');
        } else {

            $voenPath = $contact->voen_icon;
        }
        if ($request->hasFile('email_icon')) {
            $emailPath = handleUpload('email_icon');
        } else {

            $emailPath = $contact->email_icon;
        }
        if ($request->hasFile('phone_icon')) {
            $phonePath = handleUpload('phone_icon');
        } else {

            $phonePath = $contact->phone_icon;
        }


        $contact->fill([
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'sub_title_az' => $request->sub_title_az,
            'sub_title_en' => $request->sub_title_en,
            'sub_title_ru' => $request->sub_title_ru,
            'address_title_az' => $request->address_title_az,
            'address_title_en' => $request->address_title_en,
            'address_title_ru' => $request->address_title_ru,
            'voen_title_az' => $request->voen_title_az,
            'voen_title_en' => $request->voen_title_en,
            'voen_title_ru' => $request->voen_title_ru,
            'email_title' => $request->email_title,
            'phone_title' => $request->phone_title,
            'map' => $request->map,
            'address_icon' => $addressPath,
            'voen_icon' => $voenPath,
            'email_icon' => $emailPath,
            'phone_icon' => $phonePath,
        ]);


        $contact->save();

        
        toastr()->success('Uğurla yeniləndi', 'Congrats');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
