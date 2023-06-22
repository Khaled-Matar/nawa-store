<div class="mb-3">
    <label for="{{$name}}">{{ $label }}</label>
    <div>
        <textarea type="textarea" class="form-control  @error($name) is-invalid @enderror" id="{{ $id }}"
            name="{{ $name }}" placeholder="{{ $label }}">{{ old($name, $value) }}</textarea>
        <x-form.error name="{{ $name }}" />
    </div>
</div>
