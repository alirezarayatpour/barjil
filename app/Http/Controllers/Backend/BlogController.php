<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::query()->orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $imageName = 'blog'.'-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('image/blog', $imageName);

        $blog = new Blog([
            'title'         =>  $request->get('title'),
            'slug'          =>  Str::slug($request->get('title'), '-'),
            'description'   =>  $request->get('description'),
            'image'         =>  $imageName,
        ]);

        $blog->save();
        $message = "وبلاگ جدید با موفقیت افزوده شد";
        return redirect()->route('blog.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.pages.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.pages.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Backend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (file_exists('image/blog'.$blog->image)){
            unlink('image/blog'.$blog->image);
        }

        $imageName = 'blog'.'-'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('image/blog', $imageName);

        $blog->title        =   $request->title;
        $blog->description  =   $request->description;
        $blog->image        =   $imageName;

        $blog->save();
        $message = "ویرایش وبلاگ انجام شد";
        return redirect()->route('blog.index')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        $message = "حذف وبلاگ انجام شد";
        return redirect()->route('blog.index')->with('success', $message);
    }

    /**
     * @param Blog $blog
     */
    public function status(Blog $blog)
    {
        if ($blog->status === 1){
            $blog->status = 0;
        } elseif ($blog->status === 0){
            $blog->status = 1;
        }
        $blog->save();
        return redirect()->back();
    }
}
