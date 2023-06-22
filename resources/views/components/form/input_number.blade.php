@props([
    'id','name','label', 'value' => '', 'type' => 'number',
])
<div class="mb-3">
    <label for="{{$name}}">{{ $label }}</label>
    <div>
        <input type="{{ $type ?? 'number'}}" step="0.1" min="0" class="form-control  
        @error($name) is-invalid @enderror" id="{{$id}}" name="{{$name}}"
            value="{{ old($name, $value) }}" placeholder="{{$label}}">
        <x-form.error name="{{$name}}"/>
    </div>
</div>