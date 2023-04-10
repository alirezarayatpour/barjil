<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Image;
use App\Models\Backend\Parameter;
use App\Models\Backend\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.product.index', compact('products', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
//        if ($request->hasFile('cover')) {
//            $file = $request->file('cover');
//            $imageName = 'cover'.'-'.time() . '-' . $file->getClientOriginalName();
//            $file->move('image/cover/', $imageName);
//
//            $product = new Product([
//                'title'             =>      $request->get('title'),
//                'description'       =>      $request->get('description'),
//                'count'             =>      $request->get('count'),
//                'price'             =>      $request->get('price'),
//                'sale'              =>      $request->get('sale'),
//                'category_id'       =>      $request->get('category_id'),
//                'cover_1'           =>      $imageName,
//                'cover_2'           =>      $imageName,
//            ]);
//            $product->save();
//        }

        $imageName_1 = 'cover_1'.'-'.time().'.'.$request->cover_1->getClientOriginalExtension();
        $request->cover_1->move('image/cover_1', $imageName_1);

        $imageName_2 = 'cover_2'.'-'.time().'.'.$request->cover_2->getClientOriginalExtension();
        $request->cover_2->move('image/cover_2', $imageName_2);

        $product = new Product([
                'title'             =>      $request->get('title'),
                'description'       =>      $request->get('description'),
                'storage'           =>      $request->get('storage'),
                'price'             =>      $request->get('price'),
                'sale'              =>      $request->get('sale'),
                'category_id'       =>      $request->get('category_id'),
                'cover_1'           =>      $imageName_1,
                'cover_2'           =>      $imageName_2,
            ]);
            $product->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = 'images'.'-'.time() . '-' . $file->getClientOriginalName();
                $request['product_id'] = $product->id;
                $request['image'] = $imageName;
                $file->move('image/images/', $imageName);
                Image::create($request->all());
            }
        }

        $message = "محصول جدید با موفقیت افزوده شد";
        return redirect()->route('product.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = Image::query()->get();
        return view('admin.pages.product.show', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $images = Image::query()->get();
        $categories = Category::query()->get();
        return view('admin.pages.product.edit', compact('product', 'images', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product, Image $image)
    {
        if($request->hasFile("cover_1")){
            if (file_exists("cover_1/".$product->cover_1)) {
                unlink("cover_1/".$product->cover_1);
            }
            $imageName_1 = 'cover_1'.'-'.time().'.'.$request->cover_1->getClientOriginalExtension();
            $request->cover_1->move('image/cover_1', $imageName_1);
        }

        if($request->hasFile("cover_2")){
            if (file_exists("cover_2/".$product->cover_2)) {
                unlink("cover_2/".$product->cover_2);
            }
            $imageName_2 = 'cover_2'.'-'.time().'.'.$request->cover_2->getClientOriginalExtension();
            $request->cover_2->move('image/cover_2', $imageName_2);
        }

        $product->cover_1       =       $imageName_1;
        $product->cover_2       =       $imageName_2;
        $product->title         =       $request->title;
        $product->description   =       $request->description;
        $product->storage       =       $request->storage;
        $product->price         =       $request->price;
        $product->sale          =       $request->sale;
        $product->category_id     =       $request->category_id;
        $product->save();

        if ($request->hasFile('images')) {
            if (file_exists("images/".$image->image)) {
                unlink("images/".$image->image);
            }
            $files = $request->file('images');
            foreach ($files as $file) {
                $imageName = 'images'.'-'.time() . '-' . $file->getClientOriginalName();
                $request['product_id'] = $product->id;
                $request['image'] = $imageName;
                $file->move('image/images/', $imageName);
                Image::create($request->all());
            }
        }

        $message = "ویرایش محصول انجام شد";
        return redirect()->route('product.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (File::exists("cover/".$product->cover)) {
            File::delete("cover/".$product->cover);
        }

        $images=Image::where("product_id",$product->id)->get();
        foreach($images as $image){
            if (File::exists("images/".$image->image)) {
                File::delete("images/".$image->image);
            }
        }

        $product->delete();
        $message = "حذف محصول انجام شد";
        return redirect()->route('product.index')->with('warning', $message);
    }

    /**
     * @param Product $product
     */
    public function exist(Product $product)
    {
        if ($product->exist === 1){
            $product->exist = 0;
        } elseif ($product->exist === 0){
            $product->exist = 1;
        }
        $product->save();
        return redirect()->back();
    }

    /**
     * @param Product $product
     */
    public function status(Product $product)
    {
        if ($product->status === 1){
            $product->status = 0;
        } elseif ($product->status === 0){
            $product->status = 1;
        }
        $product->save();
        return redirect()->back();
    }
}
