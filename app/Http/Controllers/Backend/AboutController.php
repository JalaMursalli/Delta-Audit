<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('backend.about.index',compact('about'));
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
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'image1' => ['nullable', 'image'],
            'image2' => ['nullable', 'image'],
        ]);


        $about = About::find($id);
        if (!$about) {
            $about = new About();
        }


        if ($request->hasFile('image1')) {
            $imagePath1 = handleUpload('image1');
        } else {

            $imagePath1 = $about->image1;
        }
        if ($request->hasFile('image2')) {
            $imagePath2 = handleUpload('image2');
        } else {

            $imagePath2 = $about->image2;
        }


        $about->fill([
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'description_az' => $request->description_az,
            'description_en' => $request->description_en,
            'description_ru' => $request->description_ru,
            'image1' => $imagePath1,
            'image2' => $imagePath2,
        ]);

        $about->save();


        toastr()->success('Uğurla yeniləndi', 'Congrats');
        return redirect()->back();
    }


    public function destroy(string $id)
    {
        //
    }
}
