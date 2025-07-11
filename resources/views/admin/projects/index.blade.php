@extends('admin.layouts.app')
@section('title')
    Projects
@endsection
@section('content')
<div class="container-fluid">
    @include('flash::message')
    @include('admin.layouts.errors')
    <div class="d-flex flex-column">
        <livewire:project-table/>
    </div>
</div>
@endsection

