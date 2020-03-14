
@extends('layouts.admin')

@section('content')
    <div class="row">
        @include('vendor.side-bar')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h5 class="mt-5">Add product</h5>
            <form method="post" action="{{ route('vendor.product.add') }}">
                @csrf
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter product title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4" value="{{ old('description') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price" value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" class="form-control" id="brand" placeholder="Enter Product Brand" value="{{ old('brand') }}">
                </div>
                <div class="form-group">
                    <label for="condition">Condition</label>
                    <select type="text" name="condition" class="form-control custom-select" id="condition" placeholder="Select Condition" value="{{ old('condition') }}">
                        <option selected>New</option>
                        <option>Old</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" value="{{ old('quantity') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            @if($message = Session::get('admin-login-error'))
                <br><span class="text-danger">* {{ $message }}</span>
            @endif
            @if($errors)
                @foreach($errors->all() as $error)
                    <br><span class="text-danger">* {{ $error }}</span>
                @endforeach
            @endif
        </main>
    </div>
@endsection
