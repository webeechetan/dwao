@extends('frontend.layouts.app')

@section('meta_title',$blog->meta_title)
@section('meta_description',$blog->meta_description)

@section('styles')
@endsection

@section('content')
<section class="case_studies-inner-banner"  style="background-image: url({{$blog->banner}});">
    <div class="container">
        <div class="case_studies-inner-banner-wrap">
            <div class="case_studies-inner-cat-title"><span>{{$blog->category->name}}</span> | <span>{{ $blog->subCategory->name }}</span></div>
            <h2 class="case_studies-inner-title">{{ $blog->title }}</h2>
            <div class="case_studies-inner-short_dec">{{ $blog->short_description }}</div>
            <div class="case_studies-inner-meta-title"><span> {{ $blog->publish_date }} </span> | <span>{{$blog->minutes}}</span> </div>
        </div>
    </div>
</section>

<section class="case_studies-inner-body">
    <div class="container">
        <div class="case_studies-inner-body-wrap">
            <div>
                <div class="case_studies-inner-body-content">
                    {!! $blog->description !!}

                    <!-- Author Section -->
                    @if($blog->user)
                    <div class="case_studies-inner-body-author">
                        <div class="case_studies-inner-body-author-img"><img src="{{ $blog->user->image }}" alt=""></div>
                        <div class="case_studies-inner-body-author-content">
                            <div class="case_studies-inner-body-author-name">{{ $blog->user->name }}</div>
                            <div class="case_studies-inner-body-author-desc">{{ $blog->user->bio }}</div>
                        </div>
                        <ul>
                            <li><a href="{{ $blog->user->twitter }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $blog->user->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $blog->user->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                    @endif

                </div>
            </div>
            <div class="case_studies-sidebar">
                <div class="case_studies-sidebar-wrap">
                    <h2>Related capabilities</h2>
                    <ul class="case_studies-sidebar-options">
                        @foreach($relatedBlogs as $relatedBlog)
                            <li><a href="{{ route('blog.view',$relatedBlog->slug) }}"><span>{{ $relatedBlog->title}}</span><span class="case_studies-sidebar-options-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m19 12-7-6v5H6v2h6v5z"></path></svg></span></a></li>
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

@section('scripts')
@endsection