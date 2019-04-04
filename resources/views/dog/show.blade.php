@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . "Dog Name!")
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Dog Name</strong>
                </div><!--card-header-->
                <div class="card-body">

                    <div class="row">
                        <div class="col-2 text-right">Name:</div>
                        <div class="col">{{ $dog->name }}</div>

                    </div>

                    <div class="row">
                        <div class="col-2 text-right">Sire:</div>

                        <div class="col">
                            @if($dog->father)
                                <a href="/dogs/{{ $dog->father->id }}">{{ $dog->father->name }}</a>
                            @else
                                N/A
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 text-right">Dam:</div>

                        <div class="col">
                            @if($dog->mother)
                                <a href="/dogs/{{ $dog->mother->id }}">{{ $dog->mother->name }}</a>
                            @else
                                N/A
                            @endif
                        </div>
                    </div>

                    @if(count($dog->offspring) > 0)

                        <div class="row">
                            <div class="col-2 text-right">Children: </div>
                            <div class="col">
                            <ul class="list-unstyled">
                                @foreach($dog->offspring as $child)
                                    <li><a href="{{ $child->id }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    @endif

                </div><!--card-body-->
            </div><!--card-->
            <br>

            @if(Auth::user()->can('delete dogs'))

                <form method="POST" action="/dogs/{{ $dog->id }}">
                    @csrf
                    @method('DELETE')
                    <a href="/dogs/{{ $dog->id }}/edit" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            @endif

        </div><!--col-->
    </div><!--row-->
@endsection