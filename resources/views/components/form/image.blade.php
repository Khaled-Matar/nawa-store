<div class="form-floating mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <div>
        <img src="{{ $image_url = old($name, $value) }}" width="100" alt="">
        <input type="{{ $type ?? 'file'}}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" placeholder="{{$label}}">
        <x-form.error name="{{$name}}" />
    </div>
</div>