@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . "Add a Dog!")

@section('content')
    <div class="row">
        <div class="col">
            {{ Breadcrumbs::render('dogcreate') }}
            <div class="card">
                <div class="card-header">
                    <strong>Add a dog to the database.</strong>
                </div><!--card-header-->
                <div class="card-body">
                    @include('dog.masterform')
                </div><!--card-body-->
            </div><!--card-->

        </div><!--col-->
    </div><!--row-->
@endsection
