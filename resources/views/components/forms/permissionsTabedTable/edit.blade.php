@php
$operations = Config::get('roles_and_permissions.operations');
$modules = Config::get('roles_and_permissions.modules');
$i = 1;
@endphp
<div>
    <h2>Permissions</h2>
    <hr>
    <x-forms.tabedFields :tabs="$modules">
        @foreach ($modules as $module)
            @slot("$module")
                @foreach ($operations as $operation)
                    <div class="form-check-inline mr-2">
                        <input name="permissions[]" type="checkbox" value={{ $i++ }}
                            {{ $user->hasPermission("$module-$operation") ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $operation }}</label>
                    </div>
                @endforeach
            @endslot
        @endforeach
    </x-forms.tabedFields>
</div>
