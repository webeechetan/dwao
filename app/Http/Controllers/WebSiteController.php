<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;

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

    public function viewIndex(){
        $featuredBlogs = Blog::where('is_featured',1)->orderBy('id','desc')->take(2)->get();
        $recentBlogs = Blog::orderBy('id','desc')->take(4)->get();
        $relatedBlogs = Blog::where('category_id',$featuredBlogs[0]->category_id)->where('id','!=',$featuredBlogs[0]->id)->orderBy('id','desc')->take(4)->get();

        return view('frontend.index',['meta'=>$this->meta,'featuredBlogs'=>$featuredBlogs,'recentBlogs'=>$recentBlogs,'relatedBlogs'=>$relatedBlogs]);
    }

    public function viewBlog($title){
        $blog = Blog::where('title',$title)->first();
        return view('frontend.blog',['meta'=>$this->meta,'blog'=>$blog]);
    }

    public function viewAbout(){
        dd($this->meta);
    }
    

}
