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
                    <h3>Add Product</h3>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post"
                                    action="{{ route('admin.products.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Product Name</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="first-name" class="form-control" name="name"
                                                    placeholder="Product Name">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Product Price</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="number" id="first-name" class="form-control" name="price"
                                                    placeholder="Product Price">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Product Quantity</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="first-name" class="form-control" name="quantity"
                                                    placeholder="Product Quantity">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Product Category</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea id="description" class="form-control" name="description" placeholder="Category Description" rows="5"></textarea>
                                            </div>

                                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                                <div class='form-radio'>
                                                    <div class="radio">
                                                        <input type="radio" id="active" class='form-radio-input'
                                                            name="status" checked value="1">
                                                        <label for="active">Active</label>
                                                    </div>
                                                </div>

                                                <div class='form-radio'>
                                                    <div class="radio">
                                                        <input type="radio" name="status" id="inactive"
                                                            class='form-radio-input' value="0">
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
