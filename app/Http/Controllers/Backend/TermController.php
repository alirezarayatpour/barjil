<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Term;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::query()->get();
        return view('admin.pages.term.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.term.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTermRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermRequest $request)
    {
        $term = new Term([
            'title'  =>  $request->get('title'),
            'description'  =>  $request->get('description'),
        ]);
        $term->save();
        $message = "محتوا جدید افزوده شد";
        return redirect()->route('term.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        return view('admin.pages.term.show', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        return view('admin.pages.term.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTermRequest  $request
     * @param  \App\Models\Backend\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermRequest $request, Term $term)
    {
        $term->update($request->all());
        $message = "محتوا به روز شد";
        return redirect()->route('term.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        $term->delete();
        $message = "محتوا حذف شد";
        return redirect()->route('term.index')->with('success', $message);
    }

    /**
     * @param Term $term
     */
    public function status(Term $term)
    {
        if ($term->status === 1){
            $term->status = 0;
        } elseif ($term->status === 0){
            $term->status = 1;
        }
        $term->save();
        return redirect()->back();
    }
}
