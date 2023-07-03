@extends('layouts.admin')
@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">{{ ('Deleted Categories')}}</h2>
    <div class="ml-auto">
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary"> View Categories</a>
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
                @foreach ($categories as $category)
                    <tr>
                        <td> 
                            <a href="{{ $category->image_url }}">
                                <img src="{{ $category->image_url }}" width="60" alt="">
                            </a>
                        </td>
                        <td>{{ $category->id }} </td>
                        <td>{{ $category->name }} </td>
                        <td>{{ $category->deleted_at }} </td>
                        <td>
                                <form action="{{ route('categories.restore', $category->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i>
                                        Restore </button>
                                </form>
                        </td>
                        <td>
                            <form action="{{ route('categories.force-delete', $category->id) }}" method="POST">
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
    {{$categories->links()}}
@endsection
