<?php

namespace App\Http\Controllers\api;

use App\Filter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{
    public function filters()
    {
        $filters = Filter::all();
        return response()->json([
            'filters' => $filters,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'validation error'
            ], 422);
        Filter::create($request->all());
        return response()->json([
            'message' => 'filter created '
        ]);
    }
}
