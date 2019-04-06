@extends('frontend.layouts.app')

@section('title', app_name())


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul>
                    @foreach($dogs as $dog)
                            <li><a href="/dogs/{{ $dog->id }}">{{ $dog->name }}</a></li>
                    @endforeach
                    </ul>
                </div><!--card-body-->
            </div><!--card-->
            <a href="/dogs/create"><i class="fas fa-plus"></i></a>
        </div><!--col-->
    </div><!--row-->
@endsection