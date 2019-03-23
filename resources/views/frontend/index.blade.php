@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                    <p>Welcome to Pedigree DB!</p>

                    <form>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" name="search" id="search"
                                                                   class="form-control">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="form-control">Search</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $('#search').typeahead
    </script>
    @endpush