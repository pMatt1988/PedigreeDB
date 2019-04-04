@extends('frontend.layouts.app')

@push('after-styles')
    <style>

        table.outer {
            border-collapse: collapse;
            width: 100%;

        }

        table.outer td {
            background-color: red;
            text-align: center;
            border: 0;
            border-collapse: collapse;
        }

        table.nested {
            width: 100%;
            padding: 5px;
            background-color: white;
            border-collapse: collapse;
        }

        table.nested td {
            text-align:center;
            margin: 0px;
            border-collapse: collapse;
            border-left: 1px solid;
            border-top: 1px solid;
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
