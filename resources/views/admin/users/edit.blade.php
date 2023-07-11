@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">Edit Password</h2>

    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <button type="submit" class="btn btn-primary">{{ $submit_label ?? 'Save' }}</button>

    </form>
@endsection
