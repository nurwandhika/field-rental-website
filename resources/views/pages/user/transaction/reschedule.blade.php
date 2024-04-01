<!-- @extends('layout.user')
@section('title')
    Reschedule
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                {{--            <div class="breadcrumb-item"><a href="{{auth()->user() ? route('user::transaction') : route('auth::user-login') }}" class="btn btn-primary">{{auth()->user() ? 'Dashboard' : 'Login' }}</a></div>--}}
            </div>
        </div>
        <div class="section-body">
            <livewire:reschedule-component :schedules="$schedules" :fields="$fields" :field_selected="$field_selected" :transaction="$transaction" />
        </div>
    </div>
@endsection -->
