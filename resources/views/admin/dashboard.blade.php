@extends('admin.layouts.app')
@section('title', 'Our Clients')
@section('content')
<div class="row text-center">
   <div class="col-md-4">
      <div class="card p-3">
         <a href="{{ route('blog.index') }}"><h5 class="card-title">Total Blogs</h5></a>
         <h3 class="card-text">{{ $blogsCount }}</h3>
       </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
         <a href="{{ route('category.index') }}"><h5 class="card-title">Total Categories</h5></a>
         <h3 class="card-text">{{ $categoriesCount }}</h3>
       </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
         <a href="{{ route('subCategory.index') }}"><h5 class="card-title">Total Sub Categories</h5></a>
         <h3 class="card-text">{{ $subCategoriesCount }}</h3>
       </div>
    </div>

   </div>
@endsection

@section('scripts')
@endsection