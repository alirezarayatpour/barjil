<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\FooterItem;
use App\Http\Requests\StoreFooterItemRequest;
use App\Http\Requests\UpdateFooterItemRequest;

class FooterItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerItems = FooterItem::query()->orderBy('id', 'DESC')->get();
        return view('admin.pages.footerItem.index', compact('footerItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.footerItem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFooterItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFooterItemRequest $request)
    {
        $footerItems = new FooterItem([
            'column'        =>      $request->get('column'),
            'item'        =>      $request->get('item'),
            'link'        =>      $request->get('link'),
        ]);

        $footerItems->save();
        $message = "آیتم جدید با موفقیت افزوده شد";
        return redirect()->route('footerItem.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\FooterItem  $footerItem
     * @return \Illuminate\Http\Response
     */
    public function show(FooterItem $footerItem)
    {
        return view('admin.pages.footerItem.show', compact('footerItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\FooterItem  $footerItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterItem $footerItem)
    {
        return view('admin.pages.footerItem.edit', compact('footerItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFooterItemRequest  $request
     * @param  \App\Models\Backend\FooterItem  $footerItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFooterItemRequest $request, FooterItem $footerItem)
    {
        $footerItem->update($request->all());
        $message = "ویرایش آیتم انجام شد";
        return redirect()->route('footerItem.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\FooterItem  $footerItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterItem $footerItem)
    {
        $footerItem->delete();
        $message = "حذف آیتم انجام شد";
        return redirect()->route('footerItem.index')->with('warning', $message);
    }

    /**
     * @param FooterItem $footerItem
     */
    public function status(FooterItem $footerItem)
    {
        if ($footerItem->status === 1){
            $footerItem->status = 0;
        } elseif ($footerItem->status === 0){
            $footerItem->status = 1;
        }
        $footerItem->save();
        return redirect()->back();
    }
}
