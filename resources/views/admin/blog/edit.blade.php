@extends('admin.layouts.app')
@section('title', 'Blog')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Blog</h5>
          <small class="text-muted float-end">
            <a href="{{ route('blog.index') }}"><button class="btn btn-primary btn-sm">Blog List</button></a>
          </small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('blog.update', $blogs->id)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Category<span class="text-danger"><b>*</b></span> </label>
                      <div class="input-group input-group-merge">
                        <span id="" class="input-group-text"><i class="bx bxs-watch"></i></span>
                        <select name="category_id" id="" class="form-control categories" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}" @if($category->id == $blogs->category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Sub Category<span class="text-danger"><b>*</b></span> </label>
                      <div class="input-group input-group-merge">
                        <span id="" class="input-group-text"><i class="bx bxs-watch"></i></span>
                        <select name="sub_category_id" id="" class="form-control sub_categories" required>
                            <option value="">Select Sub Category</option>
                            @foreach ($subCategories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $blogs->sub_category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Publish Date</label>
                      <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bxs-watch"></i></span>
                        <input type="date" class="form-control" id="publish_date" value="{{$blogs->publish_date}}" name="publish_date">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Title <span class="text-danger"><b>*</b></span> </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" id="input_title" name="blog_title" value="{{$blogs->title}}" class="form-control" placeholder="Title">
                        </div>
                          @error('blog_title')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Slug<span class="text-danger"><b>*</b></span></label>
                      <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                      <input type="text" id="slug" name="slug" value="{{$blogs->slug}}" class="form-control" placeholder="Slug">
                      </div>
                      @error('slug')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Short Description</label>
                      <input type="text" name="short_description" class="form-control" value="{{$blogs->short_description}}">
                    </div>
                  </div>


                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Thumbnail<span class="text-danger"><b>*</b></span></label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control"  type="text" value="{{$blogs->thumbnail}}" name="thumbnail">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Banner<span class="text-danger"><b>*</b></span></label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="banner-fm" data-input="banner" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="banner" class="form-control" type="text" name="banner" required value="{{ $blogs->banner }}">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Author<span class="text-danger"><b>*</b></span> </label>
                      <select name="user_ids[]" id="" class="form-control" required multiple>
                          <option value="">Select Author</option>
                          @foreach ($users as $user)
                              <option value="{{ $user->id }}"
                                @foreach ($blogs->users as $blog_user)
                                  @if($blog_user->id == $user->id) selected @endif
                                @endforeach
                                >{{ $user->name }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Page Content<span class="text-danger"><b>*</b></span></label>
                      <textarea id="editor" name="description"  class="form-control" placeholder="Description">{{strip_tags($blogs->description)}}</textarea>
                      @error('description')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Minutes Read</label>
                      <input type="text" name="minutes" class="form-control" placeholder="5 Minutes" value="{{ $blogs->minutes }}">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Title</label>
                      <input type="text" name="meta_title" value="{{$blogs->meta_title}}" class="form-control" placeholder="Meta Title">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Description</label>
                      <input type="text" name="meta_description" value="{{$blogs->meta_description}}" class="form-control" placeholder="Meta Description">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">OG Title</label>
                      <input type="text" name="og_title" class="form-control" value="{{$blogs->og_title}}" placeholder="Og Title">
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
                        <input id="og_image_input" class="form-control" value="{{$blogs->og_image}}" type="text" name="og_image">
                      </div>
                        <div id="og_image_holder" class="img-fluid" width="250px"></div>
                    </div>
                  </div>

                  <div class="col-12">
                    <hr>
                  </div>
                  <div class="col-12">
                    <div class="d-flex align-items-center gap-3 mb-3">
                      <input type="checkbox" class="is_featured" name="is_featured"  placeholder="" value="1" style="width: 20px; height: 20px;" @if($blogs->is_featured == 1) checked @endif>
                      <h5 class="mb-0" for="basic-icon-default-message">Is Featured</h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3" @if($blogs->is_featured == 0) style="display: none" @endif >
                      <label class="form-label" for="basic-icon-default-message">Featured Thumbnail<span class="text-danger"><b>*</b></span></label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="ft" data-input="featured_thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="featured_thumbnail" class="form-control" type="text" name="featured_thumbnail" value="{{ $blogs->featured_thumbnail_image }}">
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
                        @php
                            $trending_insights_title = explode(',',$blogs->trending_insights_title);
                            $trending_insights_url = explode(',',$blogs->trending_insights_url);
                        @endphp
                        @foreach($trending_insights_title as $title)
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-message">Title</label>
                              <input type="text" name="trending_insights_title[]" class="form-control" placeholder="Trending Insights Title" 
                              value="{{ $title }}"
                              >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-message">URL</label>
                              <input type="text" name="trending_insights_url[]" class="form-control" placeholder="Trending Insights URL"
                              value="{{ $trending_insights_url[$loop->index] }}">
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-4 text-center"><a class="btn btn-success add_more_insights">Add More</a></div>

              </div>
                <button type="submit" class="btn btn-primary mt-4">Update</button>
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

  $(".categories").change(function(){
    let catId = $(this).val();
    $.ajax({
      url: "{{ route('get.subcategories') }}/"+catId,
      type: "GET",
      success: function(response){
        let html = '';
        response.forEach(element => {
          html += `<option value="${element.id}">${element.name}</option>`;
        });
        $('.sub_categories').html(html);
      }
    });
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