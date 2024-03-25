<?php

namespace App\Http\Controllers\Api\V1\User;

use Carbon\CarbonPeriod;
use App\Models\UserWallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Constants\PaymentGatewayConst;
use App\Models\UserHasInvestPlan;
use App\Providers\Admin\CurrencyProvider;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function dashboard() {
        $default_currency = CurrencyProvider::default();

        // User Wallets
        $user_wallets = UserWallet::auth()->whereHas('currency',function($q) use ($default_currency) {
            $q->where('code',$default_currency->code);
        })->select('id','user_id','currency_id','balance','status','created_at')->with(['currency' => function($q) {
            $q->select('id','code');
        }])->get();

        // Transaction logs
        $transactions = Transaction::auth()->latest()->take(10)->get();
        $transactions->makeHidden([
            'id',
            'user_type',
            'user_id',
            'wallet_id',
            'payment_gateway_currency_id',
            'request_amount',
            'exchange_rate',
            'percent_charge',
            'fixed_charge',
            'total_charge',
            'total_payable',
            'receiver_type',
            'receiver_id',
            'available_balance',
            'payment_currency',
            'input_values',
            'details',
            'reject_reason',
            'remark',
            'stringStatus',
            'callback_ref',
            'updated_at',
        ]);

        

        // User Information
        $user_info = auth()->user()->only([
            'id',
            'firstname',
            'lastname',
            'fullname',
            'username',
            'email',
            'image',
            'mobile_code',
            'mobile',
            'full_mobile',
            'email_verified',
            'kyc_verified',
            'two_factor_verified',
            'two_factor_status',
            'two_factor_secret',
        ]);

        $profile_image_paths = [
            'base_url'          => url("/"),
            'path_location'     => files_asset_path_basename("user-profile"),
            'default_image'     => files_asset_path_basename("profile-default"),
        ];

        

        return Response::success([__('User dashboard data fetch successfully!')],[
            'instructions'  => [
                'user_info'         => [
                    'kyc_verified'  => "0: Default, 1: Approved, 2: Pending, 3:Rejected",
                ]
            ],
            
            'user_info'     => $user_info,
            'wallets'       => $user_wallets,
            'profile_image_paths'   => $profile_image_paths,
        ]);
    }

    public function notifications() {
        return Response::warning(['This section is under maintenance!'],[],503);
    }
}
