@extends('user.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Payment")])
@endsection

@section('content')
<div class="body-wrapper">
    <div class="dashboard-list-area mt-20">
        <div class="dashboard-header-wrapper">
            <h5 class="title">{{ __("Payments") }}</h5>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <button type="button" class="btn--base" data-bs-toggle="modal" data-bs-target="#addModal"><i class="las la-plus me-1"></i> {{ __("Add New Method") }}</button>
                </div>
            </div>
        </div>
        @include('user.components.card-payment-table.card-payment',[
            'data'      => $cards
        ])
        
        
    </div>
</div>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="addModalLabel">
                <h5 class="modal-title">{{ __("Add New Method") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="modal-form" id="payment-form" method="POST" action="{{ setRoute('user.payment.store') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-xl-12 form-group">
                            <div class="toggle-container">
                                <div class="switch-toggles active" data-deactive="deactive">
                                    <input type="hidden" name="card_type">
                                    <span class="switch" data-value="{{ card_payment_const()::CREDIT }}">{{ __("Credit/Debit Card") }}</span>
                                    <span class="switch" data-value="{{ card_payment_const()::PAYPAL }}">{{ __("Paypal") }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper"></div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 form-group">
                            <div class="toggle-container">
                                <div class="switch-toggles active" data-deactive="deactive">
                                    <input type="hidden" name="card_option">
                                    <span class="switch" data-value="{{ card_payment_const()::DEFAULT }}">{{ __("Default") }}</span>
                                    <span class="switch" data-value="{{ card_payment_const()::OPTIONAL }}">{{ __("Optional") }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>{{ __("Card Holder Name") }}<span>*</span></label>
                            <input type="text" class="form--control custom-input" name="name" placeholder="{{ __("Enter Name") }}...">
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>{{ __("Card Number") }}<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="card_number" placeholder="{{ __("Enter Number") }}...">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                            <label>{{ __("CVV/CVC") }}<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="card_cvc" placeholder="{{ __("CVV/CVC") }}...">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                            <label>{{ __("Exp Date") }}<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="expiry_date" placeholder="{{ __("Enter Date") }}...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn--base w-100">{{ __("Add") }}</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection
@push('script')
<!-- card js -->
<script src="{{ asset('public/frontend/js/card.js') }}"></script>
<script>
    (function ($) {
        "use strict";
        var card = new Card({
            form: '#payment-form',
            container: '.card-wrapper',
            formSelectors: {
                numberInput: 'input[name="cardNumber"]',
                expiryInput: 'input[name="cardExpiry"]',
                cvcInput: 'input[name="cardCVC"]',
                nameInput: 'input[name="name"]'
            }
        });
    })(jQuery);
</script>

@if(session('modal'))
    <script>
        $(document).ready(function(){
            $('#addModal').modal('show');
        });
    </script>
@endif

<script>
    itemSearch($("input[name=search_text]"),$(".card-payment-data"),"{{ setRoute('user.payment.search') }}",1);
</script>
@endpush