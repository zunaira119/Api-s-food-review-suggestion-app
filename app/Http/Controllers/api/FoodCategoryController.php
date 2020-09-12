<?php

namespace App\Http\Controllers\api;

use App\FoodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
if (!defined('BASE_URL_category_image')) define('BASE_URL_category_image',URL::to('/').'/images/category_images/');
class FoodCategoryController extends Controller
{
    public function food_categories()
    {
        $food_categories = FoodCategory::all();
        foreach ($food_categories as $index => $food_category) {
            $food_category->color_image = BASE_URL_category_image.$food_category->color_image;
            $food_category->black_image = BASE_URL_category_image.$food_category->black_image;
        }
        return response()->json([
            'food_categories' => $food_categories,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'color_image'=>'required',
            'black_image'=>'required'
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'validation error'
            ], 422);
        DB::beginTransaction();
        try {

            $food_category=FoodCategory::create($request->all());
            $food_category->save();
            // you need to save product before adding images
            $color_image=$request->color_image;
            $black_image=$request->black_image;
            if ($request->hasFile('color_image')) {
                $destination = 'images/category_images';
                $filename = strtolower(
                    pathinfo($color_image->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-'
                    . uniqid()
                    . '.'
                    . $color_image->getClientOriginalExtension()
                );
                $color_image->move($destination, $filename);
                str_replace(" ", "-", $filename);
                $food_category->color_image = $filename;
                $food_category->save();
            }
            if ($request->hasFile('black_image')) {
                $destination = 'images/category_images';
                $name = strtolower(
                    pathinfo($black_image->getClientOriginalName(), PATHINFO_FILENAME)
                    . '-'
                    . uniqid()
                    . '.'
                    . $black_image->getClientOriginalExtension()
                );
                $black_image->move($destination, $name);
                str_replace(" ", "-", $name);
                $food_category->black_image = $name;
                $food_category->save();
            }
            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 403);
        }
        return response()->json([
            'message' => 'Food category created '
        ]);
    }

    public function update(Request $request, FoodCategory $food_category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
        ]);
        if ($validator->fails())
            return response()->json([
                'message' => 'validation error',
                'data' => $validator->errors()
            ], 422);
        $food_category->update($request->all());
        return response()->json([
            'message' => 'Food category updated'
        ]);
    }

    public function delete(FoodCategory $food_category)
    {

        $food_category->delete();
        return response()->json([
            'message' => 'deleted successfully'
        ]);
    }


}
