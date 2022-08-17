@extends('layouts.dashboard')

@section('title', 'Create Role')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Roles</li>
@endsection

@section('content')

<form action="{{ route('dashboard.roles.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @include('dashboard.roles._form')
</form>

@endsection