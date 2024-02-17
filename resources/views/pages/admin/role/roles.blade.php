@extends('layouts.admin-master')

@section('dashboard-content')

    @include('components.admin.roles.roles-list')
    @include('components.admin.roles.add-new-role-modal')
    @include('components.admin.roles.delete-role-modal')

@endsection

