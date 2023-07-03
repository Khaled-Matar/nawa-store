@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">Update User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        @include('admin.users._form', [
            'submit_label' => 'Update',
        ])
    </form>
@endsection
