<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Types\Relations\Role;
use Illuminate\Validation\Rule;

use Illuminate\Validation\Rule as ValidationRule;

class CategoryController extends Controller
{
    public function index(){
       $category = CategoryResource::collection( Category::all());
$data = [
"msg"=>"Return all data",
"status"=> 200,
"data"=>$category,
];
       return response()->json($data);
    }
    public function show($id){
        $category = Category::find($id);
if($category){
    $data = [
"msg"=>"Return one of Record",
"status"=> 200,
"data"=> new CategoryResource($category),
];
   return response()->json($data);
}else {
      $data = [
"msg"=>"No such ID ",
"status"=> 205,
"data"=> null
];
   return response()->json($data);
}
    }

    public function delete(Request $request){
        $id = $request->id;
        $category = Category::find($id);
        if($category){
             $imagePath = public_path('img/category/' . $category->cate_image);

        // Check if the image exists
        if (File::exists($imagePath)) {

            // Delete the image file
            File::delete($imagePath);

            $category->delete();
              $data = [
"msg"=>"Deleted Successfully",
"status"=> 200,
"data"=> null
];
   return response()->json($data);
        }else{
               $data = [
"msg"=>"No such iD",
"status"=> 205,
"data"=> null
];
   return response()->json($data);
        }
    }

}
    function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
              'id' => ['required', 'unique:categories,id', 'max:20'],
              'cate_image' => ['required', 'image', 'mimes:png,jpg,jpeg,gif', 'max:2048'],
              'title_en' => ['required', 'min:5', 'max:255'],
              'title_ar' => ['required', 'min:5', 'max:255'],
              'description_en' => ['required', 'min:5', 'max:255'],
              'description_ar' => ['required', 'min:5', 'max:255'],
        ]);
if($validator->fails()){
        $data = [
"msg"=>"Requirment",
"status"=> 201,
"data"=> $validator->errors()
];
return response()->json($data);
}

        // Variable to store uploaded image name
        $imageName = null;

        // Check if an image was uploaded
        if ($request->hasFile("cate_image")) {

            // Get uploaded image
            $image = $request->cate_image;

            // Generate unique image name
            $imageName = rand(1, 10000) . "_" . time() . "." . $image->extension();

            // Move image to public folder
            $image->move(
                public_path("img/category/"),
                $imageName
            );
             // Create a new category record
   $data =  Category::create([
            "id" => $request->id,
            "cate_image" => $imageName,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
        ]);

            $data = [
"msg"=>"created successfully",
"status"=> 200,
"data"=> new CategoryResource($data),
];
return response()->json($data);
        }
}

  public function update(Request $request, $id)
    {
        // Retrieve old category ID from the form
        $old_id = $request->old_id;

        // Find category using the old ID
        $category = Category::find($old_id);
if ($category){
    // Validate incoming request data
     $validator = Validator::make($request->all(), [
         'id' => [
            'required',
            'max:20',
            Rule::unique('categories', 'id')->ignore($old_id, 'id'),
        ],
        'cate_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        'title_en' => ['required', 'min:5', 'max:255'],
        'title_ar' => ['required', 'min:5', 'max:255'],
        'description_en' => ['required', 'min:5', 'max:255'],
        'description_ar' => ['required', 'min:5', 'max:255'],
          ]);
          if($validator->fails()){
    $data = [
    "msg"=>"Requirment",
    "status"=> 201,
    "data"=> $validator->errors()
    ];
    return response()->json($data);
    }

    // Handle image upload if a new image is provided
    if ($request->hasFile('cate_image')) {

        // Get uploaded image
        $image = $request->cate_image;

        // Generate a new image name
        $imageName = rand(1, 10000) . "_" . time() . "." . $image->extension();

        // Save the new image
        $image->move(
            public_path('img/category/'),
            $imageName
        );

        // Get old image path
        $imagePath = public_path('img/category/' . $category->cate_image);

        // Delete old image if it exists
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

    } else {

        // Keep existing image if no new image uploaded
        $imageName = $category->cate_image;
    }

    // Update category information
    $category->update([
        'id' => $request->id,
        'cate_image' => $imageName,
        'title_en' => $request->title_en,
        'title_ar' => $request->title_ar,
        'description_en' => $request->description_en,
        'description_ar' => $request->description_ar,
    ]);
              $data = [
    "msg"=>"updated successfully",
    "status"=> 200,
    "data"=> new CategoryResource($category)
    ];
    return response()->json($data);
}else{
               $data = [
"msg"=>"No such ID",
"status"=> 205,
"data"=> null
];
return response()->json($data);
}
}
}

