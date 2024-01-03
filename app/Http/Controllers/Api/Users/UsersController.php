<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UsersCategoriesResource;
use App\Models\Category;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function create()
    {
        $categories = Category::whereStatus(1)->get();

        return UsersCategoriesResource::collection($categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'country'               => 'required',
            'phone'                 => 'required|numeric',
            'address'               => 'required',
            'category_id'           => 'required',
            'specialization'        => 'required',
            'subject'               => 'required',
            'message'               => 'required|max:150',
            'qualifications'        => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'national_id'           => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'passport_copy'         => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'cv'                    => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'other_document'        => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => true, 'messages' => $validator->errors()], 200);
        }

        $data['name']              = $request->name;
        $data['email']             = $request->email;
        $data['country']           = $request->country;
        $data['phone']             = $request->phone;
        $data['address']           = $request->address;
        $data['category_id']       = $request->category_id;
        $data['specialization']    = $request->specialization;
        $data['subject']           = $request->subject;
        $data['message']           = Purify::clean($request->message);


        $filesData = $request->only(['qualifications', 'national_id', 'passport_copy', 'cv', 'other_document']);
        foreach ($filesData as $key => $file) {
            if ($file) {

                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public', $filename);
                $filesData[$key] = $filePath;
            } else {
                $filesData[$key] = null;
            }
            $data[$key]           = $filename;
        }
        Scholarship::create($data);

        return response()->json([
            'errors' => false,
            'message' => 'created successfully',
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['errors' => false, 'message' => 'Successfully logged out']);
    }



}
