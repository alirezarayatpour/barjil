<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Ask;
use App\Http\Requests\StoreAskRequest;
use App\Http\Requests\UpdateAskRequest;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asks = Ask::query()->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.ask.index', compact('asks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAskRequest $request)
    {
        $ask = new Ask([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'note' => $request->get('note'),
        ]);
        $ask->save();
        return redirect()->route('pages.contact-us');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function show(Ask $ask)
    {
        return view('admin.pages.ask.show', compact('ask'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function edit(Ask $ask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAskRequest  $request
     * @param  \App\Models\Backend\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAskRequest $request, Ask $ask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask)
    {
        //
    }
}
