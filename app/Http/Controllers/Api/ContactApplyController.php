<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactApplyRequest;
use App\Models\ContactApply;
use Illuminate\Http\Request;

class ContactApplyController extends Controller
{
    public function send(ContactApplyRequest $request)
    {
        try {
            $request->validated();

            $contact_apply = new ContactApply();
            $contact_apply->name = $request->get('name');
            $contact_apply->service_id = $request->get('service_id');
            $contact_apply->email = $request->get('email');
            $contact_apply->text = $request->get('text');
            $contact_apply->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Apply has been sent successfully',
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ],400);
        }
    }
}
