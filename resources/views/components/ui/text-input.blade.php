@props([
    'model',
    'label'
])
<div class="flex flex-col flex-1">
    <input required wire:model="{{$model}}" id="{{$model}}" type="text">
    <label for="{{$model}}">{{$label}}*</label>
</div>
