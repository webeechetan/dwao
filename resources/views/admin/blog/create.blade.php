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
            <form method="POST" action="{{route('blog.store')}}"class="post-form" >
                @csrf
                <div class="row">

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Category<span class="text-danger"><b>*</b></span> </label>
                        <select name="category_id" id="" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Sub Category<span class="text-danger"><b>*</b></span> </label>
                      <select name="sub_category_id" id="" class="form-control" required>
                          <option value="">Select Sub Category</option>
                          @foreach ($subCategories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Publish Date</label>
                      <input type="date" class="form-control" id="publish_date" name="publish_date">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="blog_title">Title<span class="text-danger"><b>*</b></span> </label>
                          <input type="text" required id="input_title" name="blog_title" class="form-control" placeholder="Title">
                          @error('blog_title')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Slug<span class="text-danger"><b>*</b></span></label>
                      <input type="text" id="slug" required name="slug" class="form-control" placeholder="Slug">
                      @error('slug')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Short Description</label>
                      <input type="text" maxlength="5" name="short_description" class="form-control" placeholder="Short Description">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Thumbnail<span class="text-danger"><b>*</b></span> (600*500)</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="thumbnail" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Banner <span class="text-danger"><b>*</b></span></label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="banner-fm" data-input="banner" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="banner" class="form-control" type="text" name="banner" required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Page Content <span class="text-danger"><b>*</b></span></label>
                      <textarea id="editor" name="description" class="form-control" placeholder="Description"></textarea>
                      @error('description')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <hr>
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
                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-12">
                    <div class="d-flex align-items-center gap-3 mb-3">
                      <input type="checkbox" class="is_featured" name="is_featured"  placeholder="" value="1" style="width: 20px; height: 20px;">
                      <h5 class="mb-0" for="basic-icon-default-message">Is Featured</h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3" style="display: none">
                      <label class="form-label" for="basic-icon-default-message">Featured Thumbnail<span class="text-danger"><b>*</b></span></label>
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
                  <div class="col-12">
                    <hr>
                  </div>

                  <div class="col-12">
                    <h4>Trending Insights</h4>
                  </div>
                  <div class="col-12">
                    <div class="trending_insights">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Title</label>
                            <input type="text" name="trending_insights_title[]" class="form-control" placeholder="Trending Insights Title">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">URL</label>
                            <input type="text" name="trending_insights_url[]" class="form-control" placeholder="Trending Insights URL">
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-4 text-center"><a class="btn btn-success add_more_insights">Add More</a></div>

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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>

$(document).ready(function (){

  $(".post-form").validate({
    errorElement: "div",
  });

  $('#lfm').filemanager('file');
  $('#og_image').filemanager('file');
  $('#ft').filemanager('file');
  $('#banner-fm').filemanager('file');

  $(".is_featured").change(function(){
    if(this.checked){
      $('#featured_thumbnail').parent().parent().show();
      $('#featured_thumbnail').attr('required',true);
    }else{
      $('#featured_thumbnail').parent().parent().hide();
      $('#featured_thumbnail').attr('required',false);
    }
  });

  $('.add_more_insights').click(function(){
    let insights = `
    <div class="row">
      <div><hr></div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-message">Title</label>
          <input type="text" name="trending_insights_title[]" class="form-control" placeholder="Trending Insights Title">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-message">URL</label>
          <input type="text" name="trending_insights_url[]" class="form-control" placeholder="Trending Insights URL">
        </div>
      </div>
      <div class="d-flex align-items-end"><a class="btn btn-danger remove_insights mb-3">Remove</a></div>
    </div>
    `;
    $('.trending_insights').append(insights);
  });

  $(document).on('click', '.remove_insights', function(){
    $(this).parent().parent().remove();
  });


});

  var options = {
    filebrowserImageBrowseUrl: '/admin/filemanager',
  };

  CKEDITOR.replace('editor', options);
</script>
@endsection