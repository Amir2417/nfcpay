@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __($page_title)])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" action="{{ setRoute('admin.nfc.pay.config.update',$data->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12 form-group">
                        <label for="card-image">{{ __("Logo") }}</label>
                        <div class="col-12 col-sm-6 m-auto">
                            @include('admin.components.form.input-file',[
                                'label'             => false,
                                'class'             => "file-holder m-auto",
                                'old_files_path'    => files_asset_path('nfcpay-config'),
                                'name'              => "image",
                                'old_files'         => old('image',@$data->image)
                            ])
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                        @include('admin.components.form.switcher', [
                            'label'         => 'Environment*',
                            'value'         => old('env',@$data->env),
                            'name'          => "env",
                            'options'       => ['PRODUCTION' => payment_gateway_const()::ENV_PRODUCTION , 'SANDBOX' => payment_gateway_const()::ENV_SANDBOX]
                        ])
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                        <label>{{ __("Version*") }}</label>
                        <div class="input-group append">
                            <span class="input-group-text"><i class="las la-calendar"></i></span>
                            <input type="text" class="form--control" name="version" value="{{ @$data->version }}">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 form-group">
                        <label>{{ __("Name*") }}</label>
                        <div class="input-group append">
                            <span class="input-group-text"><i class="las la-file-signature"></i></span>
                            <input type="text" class="form--control" readonly name="name" value="{{ @$data->name }}">
                        </div>
                    </div> 
                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => "Update",
                            'permission'    => "admin.send.money.gateway.update"
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
