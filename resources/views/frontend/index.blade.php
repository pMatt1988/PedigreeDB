@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    {{--{{ style('css/typeaheadjs.css') }}--}}
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
                                <input type="text" name="ajaxsearch" id="ajaxsearch"
                                       class="form-control" placeholder="Start typing to search.">
                            </div>
                        </div>

                    </form>

                    <div id="search-contents" class="mt-5"></div>

                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@push('after-scripts')
    {{ script('js/ajaxsearch.js') }}
    <script type="text/javascript">


        $('#ajaxsearch').ajaxsearch({
            container: $('#search-contents'),
            stopTyping: 400,
        });


    </script>
    {{--<img src="" alt="" style="text-align: center;">--}}
@endpush