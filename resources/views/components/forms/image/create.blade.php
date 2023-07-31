<div class="form-group mb-3">

    <label class="form-label">{{ $title }}</label> <br>

    <div class="media-input">

        <input type="file" name="{{ $name }}" hidden accept="image/png, image/jpeg" />

        <img hidden class="img-fluid mt-2" width="400px" alt=""><br>

        <div class="btn-group">
            <button type="button" class="btn btn-outline-primary">Select Image</button>
            <button type="button" class="btn btn-outline-danger disabled">Remove Image</button>
        </div>
    </div>
</div>
