<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use App\Models\Comment;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'category',
            'location'
        ])->get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::with([
            'category',
            'location',
            'images'
        ])->findOrFail($id);

        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $locations  = Location::all();

        return view('products.create', [
            'categories' => $categories,
            'locations'  => $locations
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => ['required'],
            'location_id'   => ['required'],
            'name'          => ['required'],
            'brand'         => ['required'],
            'model'         => ['required'],
            'year'          => ['required'],
            'color'         => ['required'],
            'transmission'  => ['required'],
            'fuel_type'     => ['required'],
            'seats'         => ['required'],
            'description'   => ['required'],
            'daily_price'   => ['required'],
            'image'         => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'car_images.*'  => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $imageName = null;

        /*
        |--------------------------------------------------------------------------
        | Upload main image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand(1, 10000) . '_' . time() . '.' . $image->extension();
            $image->move(public_path('img/product'), $imageName);
        }

        /*
        |--------------------------------------------------------------------------
        | Create product
        |--------------------------------------------------------------------------
        */
        $product = Product::create([
            'category_id'     => $request->category_id,
            'location_id'     => $request->location_id,
            'name'            => $request->name,
            'brand'           => $request->brand,
            'model'           => $request->model,
            'year'            => $request->year,
            'color'           => $request->color,
            'transmission'    => $request->transmission,
            'fuel_type'       => $request->fuel_type,
            'seats'           => $request->seats,
            'description'     => $request->description,
            'status'          => '1',
            'available'       => true,
            'daily_price'     => $request->daily_price,
            'weekly_price'    => $request->weekly_price,
            'monthly_price'   => $request->monthly_price,
            'deposit_amount'  => $request->deposit_amount,
            'image'           => $imageName,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Save gallery images into car_images table
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('car_images')) {
            foreach ($request->file('car_images') as $index => $galleryImage) {
                $galleryName = rand(1, 10000) . '_' . time() . '_' . $index . '.' . $galleryImage->extension();

                $galleryImage->move(
                    public_path('img/product/gallery'),
                    $galleryName
                );

                CarImage::create([
                    'product_id' => $product->id,
                    'image'      => $galleryName,
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with('message', 'Created Successfully');
    }

    public function edit($id)
    {
        $product    = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        $locations  = Location::all();

        return view('products.edit', [
            'product'    => $product,
            'categories' => $categories,
            'locations'  => $locations
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::with('images')->findOrFail($id);

        $request->validate([
            'category_id'   => ['required'],
            'location_id'   => ['required'],
            'name'          => ['required'],
            'brand'         => ['required'],
            'model'         => ['required'],
            'year'          => ['required'],
            'color'         => ['required'],
            'transmission'  => ['required'],
            'fuel_type'     => ['required'],
            'seats'         => ['required'],
            'description'   => ['required'],
            'daily_price'   => ['required'],
            'image'         => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'car_images.*'  => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $imageName = $product->image;

        /*
        |--------------------------------------------------------------------------
        | Update main image if uploaded
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = rand(1, 10000) . '_' . time() . '.' . $image->extension();

            $image->move(public_path('img/product'), $imageName);

            $oldImage = public_path('img/product/' . $product->image);

            if ($product->image && File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Update product data
        |--------------------------------------------------------------------------
        */
        $product->update([
            'category_id'     => $request->category_id,
            'location_id'     => $request->location_id,
            'name'            => $request->name,
            'brand'           => $request->brand,
            'model'           => $request->model,
            'year'            => $request->year,
            'color'           => $request->color,
            'transmission'    => $request->transmission,
            'fuel_type'       => $request->fuel_type,
            'seats'           => $request->seats,
            'description'     => $request->description,
            'daily_price'     => $request->daily_price,
            'weekly_price'    => $request->weekly_price,
            'monthly_price'   => $request->monthly_price,
            'deposit_amount'  => $request->deposit_amount,
            'image'           => $imageName,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Add new gallery images if uploaded
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('car_images')) {
            $lastSort = $product->images()->max('sort_order') ?? 0;

            foreach ($request->file('car_images') as $index => $galleryImage) {
                $galleryName = rand(1, 10000) . '_' . time() . '_' . $index . '.' . $galleryImage->extension();

                $galleryImage->move(
                    public_path('img/product/gallery'),
                    $galleryName
                );

                CarImage::create([
                    'product_id' => $product->id,
                    'image'      => $galleryName,
                    'sort_order' => $lastSort + $index + 1,
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with('message', 'Updated Successfully');
    }

    public function showFront($id)
    {
        $product = Product::with([
            'category',
            'location',
            'comments.user',
            'images',
            'favorites'
        ])->findOrFail($id);

        $avgRating   = $product->comments()->avg('rating') ?? 0;
        $ratingCount = $product->comments()->count();

        return view('cars.show', compact('product', 'avgRating', 'ratingCount'));
    }

    /*
    |--------------------------------------------------------------------------
    | Delete one gallery image from car_images table + folder
    |--------------------------------------------------------------------------
    */
    public function deleteGalleryImage($id)
    {
        $image = CarImage::findOrFail($id);

        $imagePath = public_path('img/product/gallery/' . $image->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $image->delete();

        return back()->with('message', 'Gallery image deleted successfully');
    }

    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Delete main image
        |--------------------------------------------------------------------------
        */
        $imagePath = public_path('img/product/' . $product->image);

        if ($product->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete gallery images files + records
        |--------------------------------------------------------------------------
        */
        foreach ($product->images as $galleryImage) {
            $galleryPath = public_path('img/product/gallery/' . $galleryImage->image);

            if (File::exists($galleryPath)) {
                File::delete($galleryPath);
            }

            $galleryImage->delete();
        }

        $product->delete();

        return redirect()
            ->back()
            ->with('message', 'Deleted Successfully');
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
            'rating'  => 'required|integer|min:1|max:5'
        ]);

        Comment::create([
            'user_id'    => Auth::id(),
            'product_id' => $id,
            'comment'    => $request->comment,
            'rating'     => $request->rating,
        ]);

        return back()->with('message', 'Comment added successfully');
    }
}
