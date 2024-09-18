<div class="form-group">
    <label>{{ $title }}</label>
    @if ($required)
        <i class="fas fa-info-circle ml-2 text-danger"></i>
    @endif
    <input name={{ $name }} type="{{ $type }}" class="form-control"
        @if ($required) required @endif placeholder="Nhập {{ $title }} ...">
</div>
