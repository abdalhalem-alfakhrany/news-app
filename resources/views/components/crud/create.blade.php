<form {{ $attributes }} method="POST">
    @csrf
    @method('POST')
    {{ $slot }}
    <input type="submit" value="Submit" class="btn btn-primary" />
</form>
