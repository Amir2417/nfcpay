@extends('user.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Support Tickets")])
@endsection

@section('content')
<div class="body-wrapper">
    <div class="row mb-20-none">
        <div class="col-xl-12 col-lg-12 mb-20">
            <div class="custom-card mt-10">
                <div class="dashboard-header-wrapper">
                    <h5 class="title">Add New Ticket</h5>
                </div>
                <div class="card-body">
                    <form class="card-form">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>Name<span>*</span></label>
                                <input type="text" class="form--control" placeholder="Enter Name...">
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>Email<span>*</span></label>
                                <input type="email" class="form--control" placeholder="Enter Email...">
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>Subject<span>*</span></label>
                                <input type="text" class="form--control" placeholder="Enter Subject...">
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>Message <span class="text--base">(Optional)</span></label>
                                <textarea class="form--control" placeholder="Write Here…"></textarea>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>Attachments<span>*</span></label>
                                <div class="file-holder-wrapper">
                                    <input type="file" class="file-holder" name="file" id="fileUpload" data-height="130" accept="image/*" data-max_size="20" data-file_limit="15" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <button type="submit" class="btn--base w-100"><span class="w-100">Add New</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>

    </script>
@endpush