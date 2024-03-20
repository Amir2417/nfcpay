<div class="card-payment-data">
    @forelse ($cards as $item)
        <div class="dashboard-list-wrapper">
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="lab la-cc-amazon-pay"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">{{ @$item->name }}</h4>
                                <span>{{ __("Card Number") }}: {{ @$item->card_number }}</span>
                                <span class="date d-block text--danger">{{ __("Expiry Date") }}: {{ @$item->expiry_date }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <button type="button" class="btn--base active small" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->slug }}"><i class="las la-pen"></i></button>
                        <button type="button" class="btn--base small bg--danger border--danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->slug }}"><i class="las la-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                    Start Edit Modal
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="modal fade" id="editModal-{{ $item->slug }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="editModalLabel">
                        <h5 class="modal-title">{{ __("Edit Method") }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="modal-form" id="payment-form" action="{{ setRoute('user.payment.update',$item->slug) }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xl-12 form-group">
                                    <div class="toggle-container">
                                        <div class="switch-toggles {{ (card_payment_const()::CREDIT == $item->card_type) ? 'active' : '' }}" data-deactive="deactive">
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
                                        <div class="switch-toggles {{ (card_payment_const()::DEFAULT == $item->card_option) ? 'active' : '' }}" data-deactive="deactive">
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
                                    <input type="text" class="form--control custom-input" name="name" value="{{ @$item->name }}" placeholder="{{ __("Enter Name") }}...">
                                </div>
                                <div class="col-xl-6 col-lg-6 form-group">
                                    <label>{{ __("Card Number") }}<span>*</span></label>
                                    <input type="tel" class="form--control custom-input" name="card_number" value="{{ @$item->card_number }}" placeholder="{{ __("Enter Number") }}...">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label>{{ __("CVV/CVC") }}<span>*</span></label>
                                    <input type="tel" class="form--control custom-input" name="card_cvc" value="{{ @$item->card_cvc }}" placeholder="{{ __("CVV/CVC") }}...">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label>{{ __("Exp Date") }}<span>*</span></label>
                                    <input type="tel" class="form--control custom-input" name="expiry_date" value="{{ @$item->expiry_date }}" placeholder="{{ __("Enter Date") }}...">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn--base w-100">{{ __("Update") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            End Modal
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Delete Modal
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="modal fade" id="deleteModal-{{ $item->slug }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="deleteModalLabel">
                        <h4 class="modal-title">{{ __("Delete Confirmation") }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-10-none">
                            <div class="col-xl-12 col-lg-12">
                                <h5>{{ __("Are you sure to delete?") }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn--base bg--danger border--danger text-white" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                        <form action="{{ setRoute('user.payment.delete',$item->slug) }}" method="post">
                            @csrf
                            <button type="submit" class="btn--base">{{ __("Confirm") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            End Delete Modal
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    @empty
    <div class="alert alert-primary text-center">
        {{ __("Card not found!") }}
    </div>
    @endforelse
</div>
