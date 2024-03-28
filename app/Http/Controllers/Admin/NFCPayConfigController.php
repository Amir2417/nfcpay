<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\Admin\NFCPayConfig;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NFCPayConfigController extends Controller
{
    /**
     * Method for nfc pay view page
     * @return view 
     */
    public function index(){
        $page_title     = "NFCPay Configuration";
        $data           = NFCPayConfig::first();

        return view('admin.sections.nfc-pay.index',compact(
            'page_title',
            'data'
        ));
    }
    /**
     * Method for update nfcpay information
     * @param $slug
     * @param Illuminate\Http\Request $request
     */
    public function update(Request $request,$slug){
        $data               = NFCPayConfig::where('slug',$slug)->first();
        if(!$data) return back()->with(['error' => ['Configuration data not found!']]);
        $validator          = Validator::make($request->all(),[
            'name'          => 'required|string',
            'env'           => 'required|string',
            'version'       => 'required',
            'image'         => 'required'
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput($request->all());

        $validated          = $validator->validate();
        if($request->hasFile('image')){
            $image = get_files_from_fileholder($request,'image');
            $upload_image = upload_files_from_path_dynamic($image,'nfcpay-config',$data->image);
            $image = $upload_image;
        }
        try{

        }catch(Exception $e){
            
        }

    }
}
