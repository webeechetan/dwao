@extends('admin.layouts.app')
@section('title', 'News')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Category List</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Category Name</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="category_name" name="category_name" value="">
                </div>
                @error('category_name')    
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    </div>
</div>
@endsection