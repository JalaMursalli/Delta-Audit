<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $search = $request->input('search');
        $certificates= Certificate::when($search, function ($query, $search) {
            return $query->where('title_az', 'like', "%{$search}%")
            ->orWhere('title_en', 'like', "%{$search}%")
            ->orWhere('title_ru', 'like', "%{$search}%");;
        })->paginate(10);

        return view('backend.certificate.index', compact('search', 'certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $certificate = new Certificate();
        return view('backend.certificate.create',compact('certificate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'title_az' => ['nullable', 'max:200'],
            'title_en' => ['nullable', 'max:200'],
            'title_ru' => ['nullable', 'max:200'],
            'sub_title_az' => ['nullable', 'max:200'],
            'sub_title_en' => ['nullable', 'max:200'],
            'sub_title_ru' => ['nullable', 'max:200'],
            'image' => ['nullable','image'],

        ]);
        $imagePath = handleUpload('image');
        $certificate = new Certificate();
        $certificate->image = $imagePath;
        $certificate->title_az = $request->title_az;
        $certificate->title_en = $request->title_en;
        $certificate->title_ru = $request->title_ru;
        $certificate->sub_title_az = $request->sub_title_az;
        $certificate->sub_title_en = $request->sub_title_en;
        $certificate->sub_title_ru = $request->sub_title_ru;

        $certificate->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.certificate.index');
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
         $certificate = Certificate::findOrFail($id);
        return view('backend.certificate.edit',compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           'title_az' => ['nullable', 'max:200'],
            'title_en' => ['nullable', 'max:200'],
            'title_ru' => ['nullable', 'max:200'],
            'sub_title_az' => ['nullable', 'max:200'],
            'sub_title_en' => ['nullable', 'max:200'],
            'sub_title_ru' => ['nullable', 'max:200'],
            'image' => ['nullable','image'],
        ]);

        $imagePath = handleUpload('image');
        $certificate = Certificate::findOrFail($id);
        $certificate->image = (!empty($imagePath) ? $imagePath : $certificate->image);
        $certificate->title_az = $request->title_az;
        $certificate->title_en = $request->title_en;
        $certificate->title_ru = $request->title_ru;
        $certificate->sub_title_az = $request->sub_title_az;
        $certificate->sub_title_en = $request->sub_title_en;
        $certificate->sub_title_ru = $request->sub_title_ru;
        $certificate->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.certificate.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        deleteFileIfExist($certificate->image);
        $certificate->delete();
        return redirect()->route('backend.certificate.index')->with('success', 'Uğurla silindi!');
    }
}
