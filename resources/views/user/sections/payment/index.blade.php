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
            <h5 class="title">Payments</h5>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <button type="button" class="btn--base" data-bs-toggle="modal" data-bs-target="#addModal"><i class="las la-plus me-1"></i> Add New Method</button>
                </div>
            </div>
        </div>
        <div class="dashboard-list-wrapper">
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="lab la-cc-amazon-pay"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Ruddra Khan</h4>
                                <span>Card Number: 4242 555 888 0000</span>
                                <span class="date d-block text--danger">Expire Date: 06-23</span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <button type="button" class="btn--base active small" data-bs-toggle="modal" data-bs-target="#editModal"><i class="las la-pen"></i></button>
                        <button type="button" class="btn--base small bg--danger border--danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="addModalLabel">
                <h5 class="modal-title">Add New Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="modal-form" id="payment-form">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 form-group">
                            <div class="toggle-container">
                                <div class="switch-toggles active" data-deactive="deactive">
                                    <input type="hidden" value="1">
                                    <span class="switch" data-value="1">Credit/Debit Card</span>
                                    <span class="switch" data-value="0">Paypal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper"></div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 form-group">
                            <div class="toggle-container">
                                <div class="switch-toggles active" data-deactive="deactive">
                                    <input type="hidden" value="1">
                                    <span class="switch" data-value="1">Default</span>
                                    <span class="switch" data-value="0">Optional</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>Card Holder Name<span>*</span></label>
                            <input type="text" class="form--control custom-input" name="name" placeholder="Enter Name...">
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>Card Number<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="cardNumber" placeholder="Enter Number...">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                            <label>CVV/CVC<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="cardCVC" placeholder="CVV/CVC">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                            <label>Exp Date<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="cardExpiry" placeholder="Enter Date...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn--base w-100">Add</button>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="editModalLabel">
                <h5 class="modal-title">Edit Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="modal-form" id="payment-form">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 form-group">
                            <div class="toggle-container">
                                <div class="switch-toggles active" data-deactive="deactive">
                                    <input type="hidden" value="1">
                                    <span class="switch" data-value="1">Credit/Debit Card</span>
                                    <span class="switch" data-value="0">Paypal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper"></div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 form-group">
                            <div class="toggle-container">
                                <div class="switch-toggles active" data-deactive="deactive">
                                    <input type="hidden" value="1">
                                    <span class="switch" data-value="1">Default</span>
                                    <span class="switch" data-value="0">Optional</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>Card Holder Name<span>*</span></label>
                            <input type="text" class="form--control custom-input" name="name" placeholder="Enter Name...">
                        </div>
                        <div class="col-xl-6 col-lg-6 form-group">
                            <label>Card Number<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="cardNumber" placeholder="Enter Number...">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                            <label>CVV/CVC<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="cardCVC" placeholder="CVV/CVC">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                            <label>Exp Date<span>*</span></label>
                            <input type="tel" class="form--control custom-input" name="cardExpiry" placeholder="Enter Date...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn--base w-100">Edit</button>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="deleteModalLabel">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12">
                        <h5>Are you sure to delete?</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn--base bg--danger border--danger text-white" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn--base">Confirm</button>
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
@endpush