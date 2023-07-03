@extends('layouts.admin')
@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">{{ ('Deleted Products')}}</h2>
    <div class="ml-auto">
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary"> View Products</a>
    </div>
</header>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Deleted at</th>
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
                        <td>{{ $product->deleted_at }} </td>
                        <td>
                                <form action="{{ route('products.restore', $product->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i>
                                        Restore </button>
                                </form>
                        </td>
                        <td>
                            <form action="{{ route('products.force-delete', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                  Force Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </td>
        </tbody>
    </table>
    {{$products->links()}}
@endsection
