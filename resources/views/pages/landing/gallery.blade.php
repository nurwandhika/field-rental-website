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
            <div class="card">
                <div class="card-body">
                    <form action="{{route('gallery')}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="field" id="field" class="form-control">
                                        @foreach($fields as $f)
                                            <option value="{{$f->id}}" {{$fieldSelected == $f->id ? 'selected' : ''}}>{{$f->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 ml-auto">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4>{{$field->name}}</h4>
                    <dt>Contact Person</dt>
                    <dd>{{$field->phone}}</dd>
                    <dt>Alamat</dt>
                    <dd>{{$field->address}}</dd>
                </div>
            </div>

            <div class="card">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($images as $index => $image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{$loop->first ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($images as $index => $image)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                <img class="d-block" style="height: 700px" src="{{asset($image->image_url)}}" alt="Slide {{$index}}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
