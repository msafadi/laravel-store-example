@extends('layouts.dashboard')

@section('title', 'Create User')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')

<form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @include('dashboard.users._form')
</form>

@endsection