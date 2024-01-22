@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Sub Category</h5>
        </div>  
        <div class="card-body">
          <form method="POST" action="{{ route('subCategory.update',$subCategory->id) }}"  >
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Sub Category Name</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="" class="form-control" id="basic-icon-default-fullname" name="category_name" value="{{$subCategory->name}}">
                    </div>
                    @error('category_name')    
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname"> Category Name</label>
                  <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                  <select name="category_id" id="" class="form-control"> 
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
                          <option value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                      @endforeach
                  </select>
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
  </div>
@endsection
