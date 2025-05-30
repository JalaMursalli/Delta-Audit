<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $services= Service::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.service.index', compact('search', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        return view('backend.service.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required','image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'short_description_az' => ['nullable'],
            'short_description_en' => ['nullable'],
            'short_description_ru' => ['nullable'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'image' => ['required','image'],

        ]);
        $iconPath = handleUpload('icon');
        $imagePath = handleUpload('image');
        $service = new Service();
        $service->icon = $iconPath;
        $service->image = $imagePath;
        $service->title_az = $request->title_az;
        $service->title_en = $request->title_en;
        $service->title_ru = $request->title_ru;
        $service->short_description_az = $request->short_description_az;
        $service->short_description_en = $request->short_description_en;
        $service->short_description_ru = $request->short_description_ru;
        $service->description_az = $request->description_az;
        $service->description_en = $request->description_en;
        $service->description_ru = $request->description_ru;

        $service->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.service.index');
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
        $service = Service::findOrFail($id);
        return view('backend.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['image'],
            'title_az' => ['required', 'max:200'],
            'title_en' => ['required', 'max:200'],
            'title_ru' => ['required', 'max:200'],
            'short_description_az' => ['nullable'],
            'short_description_en' => ['nullable'],
            'short_description_ru' => ['nullable'],
            'description_az' => ['nullable'],
            'description_en' => ['nullable'],
            'description_ru' => ['nullable'],
            'image' => ['image'],

        ]);
        $iconPath = handleUpload('icon');
        $imagePath = handleUpload('image');
        $service = Service::findOrFail($id);
        $service->icon = (!empty($iconPath) ? $iconPath : $service->icon);
        $service->image = (!empty($imagePath) ? $imagePath : $service->image);
        $service->title_az = $request->title_az;
        $service->title_en = $request->title_en;
        $service->title_ru = $request->title_ru;
        $service->short_description_az = $request->short_description_az;
        $service->short_description_en = $request->short_description_en;
        $service->short_description_ru = $request->short_description_ru;
        $service->description_az = $request->description_az;
        $service->description_en = $request->description_en;
        $service->description_ru = $request->description_ru;
        $service->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        deleteFileIfExist($service->icon);
        deleteFileIfExist($service->image);
        $service->delete();
        return redirect()->route('backend.service.index')->with('success', 'Uğurla silindi!');
    }
}
