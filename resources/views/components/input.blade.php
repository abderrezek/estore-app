<div class="{{ $class . ' inputs' }}">

  <label for="{{ "id".$name }}">{{ $slot }}</label>

  <input
    type="{{ $type }}"
    id="{{ "id" . $name }}"
    name="{{ $name }}"
    class="form-control @error($name) is-invalid @enderror"
    placeholder="{{ $placeholder }}"
    value="{{ is_null($value) ? old($name) : $value }}"
  >

  {{-- Error Email / Username --}}

  @error($name)
    <span class="error invalid-feedback">{{ $message }}</span>
  @enderror

</div>