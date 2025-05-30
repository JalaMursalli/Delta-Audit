<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function index()
    {
        $settings = Translation::pluck('value_' . app()->getLocale(), 'key')->toArray();
        return response([
            'status' => 'success',
            'data' => $settings,
        ]);
    }
}
