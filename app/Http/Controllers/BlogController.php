<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$blogs = BLOG::all();
        $blogs = BLOG::where('type',1)->orderBy('id','desc')->get();
        return view ('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $subCategories= SubCategory::all();
        $users = User::all();
        return view ('admin.blog.create',compact('categories','subCategories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'blog_title' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $blogs = new Blog();

       
        $blogs->publish_date = $request->publish_date ? $request->publish_date : date('Y-m-d');
        $blogs->slug = $request->slug;
        $blogs->title = $request->blog_title;
        $blogs->short_description = $request->short_description;
        $blogs->description = $request->description;
        $blogs->meta_title = $request->meta_title;
        $blogs->meta_description = $request->meta_description;
        $blogs->og_title =  $request->og_title;
        $blogs->og_image = $request->og_image;
        $blogs->thumbnail = $request->thumbnail;
        $blogs->type = 1;
        $blogs->category_id = $request->category_id;
        $blogs->sub_category_id = $request->sub_category_id;
        $blogs->banner = $request->banner;
        $blogs->trending_insights_title = implode(',',$request->trending_insights_title);
        $blogs->trending_insights_url = implode(',',$request->trending_insights_url);
        $blogs->featured_thumbnail_image = $request->featured_thumbnail;
        $blogs->is_featured = $request->is_featured ? 1 : 0;
        $blogs->minutes = $request->minutes;
        $blogs->banner_alignment = $request->banner_alignment;

        if($blogs->save()){
            if($request->has('user_ids')){
                $blogs->users()->sync($request->user_ids);
            }

            $this->alert('success','Blog Added successfully','success');
            return redirect()->route('blog.index');
        }
        $this->alert('error','Something went wrong','error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories= Category::all();
        $subCategories= SubCategory::all();   
        $users = User::all();
        return view('admin.blog.edit',['blogs' => $blog,'users'=>$users,'categories'=>$categories,'subCategories'=>$subCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request ->validate([
            'blog_title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);
        $blog->publish_date = $request->publish_date;
        $blog->slug = $request->slug;
        $blog->title = $request->blog_title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->og_title =  $request->og_title;
        $blog->og_image = $request->og_image;
        $blog->thumbnail = $request->thumbnail;
        $blog->type = 1;
        $blog->category_id = $request->category_id;
        $blog->sub_category_id = $request->sub_category_id;
        $blog->banner = $request->banner;
        $blog->trending_insights_title = implode(',',$request->trending_insights_title);
        $blog->trending_insights_url = implode(',',$request->trending_insights_url);
        $blog->featured_thumbnail_image = $request->featured_thumbnail;
        $blog->is_featured = $request->is_featured ? 1 : 0;
        $blog->user_id = $request->user_id;
        $blog->minutes = $request->minutes;
        $blog->banner_alignment = $request->banner_alignment;

        if($request->has('user_ids')){
            $blog->users()->sync($request->user_ids);
        }
        
        if($blog->save()){
            $this->alert('success','Blog Updated successfully','success');
            return redirect()->route('blog.index');
        }
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->delete()){
            $this->alert('success','Blog Deleted successfully','success');
            return redirect()->route('blog.index');

        }else{
            $this->alert('error','Something went wrong','danger');
            return redirect()->back();  
        }
    }

    public function getSubCategories($id){
        $subCategories = SubCategory::where('category_id',$id)->get();
        return response()->json($subCategories);
    }
}
