<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $header = Header::first();
        return view('backend.header.index',compact('header'));
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'phone_title' => ['nullable','max:200'],
            'phone_icon' => ['nullable','image'],
            'image' => ['nullable', 'image'],
            'fav_icon' => ['nullable','image'],
        ]);

        $header = Header::find($id);

        if (!$header) {
            $header = new Header();
        }



        if ($request->hasFile('phone_icon')) {
            $phonePath = handleUpload('phone_icon');
        } else {
         
            $phonePath = $header->phone_icon;
        }
        if ($request->hasFile('image')) {
                $imagePath = handleUpload('image');
            } else {

                $imagePath = $header->image;
            }
             if ($request->hasFile('fav_icon')) {
            $favPath = handleUpload('fav_icon');
        } else {

            $phonePath = $header->phone_icon;
        }
        $header->fill([
            'phone_title' => $request->phone_title,
            'phone_icon' => $phonePath,
            'image' => $imagePath,
            'fav_icon' => $favPath,
        ]);


        $header->save();


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
