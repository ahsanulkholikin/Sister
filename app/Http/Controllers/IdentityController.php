<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class IdentityController extends Controller
{
    public function index()
    {
        //get posts
        $posts = Identity::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data :', $posts);
    }
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'idNumber' => 'required|max:20',
            'fullname' => 'required|max:100',
            'gender' => 'required|in:male,female',
            'IDType' => 'required|in:KTP,Passport',
            'address' => 'required',
            'religion' => 'required|max:50',
            'maritalStatus' => 'required|in:single,married,divarcee',
            'pob' => 'required|max:50',
            'dob' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = Identity::create([
            'idNumber'      => $request->idNumber,
            'fullname'      => $request->fullname,
            'gender'        => $request->gender,
            'IDType'        => $request->IDType,
            'address'       => $request->address,
            'religion'      => $request->religion,
            'maritalStatus' => $request->maritalStatus,
            'pob'           => $request->pob,
            'dob'           => $request->dob,
        ]);

        //return response
        return new PostResource(true, 'Data Berhasil Ditambahkan!', $post);
    }
    public function show(Identity $identity)
    {
        //return single post as a resource
        return new PostResource(true, 'Data Ditemukan!', $identity);
    } 

}
