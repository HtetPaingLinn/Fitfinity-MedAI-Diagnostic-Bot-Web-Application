@props(['name'])

@error($name)
<p class="text-red-600 mt-1 text-xs font-thin text-right">{{ $message }}</p>
@enderror
