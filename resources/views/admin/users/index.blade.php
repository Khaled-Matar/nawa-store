@extends('layouts.admin')
@section('content')
    <header class="mb-4 d-flex">
        <h2 class="mb-4 fs-3">{{ $title }}</h2>
        <div class="ml-auto">
            <a href="{{ route('users.trashed') }}" class="btn btn-sm btn-danger"> <i class="fas fa-trash"> View Trash</i></a>
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
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Change Password</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }} </td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->password }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-dark"><i
                                    class="far fa-edit"></i> Edit</a></td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
    {{$users->links()}}

@endsection
