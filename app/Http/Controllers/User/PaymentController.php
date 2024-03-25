<?php

namespace App\Http\Controllers\User;

use Exception;
use Carbon\Carbon;
use App\Models\CardPayment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    /**
     * Method for payment page
     * @return view
     */
    public function index(){
        $page_title     = "Payment";
        $cards          = CardPayment::auth()->orderBy('id','desc')->get();

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
            'card_number'       => 'required|min:12|max:24',
            'card_cvc'          => 'required',
            'expiry_date'       => 'required|min:4|max:4',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('modal',true);
        }
        $validated              = $validator->validate();
        $validated['user_id']   = auth()->user()->id;
        $exp_date               = $request->expiry_date;
        $month_data             = substr($exp_date, 0, 2);
        $year_data              = substr($exp_date,2,4);
        if($month_data > 12){
            return back()->with(['error' => ['Invalid Month.']]);
        }
        $current_year = Carbon::now()->format('y');
        if($current_year > $year_data){
            return back()->with(['error' => ['Invalid Year.']]);
        }
        $expiry_date                = $month_data .'/'.$year_data;
        $validated['expiry_date']   = $expiry_date;

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
            'card_number'   => 'required|min:12|max:24',
            'card_cvc'      => 'required',
            'expiry_date'   => 'required|min:4|max:4'
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput()->with('editModal',true);
        
        $validated              = $validator->validate();
        if(CardPayment::whereNot('id',$card->id)->where('card_number',$validated['card_number'])->exists()){
            throw ValidationException::withMessages([
                'name'  => "Card number already exists!",
            ]);
        }
        $validated['user_id']   = auth()->user()->id;
        $exp_date               = $request->expiry_date;
        $month_data             = substr($exp_date, 0, 2);
        $year_data              = substr($exp_date,2,4);
        if($month_data > 12){
            return back()->with(['error' => ['Invalid Month.']]);
        }
        $current_year = Carbon::now()->format('y');
        if($current_year > $year_data){
            return back()->with(['error' => ['Invalid Year.']]);
        }
        $expiry_date                = $month_data .'/'.$year_data;
        $validated['expiry_date']   = $expiry_date;
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
    /**
     * Method for search card payment data
     */
    public function search(Request $request){
        
        $validator      = Validator::make($request->all(),[
            'text'      => 'required'
        ]);
        if($validator->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }

        $validated = $validator->validate();
        
        $cards    = CardPayment::auth()->search($validated['text'])->get();
        return view('user.components.search-card.card-payment',compact('cards'));
    }
}
