<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::query()->get();
        return view('admin.pages.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        $faq = new Faq([
            'title'  =>  $request->get('title'),
            'description'  =>  $request->get('description'),
        ]);
        $faq->save();
        $message = "محتوا جدید افزوده شد";
        return redirect()->route('faq.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('admin.pages.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqRequest  $request
     * @param  \App\Models\Backend\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->all());
        $message = "محتوا به روز شد";
        return redirect()->route('faq.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        $message = "محتوا حذف شد";
        return redirect()->route('faq.index')->with('success', $message);
    }

    /**
     * @param Faq $faq
     */
    public function status(Faq $faq)
    {
        if ($faq->status === 1){
            $faq->status = 0;
        } elseif ($faq->status === 0){
            $faq->status = 1;
        }
        $faq->save();
        return redirect()->back();
    }
}
