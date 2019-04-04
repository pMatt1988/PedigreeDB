@extends('frontend.layouts.app')

@push('after-styles')
    <style>

        table {
            border-collapse: collapse;
            width: 100%;

        }

        td {
            padding:0px;
            text-align: center;
            border: 1px solid;
            background-color: purple;
            color: silver;
        }
    </style>
@endpush


@section('title', app_name() . ' | ' . "Pedigree")

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>$DOGS PEDIGREE</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <?php echo $output ?>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
