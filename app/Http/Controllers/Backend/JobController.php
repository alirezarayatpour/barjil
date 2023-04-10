<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::query()->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $job = new Job([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        $job->save();
        $message = "درخواست جدید با موفقیت افزوده شد";
        return redirect()->route('job.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('admin.pages.job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.pages.job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Backend\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());
        $message = "درخواست با موفقیت ویرایش شد";
        return redirect()->route('job.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        $message = "درخواست با موفقیت حذف شد";
        return redirect()->route('job.index')->with('success', $message);
    }

    /**
     * @param job $job
     */
    public function status(job $job)
    {
        if ($job->status === 1){
            $job->status = 0;
        } elseif ($job->status === 0){
            $job->status = 1;
        }
        $job->save();
        return redirect()->back();
    }
}
