<?php

namespace App\Http\Controllers\Backend;

use App\Models\FooterSocial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $socials = FooterSocial::when($search, function ($query, $search) {
            return $query->where('url', 'like', "%{$search}%");
        })->paginate(10);

        return view('backend.footer-social.index', compact('search', 'socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $social = new FooterSocial();
        return view('backend.footer-social.create',compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required','image'],
            'url' => ['required', 'url']
        ]);
        $iconPath = handleUpload('icon');
        $social = new FooterSocial();
        $social->icon = $iconPath;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yaradıldı');
        return redirect()->route('backend.footer-social.index');
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
        $social = FooterSocial::findOrFail($id);
        return view('backend.footer-social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['image'],
            'url' => ['required', 'url']
        ]);
        $iconPath = handleUpload('icon');
        $social = FooterSocial::findOrFail($id);
        $social->icon = (!empty($iconPath)? $iconPath : $social->icon ) ;
        $social->url = $request->url;
        $social->save();
        toastr()->success('Uğurla yeniləndi');
        return redirect()->route('backend.footer-social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = FooterSocial::findOrFail($id);
        deleteFileIfExist(filePath: $social->icon);
        $social->delete();
        return redirect()->route('backend.footer-social.index')->with('success', 'Uğurla silindi!');
    }
}
