@extends('layouts.admin-master')

@section('dashboard-content')

    @include('components.admin.users.user-list')
    @include('components.admin.users.add-new-user-modal')
    @include('components.admin.users.delete-user-modal')

@endsection

