@extends('frontend.layouts.app')

@section('meta_title',$meta->meta_title)
@section('meta_description',$meta->meta_description)

@section('content')
<section class="case_studies-inner-banner"  style="background-image: url({{$blog->banner}});">
    <div class="container">
        <div class="case_studies-inner-banner-wrap">
            <div class="case_studies-inner-cat-title"><span>{{$blog->category->name}}</span> | <span>{{ $blog->subCategory->name }}</span></div>
            <h2 class="case_studies-inner-title">{{ $blog->title }}</h2>
            <div class="case_studies-inner-short_dec">{{ $blog->short_description }}</div>
            <div class="case_studies-inner-meta-title"><span> {{ $blog->publish_date }} </span> | <span>5 min read</span> | <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #fff;"><path d="M5.5 15a3.51 3.51 0 0 0 2.36-.93l6.26 3.58a3.06 3.06 0 0 0-.12.85 3.53 3.53 0 1 0 1.14-2.57l-6.26-3.58a2.74 2.74 0 0 0 .12-.76l6.15-3.52A3.49 3.49 0 1 0 14 5.5a3.35 3.35 0 0 0 .12.85L8.43 9.6A3.5 3.5 0 1 0 5.5 15zm12 2a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5zm0-13A1.5 1.5 0 1 1 16 5.5 1.5 1.5 0 0 1 17.5 4zm-12 6A1.5 1.5 0 1 1 4 11.5 1.5 1.5 0 0 1 5.5 10z"></path></svg></a></div>
        </div>
    </div>
</section>

<section class="case_studies-inner-body">
    <div class="container">
        <div class="case_studies-inner-body-wrap">
            <div>
                <div class="case_studies-inner-body-content">
                    {!! $blog->description !!}
                </div>
            </div>
            <div class="case_studies-sidebar">
                <div class="case_studies-sidebar-wrap">
                    <h2>Related capabilities</h2>
                    <ul class="case_studies-sidebar-options">
                        @foreach($relatedBlogs as $relatedBlog)
                            <li><a href="#"><span>Digital Analytics</span><span class="case_studies-sidebar-options-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m19 12-7-6v5H6v2h6v5z"></path></svg></span></a></li>
                        @endforeach
                    </ul>
                    @php
                        $trending_insights_title = explode(',',$blog->trending_insights_title);
                        $trending_insights_url = explode(',',$blog->trending_insights_url); 
                    @endphp
                    @if(count($trending_insights_title) > 1)
                    <hr>
                    <h2>Trending insights</h2>
                    <ol class="case_studies-sidebar-options-insights">
                        
                        @foreach($trending_insights_title as $key => $value)
                            <li><a href="{{ $trending_insights_url[$key] }}">{{ $value }}</a></li>
                        @endforeach
                    </ol>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection