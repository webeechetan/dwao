<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;

class WebSiteController extends Controller
{
    public $meta;

    public function __construct()
    {
        $url = Route::current()->uri();
        $meta = Meta::where('url',$url)->first();
        if($meta){
            $this->meta = $meta;
        }else{
            $this->meta = new Meta();
        }
    }

    public function viewIndex(Request $request){

        $featuredBlogs = Blog::where('is_featured',1)->orderBy('id','desc')->get();
        if($request->catId){
            $recentBlogs = Blog::where('category_id',$request->catId)->orderBy('id','desc')->paginate(1);
        }elseif($request->subCatId){
            $recentBlogs = Blog::where('sub_category_id',$request->subCatId)->orderBy('id','desc')->paginate(1);
        }else{
            $recentBlogs = Blog::orderBy('id','desc')->paginate(1);
        }
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('frontend.index',['meta'=>$this->meta,'featuredBlogs'=>$featuredBlogs,'recentBlogs'=>$recentBlogs,'categories'=>$categories,'subCategories'=>$subCategories]);
    }

    public function viewBlog($slug){
        $blog = Blog::where('slug',$slug)->first();
        $relatedBlogs = Blog::where('category_id',$blog->category_id)->where('id','!=',$blog->id)->orderBy('id','desc')->take(4)->get();
        return view('frontend.blog',['meta'=>$this->meta,'blog'=>$blog,'relatedBlogs'=>$relatedBlogs]);
    }

    public function viewAbout(){
        dd($this->meta);
    }
    

}
