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
                    <h3>Update Category</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Category</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" action="{{route('admin.categories.update', $category->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Category Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="name"
                                                    placeholder="Category Name" value="{{$category->name}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Category Image</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" id="image" class="form-control" name="image"
                                                    placeholder="Category Image">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea id="description" class="form-control" name="description"
                                                    placeholder="Category Description" rows="5">{{$category->description}}</textarea>
                                            </div>
                                        
                                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                                <div class='form-radio'>
                                                    <div class="radio">
                                                        <input type="radio" id="active" class='form-radio-input' name="status"
                                                            value="1" {{$category->status ? 'checked' : ''}}>
                                                        <label for="active">Active</label>
                                                    </div>
                                                </div>

                                                <div class='form-radio'>
                                                    <div class="radio">
                                                        <input type="radio" name="status" id="inactive" class='form-radio-input' value="0" {{$category->status ? '' : 'checked'}}>
                                                        <label for="inactive">In Active</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->
    </div>
@endsection
