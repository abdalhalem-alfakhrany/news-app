<div class="form-group mb-3">
    <label class="form-label">{{ $title }}</label>
    <select class="form-control" name="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">
                {{ $option['text'] }}
            </option>
        @endforeach
    </select>
</div>
