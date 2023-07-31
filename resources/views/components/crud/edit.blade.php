<form {{ $attributes }} method="POST">
    @csrf
    @method('PUT')
    {{ $slot }}
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
