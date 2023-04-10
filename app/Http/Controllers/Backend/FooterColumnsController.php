<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\FooterColumns;
use App\Http\Requests\StoreFooterColumnsRequest;
use App\Http\Requests\UpdateFooterColumnsRequest;

class FooterColumnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerColumns = FooterColumns::query()->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.footerColumns.index', compact('footerColumns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.footerColumns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFooterColumnsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFooterColumnsRequest $request)
    {
        $footerColumns = new FooterColumns([
            'column'        =>      $request->get('column'),
            'title'        =>      $request->get('title'),
        ]);

        $footerColumns->save();
        $message = "ستون جدید با موفقیت افزوده شد";
        return redirect()->route('footerColumns.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\FooterColumns  $footerColumns
     * @return \Illuminate\Http\Response
     */
    public function show(FooterColumns $footerColumns)
    {
        return view('admin.pages.footerColumns.show', compact('footerColumns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\FooterColumns  $footerColumns
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterColumns $footerColumns)
    {
        return view('admin.pages.footerColumns.edit', compact('footerColumns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFooterColumnsRequest  $request
     * @param  \App\Models\Backend\FooterColumns  $footerColumns
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFooterColumnsRequest $request, FooterColumns $footerColumns)
    {
        $footerColumns->update($request->all());
        $message = "ویرایش ستون انجام شد";
        return redirect()->route('footerColumns.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\FooterColumns  $footerColumns
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterColumns $footerColumns)
    {
        $footerColumns->delete();
        $message = "حذف ستون انجام شد";
        return redirect()->route('footerColumns.index')->with('warning', $message);
    }

    /**
     * @param FooterColumns $footerColumns
     */
    public function status(FooterColumns $footerColumns)
    {
        if ($footerColumns->status === 1){
            $footerColumns->status = 0;
        } elseif ($footerColumns->status === 0){
            $footerColumns->status = 1;
        }
        $footerColumns->save();
        return redirect()->back();
    }
}
