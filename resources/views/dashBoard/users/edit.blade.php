@extends('layouts.dashBoard')
@section('content')

    <x-crud.edit action="{{ route('user.update', $data['id']) }}">

        <x-forms.textInput.edit title="name" name="name" :value="$data['name']" />
        <x-forms.emailInput.edit title="email" name="email" :value="$data['email']" />

        <x-forms.rolesList.edit :user="$data" />
        <br>
        <x-forms.permissionsTabedTable.edit :user="$data" />

    </x-crud.edit>

@endsection
