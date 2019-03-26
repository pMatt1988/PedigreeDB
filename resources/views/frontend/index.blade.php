
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    {{ style('css/typeaheadjs.css') }}
@endpush

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                    <p>Welcome to Pedigree DB!</p>


                    <form autocomplete="off">
                        <div class="row">
                            <div class="col-8 offset-2">
                                <input type="text" name="search" id="search"
                                       class="form-control" >
                            </div>
                        </div>

                    </form>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@push('after-scripts')
    {{ script("js/typeahead.js" )}}
    <script type="text/javascript">
        let path = "{{ url('autocomplete') }}";
        $('#search').typeahead({
            minLength: 3,
            highlight: true,
            source:
            function (query, process) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: path,
                    type: 'POST',
                    data: { query: query },
                    dataType: 'json',
                    async: true,
                    success: function(data) {
                        return process(data);
                    }

                });
                // return $.post(path, {query: query}, function(data) {
                //     return process(data);
                // });
            },
            autoSelect: true,
            items: 8,
            appendTo
        });


    </script>

    <img src="" alt="" style="text-align: center;">
@endpush