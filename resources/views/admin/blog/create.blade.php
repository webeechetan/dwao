@extends('admin.layouts.app')
@section('title', 'Blog')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Add Blog</h5>
          <small class="text-muted float-end">
            <a href="{{ route('blog.index') }}"> <button class="btn btn-primary btn-sm">Blog List</button> </a>
          </small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('blog.store')}}" >
                @csrf
                <div class="row">

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Category </label>
                      <div class="input-group input-group-merge">
                        <span id="" class="input-group-text"><i class="bx bxs-watch"></i></span>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Sub Category </label>
                      <div class="input-group input-group-merge">
                        <span id="" class="input-group-text"><i class="bx bxs-watch"></i></span>
                        <select name="sub_category_id" id="" class="form-control">
                            <option value="">Select Sub Category</option>
                            @foreach ($subCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Publish Date</label>
                      <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bxs-watch"></i></span>
                        <input type="date" class="form-control" id="basic-icon-default-fullname" name="publish_date">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Title <span class="text-danger"><b>*</b></span> </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" id="input_title" name="blog_title" class="form-control" placeholder="Title">
                        </div>
                          @error('blog_title')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Slug</label>
                      <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                      <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                      </div>
                      @error('slug')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Thumbnail</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Banner</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="banner-fm" data-input="banner" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="banner" class="form-control" type="text" name="banner">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Banner Title</label>
                      <input type="text" class="form-control" name="banner_title">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Banner Description</label>
                      <textarea class="form-control" name="banner_description"></textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Description</label>
                      <textarea id="editor" name="description" class="form-control" placeholder="Description"></textarea>
                      @error('description')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Short Description</label>
                      <textarea name="short_description" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Title</label>
                      <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Description</label>
                      <input type="text" name="meta_description" class="form-control" placeholder="Meta Description">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">OG Title</label>
                      <input type="text" name="og_title" class="form-control" placeholder="Og Title">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Og Image</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="og_image" data-input="og_image_input" data-preview="og_image_holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="og_image_input" class="form-control" type="text" name="og_image">
                      </div>
                          <div id="og_image_holder" class="img-fluid" width="250px"></div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Is Featured</label>
                      <input type="checkbox" name="is_featured"  placeholder="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Featured Thumbnail</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="ft" data-input="featured_thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="featured_thumbnail" class="form-control" type="text" name="featured_thumbnail">
                      </div>
                    </div>
                  </div>

                  <div class="trending_insights row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Trending Insights Title</label>
                        <input type="text" name="trending_insights_title[]" class="form-control" placeholder="Trending Insights Title">
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-message">Trending Insights URL</label>
                        <input type="text" name="trending_insights_url[]" class="form-control" placeholder="Trending Insights URL">
                      </div>
                    </div>
                  </div>
                  <div><a class="btn btn-success add_more_insights">Add More</a></div>

              </div>
                <button type="submit" class="btn btn-primary mt-4">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>

$(document).ready(function (){

  $('#lfm').filemanager('file');
  $('#og_image').filemanager('file');
  $('#ft').filemanager('file');
  $('#banner-fm').filemanager('file');

  $('.add_more_insights').click(function(){
    let insights = `
    <div class="col-md-12">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-message">Trending Insights Title</label>
          <input type="text" name="trending_insights_title[]" class="form-control" placeholder="Trending Insights Title">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-message">Trending Insights URL</label>
          <input type="text" name="trending_insights_url[]" class="form-control" placeholder="Trending Insights URL">
        </div>
      </div>
      <a class="btn btn-danger remove_insights">Remove</a>
    </div>
    `;
    $('.trending_insights').append(insights);
  });

  $(document).on('click', '.remove_insights', function(){
    $(this).parent().remove();
  });


});

  var options = {
    filebrowserImageBrowseUrl: '/admin/filemanager',
  };

  CKEDITOR.replace('editor', options);
</script>
@endsection