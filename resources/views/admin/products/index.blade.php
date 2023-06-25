@extends('layouts.admin')
@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">{{ $title }}</h2>
    <div class="ml-auto">
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary"> + Create Product</a>
        <a href="{{ route('products.trashed') }}" class="btn btn-sm btn-danger"> <i class="fas fa-trash"> View Trash</i></a>
    </div>
</header>
    @if (session()->has('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Compare Price</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($products as $product)
                    <tr>
                        <td> 
                            <a href="{{ $product->image_url }}">
                                <img src="{{ $product->image_url }}" width="60" alt="">
                            </a>
                        </td>
                        <td>{{ $product->id }} </td>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->category_name }} </td>
                        <td>{{ $product->price_formatted }} </td>
                        <td>{{ $product->compare_price }} </td>
                        <td>{{ $product->status }} </td>
                        <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class="far fa-edit"></i>Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </td>
        </tbody>
    </table>
    {{ $products->links()}}

@endsection
