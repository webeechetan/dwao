@extends('admin.layouts.app')
@section('title', 'News')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Authors List</h5>
        <a href="{{ route('user.create')}}" class="btn btn-primary btn-sm">Add Author</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table" id="datatable-category">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{$user->image}}" alt="" width="50"></td>
                            <td>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                                <form action="{{route('user.destroy', $user->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bx bx-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable-category').DataTable();
        } );
    </script>
@endsection