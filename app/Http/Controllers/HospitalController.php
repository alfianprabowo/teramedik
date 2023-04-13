<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class HospitalController extends Controller{
    public function index(Request $request)
    {  
        $perPage = $request->input('results', 20);
        if (!is_numeric($perPage)) {
            $perPage = 20;
          }
        return response()->json(Hospital::paginate($perPage)); 
    }

    public function show($id)
    {
        $hospital = Hospital::find($id);

        if ($hospital) {
            return response()->json([ 
                'data'      => $hospital
            ], 200);
        } else {
            return response()->json([ 
                'data' => $hospital
            ], 404);
        }
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'image' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);
    
        } else {
    
            $hospital = Hospital::create([
                'name'     => $request->input('name'),
                'image'   => $request->input('image'),
                'address'   => $request->input('address'),
                'province'     => $request->input('province'),
                'city'   => $request->input('city'),
                'district'     => $request->input('district'),
                'sub_district'   => $request->input('sub_district'),
                'lat'     => $request->input('lat'),
                'lng'   => $request->input('lng'),
                'phone'     => $request->input('phone'),
                'email'   => $request->input('email'),
                'description'     => $request->input('description'),
            ]);
    
            if ($hospital) {
                return response()->json([
                    'success' => true,
                    'message' => 'Rumah Sakit Berhasil Disimpan!',
                    'data' => $hospital
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Rumah Sakit Gagal Disimpan!',
                ], 400);
            }
    
        }
    }
}
 