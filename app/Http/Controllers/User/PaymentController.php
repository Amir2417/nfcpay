<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\CardPayment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Method for payment page
     * @return view
     */
    public function index(){
        $page_title     = "Payment";
        $cards          = CardPayment::orderBy('id','desc')->get();

        return view('user.sections.payment.index',compact(
            'page_title',
            'cards'
        ));
    }
    /**
     * Method for store payment information 
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request){
        $validator    = Validator::make($request->all(),[
            'card_type'         => 'required',
            'card_option'       => 'required',
            'name'              => 'required',
            'card_number'       => 'required',
            'card_cvc'          => 'required',
            'expiry_date'       => 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('modal','addModal');
        }
        $validated              = $validator->validate();
        $validated['user_id']    = auth()->user()->id;
        $validated['slug']      = Str::uuid();
        try{
            CardPayment::create($validated);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Card created successfully.']]);
    }
    /**
     * Method for card payment data update
     * @param $slug
     * @param \Illuminate\Http\Request $request
     */
    public function update(Request $request,$slug){
        $card               = CardPayment::where('slug',$slug)->first();
        if(!$card) return back()->with(['error' => ['Sorry! Card not found.']]);

        $validator          = Validator::make($request->all(),[
            'card_type'     => 'required',
            'card_option'   => 'required',
            'name'          => 'required',
            'card_number'   => 'required',
            'card_cvc'      => 'required',
            'expiry_date'   => 'required'
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput()->with('modal','editModal');


        $validated              = $validator->validate();
        $validated['user_id']   = auth()->user()->id;
        
        try{
            $card->update($validated);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Card payment updated successfully.']]);
    }
    /**
     * Method for delete card payment information
     * @param $slug
     * @param \Illuminate\Http\Request $request
     */
    public function delete($slug){
        $card   = CardPayment::where('slug',$slug)->first();
        if(!$card) return back()->with(['error' => ['Sorry! Card not found.']]);
        try{
            $card->delete();
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Card payment deleted successfully.']]);
    }
}
