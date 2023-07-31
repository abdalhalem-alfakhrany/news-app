@extends('layouts.dashBoard')
@section('content')

    <x-crud.create action="{{ route('user.store') }}">

        <x-forms.textInput.create title="name" name="name" />
        <x-forms.emailInput.create title="email" name="email" />
        <x-forms.passwordInput.create title="password" name="password" />

        <x-forms.rolesList.create />
        <br>
        <x-forms.permissionsTabedTable.create />

    </x-crud.create>

@endsection
