<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutUs;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUss = AboutUs::query()->get();
        return view('admin.pages.aboutUs.index', compact('aboutUss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.aboutUs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutUsRequest $request)
    {
        $aboutUs = new AboutUs([
            'title'  =>  $request->get('title'),
            'description'  =>  $request->get('description'),
        ]);
        $aboutUs->save();
        $message = "محتوا جدید افزوده شد";
        return redirect()->route('aboutUs.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        return view('admin.pages.aboutUs.show', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        return view('admin.pages.aboutUs.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutUsRequest  $request
     * @param  \App\Models\Backend\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        $aboutUs->update($request->all());
        $message = "محتوا به روز شد";
        return redirect()->route('aboutUs.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        $message = "محتوا حذف شد";
        return redirect()->route('aboutUs.index')->with('success', $message);
    }

    /**
     * @param AboutUs $aboutUs
     */
    public function status(AboutUs $aboutUs)
    {
        if ($aboutUs->status === 1){
            $aboutUs->status = 0;
        } elseif ($aboutUs->status === 0){
            $aboutUs->status = 1;
        }
        $aboutUs->save();
        return redirect()->back();
    }
}
