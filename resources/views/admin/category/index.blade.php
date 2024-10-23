@extends('admin.template')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Categories</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                Categories Table

                <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Add Category</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                @if($category->status)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">In Active</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-info icon" title="Edit" href="{{route('admin.categories.edit', $category->id)}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="confirm_delete()" class="btn btn-sm btn-danger icon" title="Delete">
                                            <i class=" bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<script>
    function confirm_delete() {
        if(!confirm("Are you sure you want to delete?")) {
            event.preventDefault();
        }
    }
</script>
@endsection