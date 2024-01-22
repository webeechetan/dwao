@extends('frontend.layouts.app')

@section('meta_title',$meta->meta_title)
@section('meta_description',$meta->meta_description)

@section('content')
<section class="case_studies no-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="case_studies-filters">
                    <h4 class="case_studies-filters-title"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path d="M7 11h10v2H7zM4 7h16v2H4zm6 8h4v2h-4z"></path></svg></span> Filter By:</h4>
                    <ul class="case_studies-filters-wrap">
                        <li class="has-dropdown">
                            <a href="#">Capabilities</a>
                            <ul>
                                <li><a href="#">Digital Analysis</a></li>
                                <li><a href="#">SEO Terms</a></li>
                                <li><a href="#">Website Development</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Case Studies</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="case_studies-feature_list">
            @foreach ($featuredBlogs as $blog)
                <div class="post_card post_card-featured">
                    <div class="post_card-featured-badge">Featured</div>
                    <div class="post_card-img">
                        <a href="#"><img src="{{ $blog->thumbnail }}" class="w-100" alt=""></a>
                    </div>
                    <div class="post_card-body">
                        <div class="post_card-cat">
                            <div class="post_card-cat-title"><span>{{$blog->category->name}}</span> | <span>{{$blog->subCategory->name}}</span></div>
                        </div>
                        <div class="post_card-body-content">
                            <h4 class="post_card-body-content-title"><a href="insights-and-case-study.html">{{ $blog->title }}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="case_studies-list">
            @foreach($recentBlogs as $blog)
                <div class="post_card">
                    <div class="post_card-img">
                        <a href="insights-and-case-study.html"><img src="{{ $blog->thumbnail }}" class="w-100" alt=""></a>
                    </div>
                    <div class="post_card-body">
                        <div class="post_card-cat">
                            <div class="post_card-cat-title"><span>{{$blog->category->name}}</span> | <span>{{$blog->subCategory->name}}</span></div>
                        </div>
                        <div class="post_card-body-content">
                            <h4 class="post_card-body-content-title"><a href="{{ route('blog.view',$blog->title) }}">{{ $blog->title }}</a></h4>
                            <div class="post_card-body-content-text">{{ $blog->short_description }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection