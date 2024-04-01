@extends('layout.blank')
@section('title')
    Smashfit
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('schedule') }}" class="btn btn-link mr-2">Home</a>
                <a href="{{route('gallery') }}" class="btn btn-link mr-2">Gallery</a>
                <a href="{{route('about') }}" class="btn btn-link mr-2">About</a>
                <a href="{{auth()->user() ? route('user::transaction') : route('auth::user-login') }}" class="btn btn-primary mr-2">{{auth()->user() ? 'History' : 'Login' }}</a>
            </div>
        </div>
        <div class="section-body">
            <livewire:schedule-component :schedules="$schedules" :fields="$fields" :field_selected="$field_selected" />
        </div>
    </section>
@endsection

