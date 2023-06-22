@props([
    'id', 'name', 'label', 'value' => '', 'statusOptions'
])
<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <div>
        <select class="form-control  @error($name) is-invalid @enderror" id="{{ $id }}"
            name="{{ $name }}">
            <option></option>
            @foreach ($statusOptions as $selectKey => $selectValue)
                <option {{$selectKey == old($name, $value) ? 'selected' : '' }} 
                value="{{ $selectKey }}">{{ $selectValue }}</option>
            @endforeach
        </select>
        <x-form.error name="{{ $name }}" />
    </div>
</div>
