<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', [
            'result' => $categories
        ]);
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', [
            'result' => $category
        ]);
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'cate_image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'title_en' => ['required', 'min:3', 'max:255'],
            'title_ar' => ['required', 'min:3', 'max:255'],
            'description_en' => ['required'],
            'description_ar' => ['required'],
        ]);


        $imageName = null;


        if ($request->hasFile('cate_image')) {

            $image = $request->file('cate_image');

            $imageName = rand(1, 10000) . '_' . time() . '.' . $image->extension();


            $image->move(
                public_path('img/category'),
                $imageName
            );
        }


        Category::create([
            'cate_image' => $imageName,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'status' => '1'
        ]);


        return redirect()
            ->route('categories.index')
            ->with('message', 'Created Successfully');
    }



    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', [
            'category' => $category
        ]);
    }




    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);



        $request->validate([
            'cate_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'title_en' => ['required', 'min:3', 'max:255'],
            'title_ar' => ['required', 'min:3', 'max:255'],
            'description_en' => ['required'],
            'description_ar' => ['required'],
        ]);



        $imageName = $category->cate_image;



        if ($request->hasFile('cate_image')) {

            $image = $request->file('cate_image');


            $imageName = rand(1, 10000) . '_' . time() . '.' . $image->extension();


            $image->move(
                public_path('img/category'),
                $imageName
            );



            $oldImage = public_path('img/category/' . $category->cate_image);



            if (File::exists($oldImage)) {

                File::delete($oldImage);

            }
        }




        $category->update([

            'cate_image' => $imageName,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,

        ]);




        return redirect()
            ->route('categories.index')
            ->with('message', 'Updated Successfully');
    }





    public function destroy($id)
    {
        $category = Category::findOrFail($id);



        $imagePath = public_path('img/category/' . $category->cate_image);



        if (File::exists($imagePath)) {

            File::delete($imagePath);

        }



        $category->delete();



        return redirect()
            ->route('categories.index')
            ->with('message', 'Deleted Successfully');
    }
}
