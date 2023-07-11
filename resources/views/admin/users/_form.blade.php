@if ($errors->any())
    <div class="alert alert-danger">
        You have some errors
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-floating mb-3">
    <x-form.input label="User Name" id="name" name="name" value="{{ $user->name }}" />
    <x-form.input label="User Email" id="email" name="email" value="{{ $user->email }}" />
    <x-form.input label="Password" type="password" id="password" name="password" />
    <x-form.input label="Confirm Password" type="password" id="confirm_password" name="confirm_password" />
</div>
<button type="submit" class="btn btn-primary">save</button>
