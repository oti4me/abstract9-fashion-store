@extends('layouts.admin')

@section('content')
    <div class="row">
        @include('vendor.side-bar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <h3>Products</h3>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Condition</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($products) && count($products))
                        @foreach($products as $product)
                            <tr>
                                <td>{{ four_digits($product->id) }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>₦{{ to_money($product->price) }}</td>
                                <td>{{ $product->getStatus() }}</td>
                                <td>{{ $product->condition }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="#">Edit</a>
                                    <a href="#">View</a>
                                </td>
                            </tr>
                        @endforeach
                        {{ $products->links() }}
                    @else
                        No products to display :)
                    @endif
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
