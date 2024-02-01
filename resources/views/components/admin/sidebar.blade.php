<!--
It is just to check the uri segment value so that we can activate the currenct selected menu in sidebar  
{{Request::segment(2)}} -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo"></span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">DWAO</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{Request::segment(2)== 'dashboard' ? 'menu-item active' : ''}}">
        <a href="{{ route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- File Manager -->
      <li class="menu-item {{Request::segment(2)== 'filemanager' ? 'menu-item active' : ''}}">
        <a href="{{ env('APP_URL') }}/admin/filemanager" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-folder-plus"></i>
          <div data-i18n="Layouts">File Manager</div>
        </a>
      </li>

      <!-- Category --> 

      <li class="menu-item {{Request::segment(2)=='category' ? 'menu-item active' : ''}}">
        <a href="{{ env('APP_URL') }}/admin/category" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Layouts">Category</div>
        </a>
      </li>

      <!-- Sub Category -->
      
      <li class="menu-item {{Request::segment(2)== 'subCategory' ? 'menu-item active' : ''}}">
        <a href="{{ env('APP_URL') }}/admin/subCategory" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Layouts">Sub Category</div>
        </a>
      </li>

      <!-- Users -->
      <li class="menu-item {{Request::segment(2)== 'user' ? 'menu-item active' : ''}}">
        <a href="{{route('user.index')}}" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Layouts">Authors</div>
        </a>
      </li>

       <!-- Blogs  -->
       <li class="menu-item {{Request::segment(2)== 'blog' ? 'menu-item active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Layouts">Blogs</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('blog.index')}}" class="menu-link">
              <div data-i18n="Without menu">Blog List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('blog.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add Blog</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>