@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">{{ $title }}</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary"> + Create Category</a>

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
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }} </td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-dark"><i
                                    class="far fa-edit"></i> Edit</a></td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
    {{$categories->links()}}

@endsection
