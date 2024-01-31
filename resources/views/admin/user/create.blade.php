@extends('admin.layouts.app')
@section('title', 'News')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create Author</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('user.store')}}"class="post-form" >
            @csrf
            <div class="row">

              <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Name<span class="text-danger"><b>*</b></span> </label>
                    <input type="text" class="form-control dt-full-name"  placeholder="John Doe" name="name" />
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Email<span class="text-danger"><b>*</b></span> </label>
                    <input type="email" class="form-control dt-full-name"  placeholder="email@gmail.com" name="email" />
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-message">Image</label>
                  <div class="input-group">
                    <span class="input-group-btn text-white">
                      <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                        <i class="menu-icon tf-icons bx bx-file"></i>Choose
                      </a>
                    </span>
                    <input id="image" class="form-control" type="text" name="image" required>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Bio </label>
                    <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Facebook URL </label>
                    <input type="text" class="form-control dt-full-name"  placeholder="Facebook" name="facebook" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">X URL </label>
                    <input type="text" class="form-control dt-full-name"  placeholder="Facebook" name="twitter" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">LinkedIn URL </label>
                    <input type="text" class="form-control dt-full-name" placeholder="LinkedIn" name="linkedin" />
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Create Author</button>
        </form>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#lfm').filemanager('image');
    });
</script>
@endsection