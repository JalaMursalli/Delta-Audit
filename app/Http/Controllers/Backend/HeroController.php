<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $heros= Hero::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.hero.index', compact('search', 'heros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hero = new Hero();
        return view('backend.hero.create',compact('hero'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'sub_title_az' => ['nullable'],
            'sub_title_en' => ['nullable'],
            'sub_title_ru' => ['nullable'],
            'image' => ['nullable', 'image'],
            'video' => ['nullable', 'file', 'mimetypes:video/mp4,video/avi, video/mpeg,video/x-msvideo,video/quicktime'], // Add video support

        ]);
        $imagePath = handleUpload('image');
        $videoPath = handleUpload('video');
        $hero = new Hero();
        $hero->image = $imagePath;
        $hero->video = $videoPath;
        $hero->title_az = $request->title_az;
        $hero->title_en = $request->title_en;
        $hero->title_ru = $request->title_ru;
        $hero->sub_title_az = $request->sub_title_az;
        $hero->sub_title_en = $request->sub_title_en;
        $hero->sub_title_ru = $request->sub_title_ru;

        $hero->save();

        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.hero.index');
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
        $hero = Hero::findOrFail($id);
        return view('backend.hero.edit',compact('hero'));
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
            'sub_title_az' => ['nullable'],
            'sub_title_en' => ['nullable'],
            'sub_title_ru' => ['nullable'],
             'image' => ['nullable', 'image'], 
           'video' => ['nullable', 'file', 'mimetypes:video/mp4,video/avi, video/mpeg,video/x-msvideo,video/quicktime'], // Add video support


        ]);
        $imagePath = handleUpload('image');
        $videoPath = handleUpload('video');
        $hero = Hero::findOrFail($id);
        $hero->image = (!empty($imagePath) ? $imagePath : $hero->image);
        $hero->video = !empty($videoPath) ? $videoPath : $hero->video;
        $hero->title_az = $request->title_az;
        $hero->title_en = $request->title_en;
        $hero->title_ru = $request->title_ru;
        $hero->sub_title_az = $request->sub_title_az;
        $hero->sub_title_en = $request->sub_title_en;
        $hero->sub_title_ru = $request->sub_title_ru;
        $hero->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.hero.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hero = Hero::findOrFail($id);
        deleteFileIfExist($hero->image);
        deleteFileIfExist($hero->video);
        $hero->delete();
        return redirect()->route('backend.hero.index')->with('success', 'Uğurla silindi!');
    }
}
