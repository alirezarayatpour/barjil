<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Backend\Category;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::query()->orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.pages.banner.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $imageName = 'banner'.'-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('image/banner', $imageName);

        $banner = new Banner([
            'image'      =>      $imageName,
            'position'    =>      $request->get('position'),
            'category_id'    =>      $request->get('category_id'),
        ]);

        $banner->save();
        $message = "بنر جدید با موفقیت افزوده شد";
        return redirect()->route('banner.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.pages.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $categories = Category::query()->get();
        return view('admin.pages.banner.edit', compact('banner', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Backend\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        if (file_exists('image/banner'.$banner->image)){
            unlink('image/banner'.$banner->image);
        }

        $imageName = 'banner'.'-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('image/banner', $imageName);

        $banner->image      =       $imageName;
        $banner->position   =       $request->position;
        $banner->category_id   =       $request->category_id;

        $banner->save();
        $message = "ویرایش بنر انجام شد";
        return redirect()->route('banner.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        $message = "حذف بنر انجام شد";
        return redirect()->route('banner.index')->with('warning', $message);
    }

    /**
     * @param Banner $banner
     */
    public function status(Banner $banner)
    {
        if ($banner->status === 1){
            $banner->status = 0;
        } elseif ($banner->status === 0){
            $banner->status = 1;
        }
        $banner->save();
        return redirect()->back();
    }
}
