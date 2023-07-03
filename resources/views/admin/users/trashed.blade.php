@extends('layouts.admin')
@section('content')
<header class="mb-4 d-flex">
    <h2 class="mb-4 fs-3">{{ ('Deleted Users')}}</h2>
    <div class="ml-auto">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary"> View users</a>
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
                @foreach ($users as $user)
                    <tr>
                        <td> 
                            <a href="{{ $user->image_url }}">
                                <img src="{{ $user->image_url }}" width="60" alt="">
                            </a>
                        </td>
                        <td>{{ $user->id }} </td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->deleted_at }} </td>
                        <td>
                                <form action="{{ route('users.restore', $user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i>
                                        Restore </button>
                                </form>
                        </td>
                        <td>
                            <form action="{{ route('users.force-delete', $user->id) }}" method="POST">
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
    {{$users->links()}}
@endsection
