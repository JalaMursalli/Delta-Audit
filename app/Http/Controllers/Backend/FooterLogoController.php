<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterLogo;
use Illuminate\Http\Request;

class FooterLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footer = FooterLogo::first();
        return view('backend.footer-logo.index',compact('footer'));
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

            $request->validate([
                'description_az' => ['nullable'],
                'description_en' => ['nullable'],
                'description_ru' => ['nullable'],
                'image' => ['nullable', 'image'],
            ]);


            $footer = FooterLogo::find($id);


            if (!$footer) {
                $footer = new FooterLogo();
            }


            if ($request->hasFile('image')) {
                $imagePath = handleUpload('image');
            } else {

                $imagePath = $footer->image;
            }


            $footer->fill([
                'description_az' => $request->description_az,
                'description_en' => $request->description_en,
                'description_ru' => $request->description_ru,
                'image' => $imagePath,
            ]);

            $footer->save();

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
