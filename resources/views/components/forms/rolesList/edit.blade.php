@php
use App\Models\User\Role;
$roles = Role::all(['id', 'name']);
@endphp
<div class="form-group">
    <h2>Roles</h2>
    <hr>
    @foreach ($roles as $role)
        {{ $user->hasRole($role->id) ? 'checked' : '' }}
        <div class="form-check-inline">
            <input name="roles[]" class="form-check-input" type="checkbox"
                {{ $user->hasRole($role->name) ? 'checked' : '' }} value="{{ $role->id }}">
            <label class="form-check-label">
                {{ $role->name }}
            </label>
        </div>
    @endforeach
</div>
