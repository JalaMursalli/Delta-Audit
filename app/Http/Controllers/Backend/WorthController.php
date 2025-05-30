<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Worth;
use Illuminate\Http\Request;

class WorthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $worths= Worth::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.worth.index', compact('search', 'worths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $worth = new Worth();
        return view('backend.worth.create',compact('worth'));
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
            'sub_title_az' => ['nullable'],
            'sub_title_en' => ['nullable'],
            'sub_title_ru' => ['nullable'],
            'w_number' => ['nullable','numeric']

        ]);
        $iconPath = handleUpload('icon');
        $worth = new Worth();
        $worth->icon = $iconPath;
        $worth->title_az = $request->title_az;
        $worth->title_en = $request->title_en;
        $worth->title_ru = $request->title_ru;
        $worth->sub_title_az = $request->sub_title_az;
        $worth->sub_title_en = $request->sub_title_en;
        $worth->sub_title_ru = $request->sub_title_ru;
        $worth->w_number = $request->w_number;
        $worth->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.worth.index');
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
        $worth = Worth::findOrFail($id);
        return view('backend.worth.edit',compact('worth'));
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
            'sub_title_az' => ['nullable'],
            'sub_title_en' => ['nullable'],
            'sub_title_ru' => ['nullable'],
            'image' => ['image'],
            'w_number' => ['nullable','numeric']

        ]);
        $iconPath = handleUpload('icon');
        $worth = Worth::findOrFail($id);
        $worth->icon = (!empty($iconPath) ? $iconPath : $worth->icon);
        $worth->title_az = $request->title_az;
        $worth->title_en = $request->title_en;
        $worth->title_ru = $request->title_ru;
        $worth->sub_title_az = $request->sub_title_az;
        $worth->sub_title_en = $request->sub_title_en;
        $worth->sub_title_ru = $request->sub_title_ru;
        $worth->w_number = $request->w_number;
        $worth->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.worth.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $worth = Worth::findOrFail($id);
        deleteFileIfExist($worth->icon);
        $worth->delete();
        return redirect()->route('backend.worth.index')->with('success', 'Uğurla silindi!');
    }
}
