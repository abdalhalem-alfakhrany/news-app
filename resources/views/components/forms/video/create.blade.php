<div class="form-group mb-3">

    <label class="form-label">{{ $title }}</label> <br>

    <div class="media-input create">

        <input type="file" hidden name="{{ $name }}" accept="video/mp4 ,video/m4a" />

        <video hidden controls width="400px" alt=""></video><br>

        <div class="btn-group mt-3">
            <button type="button" class="btn btn-outline-primary">Browse</button>
            <button type="button" class="btn btn-outline-danger disabled">Remove</button>
        </div>
    </div>
</div>
