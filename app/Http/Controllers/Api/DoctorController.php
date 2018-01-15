<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
	public function index()
	{
		$doctors = \App\Doctor::select("name", "crm", "expertise", "email", "observation", "phone", "cellphone", "civil_status", "sex", "birth", "street", "number", "district", "state", "cep")
								->get();

		return response()->json($doctors);
	}

	public function show($id)
	{
		$doctor = \App\Doctor::find($id);

		if(!$doctor) {
			return response()->json([
			    'message' => 'Record not found',
			], 404);
		}

		return response()->json($doctor);
	}
}
