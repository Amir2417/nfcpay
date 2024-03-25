<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use App\Models\Admin\SiteSections;
use App\Constants\SiteSectionConst;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\AnnouncementCategory;

class SetupSectionsController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::get();
    }

    /**
     * Register Sections with their slug
     * @param string $slug
     * @param string $type
     * @return string
     */
    public function section($slug,$type) {
        $sections = [
            'banner'    => [
                'view'      => "bannerView",
                'update'    => "bannerUpdate",
            ],
            'security'          => [
                'view'          => "securityView",
                'update'        => "securityUpdate",
                'itemStore'     => "securityItemStore",
                'itemUpdate'    => "securityItemUpdate",
                'itemDelete'    => "securityItemDelete",
            ],
            'how-it-work'       => [
                'view'          => "howItsWorkView",
                'update'        => "howItsWorkUpdate",
                'itemStore'     => "howItsWorkItemStore",
                'itemUpdate'    => "howItsWorkItemUpdate",
                'itemDelete'    => "howItsWorkItemDelete"
            ],
            'download-app'      => [
                'view'          => "downloadAppView",
                'update'        => "downloadAppUpdate",
                'itemStore'     => "downloadAppItemStore",
                'itemUpdate'    => "downloadAppItemUpdate",
                'itemDelete'    => "downloadAppItemDelete"
            ],
            'statistic'         => [
                'view'          => "statisticView",
                'update'        => "statisticUpdate",
                'itemStore'     => "statisticItemStore",
                'itemUpdate'    => "statisticItemUpdate",
                'itemDelete'    => "statisticItemDelete"
            ],
            'about-us'  => [
                'view'          => "aboutUsView",
                'update'        => "aboutUsUpdate",
            ],
            'services'  => [
                'view'          => "servicesView",
                'update'        => "servicesUpdate",
                'itemStore'     => "servicesItemStore",
                'itemUpdate'    => "servicesItemUpdate",
                'itemDelete'    => "servicesItemDelete",
            ],
            'feature'  => [
                'view'      => "featureView",
                'update'    => "featureUpdate",
            ],
            'testimonial' => [
                'view'          => "testimonialView",
                'update'        => "testimonialUpdate",
                'itemStore'     => "testimonialItemStore",
                'itemUpdate'    => "testimonialItemUpdate",
                'itemDelete'    => "testimonialItemDelete",
            ],
            'announcement' => [
                'view'          => "announcementView",
                'update'        => "announcementUpdate",
            ],
            'about-page'  => [
                'view'          => "aboutPageView",
                'update'        => "aboutPageUpdate",
                'itemStore'     => "aboutPageItemStore",
                'itemUpdate'    => "aboutPageItemUpdate",
                'itemDelete'    => "aboutPageItemDelete",
            ],
            'contact-us' => [
                'view'          => "contactUsView",
                'update'        => "contactUsUpdate",
            ],
            'footer' => [
                'view'          => "footerView",
                'update'        => "footerUpdate",
            ]
        ];

        if(!array_key_exists($slug,$sections)) abort(404);
        if(!isset($sections[$slug][$type])) abort(404);
        $next_step = $sections[$slug][$type];
        return $next_step;
    }

    /**
     * Method for getting specific step based on incoming request
     * @param string $slug
     * @return method
     */
    public function sectionView($slug) {
        $section = $this->section($slug,'view');
        return $this->$section($slug);
    }

    /**
     * Method for distribute store method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionItemStore(Request $request, $slug) {
        $section = $this->section($slug,'itemStore');
        return $this->$section($request,$slug);
    }

    /**
     * Method for distribute update method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionItemUpdate(Request $request, $slug) {
        $section = $this->section($slug,'itemUpdate');
        return $this->$section($request,$slug);
    }

    /**
     * Method for distribute delete method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionItemDelete(Request $request,$slug) {
        $section = $this->section($slug,'itemDelete');
        return $this->$section($request,$slug);
    }

    /**
     * Method for distribute update method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function sectionUpdate(Request $request,$slug) {
        $section = $this->section($slug,'update');
        return $this->$section($request,$slug);
    }

    /**
     * Method for show banner section page
     * @param string $slug
     * @return view
     */
    public function bannerView($slug) {
        $page_title = "Banner Section";
        $section_slug = Str::slug(SiteSectionConst::BANNER_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.banner-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update banner section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function bannerUpdate(Request $request,$slug) {

        $basic_field_name = [
            'title' => "required|string|max:100",
            'heading' => "required|string|max:100",
            'sub_heading' => "required|string|max:500",
            'button_name' => "required|string|max:50",
        ];

        $slug = Str::slug(SiteSectionConst::BANNER_SECTION);
        $section = SiteSections::where("key",$slug)->first();
        $data['image'] = $section->value->image ?? null;
        if($request->hasFile("image")) {
            $data['image']      = $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $data['language']  = $this->contentValidate($request,$basic_field_name);
        $update_data['value']  = $data;
        $update_data['key']    = $slug;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }
    /**
     * Method for distribute update method for any section by using slug
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     * @return method
     */
    public function securityView($slug){
        $page_title     = "Security Section";
        $section_slug   = Str::slug(SiteSectionConst::SECURITY_SECTION);
        $data           = SiteSections::getData($section_slug)->first();
        $languages      = $this->languages;

        return view('admin.sections.setup-sections.security-section',compact(
            'page_title',
            'data',
            'languages',
            'slug'
        ));
    }
    /**
     * Mehtod for update security section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
    */
    public function securityUpdate(Request $request,$slug) {
        
        $basic_field_name   = [
            'title'         => 'required|string|max:100',
            'heading'       => 'required|string|max:100',
        ];

        $slug           = Str::slug(SiteSectionConst::SECURITY_SECTION);
        $section        = SiteSections::where("key",$slug)->first();
        if($section != null ){
            $data       = json_decode(json_encode($section->value),true);
        }else{
            $data       = [];
        }

        $data['language']      = $this->contentValidate($request,$basic_field_name);
        $update_data['key']    = $slug;
        $update_data['value']  = $data;
        
        try{
            SiteSections::updateOrCreate(['key'=>$slug],$update_data);
        }catch(Exception $e){
            return back()->with(['error'=>'Something went wrong! Please try again.']);
        }
        return back()->with(['success'  =>  ['Section updated successfully!']]);

    }
    /**
     * Mehtod for store security item information
     * @param string $slug
     * @param \Illuminate\Http\Request $request
    */
    public function securityItemStore(Request $request,$slug) {
        $basic_field_name  = [
            'item_title'     => "required|string|max:255",
            'item_heading'       => "required|string|max:500",
            
        ];

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"security-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $slug = Str::slug(SiteSectionConst::SECURITY_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }
        $validator  = Validator::make($request->all(),[
            'icon'              => "required|string",
        ]);
        if($validator->fails()) return back()->withErrors($validator->errors())->withInput()->with('modal','security-add');
        $validated = $validator->validate();
        $unique_id = uniqid();
        
        $section_data['items'][$unique_id]['language'] = $language_wise_data;
        $section_data['items'][$unique_id]['status']   = 1;
        $section_data['items'][$unique_id]['id']       = $unique_id;
        $section_data['items'][$unique_id]['icon']              = $validated['icon'];
        $update_data['key']     = $slug;
        $update_data['value']   = $section_data;
       
        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success'   => ['Section item added successfully!']]);
    }
    /**
     * Mehtod for update security item information
     * @param string $slug
     * @param \Illuminate\Http\Request $request
    */
    public function securityItemUpdate(Request $request,$slug) {
        $request->validate([
            'target'         =>'required|string',
        ]);

        $basic_field_name = [
            'item_title_edit'  => "required|string|max:255",
            'item_heading_edit'    => "required|string|max:500",
        ];

        $slug              = Str::slug(SiteSectionConst::SECURITY_SECTION);
        $section           = SiteSections::getData($slug)->first();

        if(!$section) return back()->with(['error' => ['Section Not Found!']]);
        $section_values    = json_decode(json_encode($section->value),true);
        
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section Item Not Found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['[error' => ['Section Item is invalid']]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"security-edit");
        
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $language_wise_data = array_map(function($language){
            return replace_array_key($language,'_edit');
        },$language_wise_data);
        $validator  = Validator::make($request->all(),[
            'icon_edit'              => "required|string",
        ]);
        $validated = $validator->validate();
        $section_values['items'][$request->target]['language'] = $language_wise_data;
        $section_values['items'][$request->target]['icon'] = $validated['icon_edit'];

        try{
            $section->update([
                'value'  =>$section_values,
            ]);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success'   => ['Information updated successfully!']]);    
    }
    /**
     * Mehtod for delete security item information
     * @param string $slug
     * @return view
     */
    public function securityItemDelete(request $request,$slug){
        $request->validate([
            'target'    =>'required|string',
        ]);

        $slug           = Str::slug(SiteSectionConst::SECURITY_SECTION);
        $section        = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);

        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        try{
            unset($section_values['items'][$request->target]);
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e){
            return $e->getMessage();
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);
    }
    /**
     * Mehtod for update security item status 
     * @param string $slug
     * @return view
     */
    public function securityStatusUpdate(Request $request,$slug) {
        
        $validator = Validator::make($request->all(),[
            'status'                    => 'required|boolean',
            'data_target'               => 'required|string',
        ]);
        
        if ($validator->stopOnFirstFailure()->fails()) {
            return Response::error($validator->errors()->all(),null,400);
        }

        $slug           = Str::slug(SiteSectionConst::SECURITY_SECTION);
        $section        = SiteSections::where("key",$slug)->first();
        if($section != null ){
            $data       = json_decode(json_encode($section->value),true);
        }else{
            $data       = [];
        }
        if(array_key_exists("items",$data) && array_key_exists($request->data_target,$data['items'])) {
            $data['items'][$request->data_target]['status'] = ($request->status == 1) ? 0 : 1;
        }else {
            return Response::error(['Items not found or invalid!'],[],404);
        }

        $section->update([
            'value'     => $data,
        ]);

        return Response::success(['Section item status updated successfully!'],[],200);
        
    }
/**
     * Method for show how its work section page
     * @param string $slug
     * @return view
     */
    public function howItsWorkView($slug){
        $page_title     = "How Its Work Section";
        $section_slug   = Str::slug(SiteSectionConst::HOW_ITS_WORK_SECTION);
        $data           = SiteSections::getData($section_slug)->first();
        $languages      = $this->languages;
     
        return view('admin.sections.setup-sections.how-its-work-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }
    /**
     * Method for update howItsWork section page
     * @param string $slug
     * @return view
     */
    public function howItsWorkUpdate(Request $request,$slug){

        $basic_field_name = [
            'title'       => 'required|string|max:100',
            'heading'     => 'required|string|max:100',
        ];

        $slug     = Str::slug(SiteSectionConst::HOW_ITS_WORK_SECTION);
        $section  = SiteSections::where("key",$slug)->first();
        if($section != null ){
            $data    = json_decode(json_encode($section->value),true);
        }else{
            $data    =[];
        }
        $validator  = Validator::make($request->all(),[
            'image'            => "nullable|image|max:10240",
        ]);
        if($validator->fails()) return back()->withErrors($validator->errors())->withInput();

        $validated = $validator->validate();
       
        $data['image']    = $section->value->image ?? "";

        if($request->hasFile("image")){
            $data['image']= $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $data['language']     = $this->contentValidate($request,$basic_field_name);

        $update_data['key']   = $slug;
        $update_data['value'] = $data;
        
        
        try{
            SiteSections::updateOrCreate(["key"=>$slug],$update_data);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
     
    }
    /**
     * Method for store howItsWork item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function howItsWorkItemStore(Request $request,$slug) {
        $basic_field_name = [
            'item_title'       => 'required|string|max:100',
            'item_heading'       => 'required|string',
        ];


        $language_wise_data = $this->contentValidate($request,$basic_field_name,"HowItsWork-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        
        $slug       = Str::slug(SiteSectionConst::HOW_ITS_WORK_SECTION);
        $section    = SiteSections::where('key',$slug)->first();
        if($section != null){
            $section_data = json_decode(json_encode($section->value),true);
        }else{
            $section_data = [];
        }
        $unique_id =uniqid();

        $section_data['items'][$unique_id]['language'] = $language_wise_data;
        $section_data['items'][$unique_id]['id']       = $unique_id;
        
        $update_data['key']   = $slug;
        $update_data['value'] = $section_data;
        
        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went worng! Please try again.']]);
        }
        return back()->with(['success' => ['Section item added successfully!']]);
    }
    
    /**
     * Method for update howItsWork item
     * @param string $slug
     * @return view
     */
    public function howItsWorkItemUpdate(Request $request,$slug){
        $request->validate([
            'target'           => 'required|string',
        ]);

        $basic_field_name      = [
            "item_title_edit"  => "required|string|max:100",
            "item_heading_edit"  => "required|string",
        ];
        
        $slug        = Str::slug(SiteSectionConst::HOW_ITS_WORK_SECTION);
        $section     = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values["items"])) return back()->with(['error' => ['Section item not found']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"HowItsWork-edit");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
         
        $language_wise_data = array_map(function($language){
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $section_values['items'][$request->target]['language'] = $language_wise_data;
       
       try{
            $section->update([
                'value' => $section_values,
            ]);
       }catch(Exception $e){
            return back()->with(['error' => ['Something Went wrong! Please try again.']]);
       }
       return back()->with(['success' => ['Section item updated successfully!']]);
    }
    /**
     * Method for delete howItsWork item
     * @param string $slug
     * @return view
     */
    public function howItsWorkItemDelete(Request $request,$slug){
        $request->validate([
            'target' => 'required|string',
        ]);

        $slug     = Str::slug(SiteSectionConst::HOW_ITS_WORK_SECTION);
        $section  = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values  = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section Item not Found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid']]);

        try{
            unset($section_values['items'][$request->target]);
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);    
    }
    /**
     * Method for show download app section
     * @param string $slug
     * @param \Illuminate\Http\Request $request
     */
    public function downloadAppView($slug){
        $page_title     = "Download App Section";
        $section_slug   = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $data           = SiteSections::getData($section_slug)->first();
        $languages      = $this->languages;

        return view('admin.sections.setup-sections.download-app-section',compact(
            'page_title',
            'data',
            'languages',
            'slug'
        ));
    }
    /**
     * Method for update download app section
     * @param string
     * @param \Illuminate\\Http\Request $request
     */
    
    public function downloadAppUpdate(Request $request,$slug){
        $basic_field_name = [
            'title'       => 'required|string|max:100',
            'heading'     => 'required|string|max:100',
            'sub_heading' => 'required|string',
        ];

        $slug             = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section          = SiteSections::where("key",$slug)->first();

        if($section      != null){
            $data         = json_decode(json_encode($section->value),true);
        }else{
            $data         = [];
        }
        $validator  = Validator::make($request->all(),[
            'image'            => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);
        if($validator->fails()) return back()->withErrors($validator->errors())->withInput();

        $validated = $validator->validate();
       
        $data['image']    = $section->value->image ?? "";

        if($request->hasFile("image")){
            $data['image']= $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $data['language']     = $this->contentValidate($request,$basic_field_name);
        $update_data['key']   = $slug;
        $update_data['value'] = $data;
        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with( ['success' => ['Section updated successfully!']]);

    }
    /**
     * Method for store download app item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
    */
    public function downloadAppItemStore(Request $request,$slug) {
        $basic_field_name = [
            'item_title'    => "required|string|max:2555",
        ];

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"download-app-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $slug    = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }
        $unique_id = uniqid();

        $validator  = Validator::make($request->all(),[
            'link'            => "required|url",
            'image'           => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);

        if($validator->fails()) return back()->withErrors($validator->errors())->withInput()->with('modal','download-app-add');
        $validated = $validator->validate();

        $section_data['items'][$unique_id]['language']     = $language_wise_data;
        $section_data['items'][$unique_id]['id']           = $unique_id;
        $section_data['items'][$unique_id]['image']        = "";
        $section_data['items'][$unique_id]['link']        = $validated['link'];
        $section_data['items'][$unique_id]['created_at']   = now();
        if($request->hasFile("image")) {
            $section_data['items'][$unique_id]['image']    = $this->imageValidate($request,"image",$section->value->items->image ?? null);
        }

        $update_data['key']     = $slug;
        $update_data['value']   = $section_data;
        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }
    /**
     * Method for update download app item
     * @param string $slug
     * @return view
     */
    public function downloadAppItemUpdate(Request $request,$slug){
        $request->validate([
            'target'           => 'required|string',
        ]);

        $basic_field_name      = [
            'item_title_edit'     => "required|string|max:2555",
        ];

        $slug    = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        $request->merge(['old_image' => $section_values['items'][$request->target]['image'] ?? null]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"download-app-edit");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;

        $language_wise_data = array_map(function($language) {
            return replace_array_key($language,"_edit");
        },$language_wise_data);
        $validator      = Validator::make($request->all(),[
            'link'      => "required|url",
            'image'     => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);

        if($validator->fails()) return back()->withErrors($validator->errors())->withInput()->with('modal','download-app-edit');
        $validated = $validator->validate();

        $section_values['items'][$request->target]['language']      = $language_wise_data;
        $section_values['items'][$request->target]['link']          = $validated['link'];

        if($request->hasFile("image")) {
            $section_values['items'][$request->target]['image']    = $this->imageValidate($request,"image",$section_values['items'][$request->target]['image'] ?? null);
        }
        try{
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);
    }
    /**
     * Method for delete download app item
     * @param string $slug
     * @return view
     */
    public function downloadAppItemDelete(Request $request,$slug){
        $request->validate([
            'target'     => 'required|string',
        ]);

        $slug         = Str::slug(SiteSectionConst::DOWNLOAD_APP_SECTION);
        $section      = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        try{
            $image_name = $section_values['items'][$request->target]['image'];
            unset($section_values['items'][$request->target]);
            $image_path = get_files_path('site-section') . '/' . $image_name;
            delete_file($image_path);
            $section->update([
                'value'    => $section_values,
            ]);

        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Section item deleted successfully!']]);
    }
    /**
     * Method for show statistic section
     * @param string $slug
     * @param \Illuminate\Http\Request $request
     */
    public function statisticView($slug){
        $page_title     = "Statistic Section";
        $section_slug   = Str::slug(SiteSectionConst::STATISTIC_SECTION);
        $data           = SiteSections::getData($section_slug)->first();
        $languages      = $this->languages;

        return view('admin.sections.setup-sections.statistic-section',compact(
            'page_title',
            'data',
            'languages',
            'slug'
        ));
    }
    /**
     * Method for update statistics section
     * @param string
     * @param \Illuminate\\Http\Request $request
     */
    
    public function statisticUpdate(Request $request,$slug){
        $basic_field_name = [
            'title'       => 'required|string|max:100',
            'heading'     => 'required|string|max:100',
            'sub_heading' => 'required|string',
        ];

        $slug             = Str::slug(SiteSectionConst::STATISTIC_SECTION);
        $section          = SiteSections::where("key",$slug)->first();

        if($section      != null){
            $data         = json_decode(json_encode($section->value),true);
        }else{
            $data         = [];
        }
        $validator  = Validator::make($request->all(),[
            'image'            => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);
        if($validator->fails()) return back()->withErrors($validator->errors())->withInput();

        $validated = $validator->validate();
       
        $data['image']    = $section->value->image ?? "";

        if($request->hasFile("image")){
            $data['image']= $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $data['language']     = $this->contentValidate($request,$basic_field_name);
        $update_data['key']   = $slug;
        $update_data['value'] = $data;
        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with( ['success' => ['Section updated successfully!']]);

    }
    /**
     * Method for store statistics item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function statisticItemStore(Request $request,$slug) {
        $basic_field_name   = [
            'title'       => "required|string|max:255",
        ];

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"statistic-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $slug    = Str::slug(SiteSectionConst::STATISTIC_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }
        $unique_id  = uniqid();

        $validator  = Validator::make($request->all(),[
            'counter_value'     => "required|string",
        ]);

        if($validator->fails()) return back()->withErrors($validator->errors())->withInput()->with('modal','statistic-add');
        $validated = $validator->validate();

        $section_data['items'][$unique_id]['language']          = $language_wise_data;
        $section_data['items'][$unique_id]['id']                = $unique_id;
        $section_data['items'][$unique_id]['status']            = 1;
        $section_data['items'][$unique_id]['counter_value']     = $validated['counter_value'];
        

        $update_data['key']     = $slug;
        $update_data['value']   = $section_data;
        
        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }
    /**
     * Method for update statistics item section page
     * @param string $slug
     * @return view
     */
    public function statisticItemUpdate(Request $request,$slug){
        $request->validate([
            'target'           => 'required|string',
        ]);

        $basic_field_name      = [
            "title_edit"  => "required|string|max:100",
        ];
        
        $slug        = Str::slug(SiteSectionConst::STATISTIC_SECTION);
        $section     = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values["items"])) return back()->with(['error' => ['Section item not found']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"statistic-edit");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
         
        $language_wise_data = array_map(function($language){
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $validator  = Validator::make($request->all(),[
            'counter_value_edit'   => "required|string|max:100",
        ]);

        if($validator->fails()) return back()->withErrors($validator->errors())->withInput()->with('modal','statistic-edit');
        $validated = $validator->validate();

        $section_values['items'][$request->target]['language']          = $language_wise_data;
        $section_values['items'][$request->target]['counter_value']     = $validated['counter_value_edit'];
        
       
       try{
            $section->update([
                'value' => $section_values,
            ]);
       }catch(Exception $e){
            return back()->with(['error' => ['Something Went wrong! Please try again.']]);
       }
       return back()->with(['success' => ['Section item updated successfully!']]);
    }
    /**
     * Method for update statistics status section page
     * @param string $slug
     * @return view
     */
    public function statisticStatusUpdate(Request $request,$slug) {
        
        $validator = Validator::make($request->all(),[
            'status'                    => 'required|boolean',
            'data_target'               => 'required|string',
        ]);
        
        if ($validator->stopOnFirstFailure()->fails()) {
            return Response::error($validator->errors()->all(),null,400);
        }

        $slug           = Str::slug(SiteSectionConst::STATISTIC_SECTION);
        $section        = SiteSections::where("key",$slug)->first();
        if($section != null ){
            $data       = json_decode(json_encode($section->value),true);
        }else{
            $data       = [];
        }
        if(array_key_exists("items",$data) && array_key_exists($request->data_target,$data['items'])) {
            $data['items'][$request->data_target]['status'] = ($request->status == 1) ? 0 : 1;
        }else {
            return Response::error(['Items not found or invalid!'],[],404);
        }

        $section->update([
            'value'     => $data,
        ]);

        return Response::success(['Section item status updated successfully!'],[],200);
        
    }
    /**
     * Method for delete statistics item section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function statisticItemDelete(Request $request,$slug){
        $request->validate([
            'target'  => 'required|string',
        ]);

        $slug         = Str::slug(SiteSectionConst::STATISTIC_SECTION);
        $section      = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        try{
            unset($section_values['items'][$request->target]);
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success'   => ['Section item deleted successfully!']]);
    }
    /**
     * Method for show about us section page
     * @param string $slug
     * @return view
     */
    public function aboutUsView($slug) {
        $page_title = "About US Section";
        $section_slug = Str::slug(SiteSectionConst::ABOUT_US_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.about-us-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update about section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function aboutUsUpdate(Request $request,$slug) {

        $basic_field_name = [
            'title'       => "required|string|max:100",
            'heading'       => "required|string|max:100",
            'sub_heading'   => "required|string|max:1000",
        ];

        $slug = Str::slug(SiteSectionConst::ABOUT_US_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $data = json_decode(json_encode($section->value),true);
        }else {
            $data = [];
        }

        $data['image'] = $section->value->image ?? null;
        if($request->hasFile("image")) {
            $data['image']      = $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $data['language']  = $this->contentValidate($request,$basic_field_name);
        $update_data['value']  = $data;
        $update_data['key']    = $slug;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }
    /**
     * Method for show services section page
     * @param string $slug
     * @return view
     */
    public function servicesView($slug) {
        $page_title = "Services Section";
        $section_slug = Str::slug(SiteSectionConst::SERVICES_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.services-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update service section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function servicesUpdate(Request $request,$slug) {
        $basic_field_name = [
            'heading' => "required|string|max:100",
            'sub_heading' => "required|string|max:255",
        ];

        $slug = Str::slug(SiteSectionConst::SERVICES_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }

        $section_data['language']  = $this->contentValidate($request,$basic_field_name);

        $update_data['key']    = $slug;
        $update_data['value']  = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }

    /**
     * Method for store service item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function servicesItemStore(Request $request,$slug) {
        $basic_field_name = [
            'title'         => "required|string|max:255",
            'description'   => "required|string|max:500",
        ];

        $validator = Validator::make($request->all(),[
            'icon'      => "required|string|max:255",
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput()->with('modal','service-add');
        $validated = $validator->validate();

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"service-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $slug = Str::slug(SiteSectionConst::SERVICES_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }
        $unique_id = uniqid();

        $section_data['items'][$unique_id]['language'] = $language_wise_data;
        $section_data['items'][$unique_id]['id'] = $unique_id;
        $section_data['items'][$unique_id]['icon'] = $validated['icon'];

        $update_data['key'] = $slug;
        $update_data['value']   = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }

    /**
     * Method for update service item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function servicesItemUpdate(Request $request,$slug) {
        $request->validate([
            'target'    => "required|string",
            'icon_edit'      => "required|string|max:255",
        ]);

        $basic_field_name = [
            'title_edit'     => "required|string|max:255",
            'description_edit'   => "required|string|max:500",
        ];

        $slug = Str::slug(SiteSectionConst::SERVICES_SECTION);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"service-edit");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;

        $language_wise_data = array_map(function($language) {
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $section_values['items'][$request->target]['language'] = $language_wise_data;

        $section_values['items'][$request->target]['icon']    = $request->icon_edit;

        try{
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);

    }

    /**
     * Method for delete service item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function servicesItemDelete(Request $request,$slug) {
        $request->validate([
            'target'    => 'required|string',
        ]);
        $slug = Str::slug(SiteSectionConst::SERVICES_SECTION);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        try{
            unset($section_values['items'][$request->target]);
            $section->update([
                'value'     => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section item delete successfully!']]);
    }


    

    /**
     * Method for show clients feedback section page
     * @param string $slug
     * @return view
     */
    public function testimonialView($slug) {
        $page_title = "Testimonial Section";
        $section_slug = Str::slug(SiteSectionConst::TESTIMONIAL);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.clients-feedback-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update clients feedback section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function testimonialUpdate(Request $request,$slug) {
        $basic_field_name = [
            'heading' => "required|string|max:100",
            'sub_heading' => "required|string|max:255",
        ];

        $slug = Str::slug(SiteSectionConst::TESTIMONIAL);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }

        $section_data['language']  = $this->contentValidate($request,$basic_field_name);

        $update_data['key']    = $slug;
        $update_data['value']  = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }

    /**
     * Method for store clients feedback item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function testimonialItemStore(Request $request,$slug) {

        $basic_field_name = [
            'comment'    => "required|string|max:1000",
        ];

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"client-feedback-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $slug = Str::slug(SiteSectionConst::TESTIMONIAL);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }
        $unique_id = uniqid();

        // request data validate
        $validator = Validator::make($request->all(),[
            'name'              => "required|string|max:255",
            'designation'       => "required|string|max:500",
            'image'             => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);
        if($validator->fails()) return back()->withErrors($validator->errors())->withInput()->with('modal','client-feedback-add');
        $validated = $validator->validate();

        $section_data['items'][$unique_id]['language']      = $language_wise_data;
        $section_data['items'][$unique_id]['id']            = $unique_id;
        $section_data['items'][$unique_id]['image']         = "";
        $section_data['items'][$unique_id]['name']          = $validated['name'];
        $section_data['items'][$unique_id]['designation']   = $validated['designation'];

        if($request->hasFile("image")) {
            $section_data['items'][$unique_id]['image'] = $this->imageValidate($request,"image",$section->value->items->image ?? null);
        }

        $update_data['key'] = $slug;
        $update_data['value']   = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }

    /**
     * Method for update testimonial item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function testimonialItemUpdate(Request $request,$slug) {
        $validator = Validator::make($request->all(),[
            'target'                => "required|string",
            'name_edit'             => "required|string|max:255",
            'designation_edit'      => "required|string|max:500",
            'image_edit'            => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('modal','client-feedback-update');
        }

        $validated = $validator->validate();

        $basic_field_name = [
            'comment_edit'     => "required|string|max:1000",
        ];

        $slug = Str::slug(SiteSectionConst::TESTIMONIAL);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"client-feedback-update");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;

        $language_wise_data = array_map(function($language) {
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $section_values['items'][$request->target]['language']          = $language_wise_data;
        $section_values['items'][$request->target]['name']              = $request->name_edit;
        $section_values['items'][$request->target]['designation']       = $request->designation_edit;

        $section_values['items'][$request->target]['image']     = $section_values['items'][$request->target]['image'] ?? "";
        if($request->hasFile("image_edit")) {
            $section_values['items'][$request->target]['image'] = $this->imageValidate($request,"image_edit",$section_values['items'][$request->target]['image'] ?? null);
        }

        try{
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);
    }

    /**
     * Method for delete testimonial item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function testimonialItemDelete(Request $request,$slug) {
        $request->validate([
            'target'    => 'required|string',
        ]);
        $slug = Str::slug(SiteSectionConst::TESTIMONIAL);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        try{
            $image_link = get_files_path('site-section') . '/' . $section_values['items'][$request->target]['image'];
            unset($section_values['items'][$request->target]);
            delete_file($image_link);
            $section->update([
                'value'     => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section item delete successfully!']]);
    }

    /**
     * Method for show announcement section page
     * @param string $slug
     * @return view
     */
    public function announcementView($slug) {
        $page_title = "Announcement Section";
        $section_slug = Str::slug(SiteSectionConst::ANNOUNCEMENT_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        $announcements = Announcement::get();
        $categories = AnnouncementCategory::get();

        $total_categories = $categories->count();
        $active_categories = $categories->where("status",GlobalConst::ACTIVE)->count();

        $total_announcements = $announcements->count();
        $active_announcements = $announcements->where("status",GlobalConst::ACTIVE)->count();

        // dd($announcements,$categories);

        return view('admin.sections.setup-sections.announcement-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
            'total_categories',
            'active_categories',
            'total_announcements',
            'active_announcements',
        ));
    }

    /**
     * Method for update announcement update section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function announcementUpdate(Request $request,$slug) {
        $basic_field_name = [
            'heading' => "required|string|max:100",
            'sub_heading' => "required|string|max:255",
        ];

        $slug = Str::slug(SiteSectionConst::ANNOUNCEMENT_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }

        $section_data['language']  = $this->contentValidate($request,$basic_field_name);

        $update_data['key']    = $slug;
        $update_data['value']  = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }


    /**
     * Method for show footer section page
     * @param string $slug
     * @return view
     */
    public function footerView($slug) {
        $page_title = "Footer Section";
        $section_slug = Str::slug(SiteSectionConst::FOOTER_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.footer-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update footer section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function footerUpdate(Request $request,$slug) {
        $slug   = Str::slug(SiteSectionConst::FOOTER_SECTION);
        $section   = SiteSections::where('key',$slug)->first();
        $validated = Validator::make($request->all(),[
            'icon'                 => "nullable|array",
            'icon.*'               => "nullable|string|max:200",
            'link'                 => "nullable|array",
            'link.*'               => "nullable|url|max:255",
        ])->validate();

        // generate input fields
        $social_links = [];
        foreach($validated['icon'] as $key => $icon) {
            $social_links[] = [
                'icon'          => $icon,
                'link'          => $validated['link'][$key] ?? "",
            ];
        }

        $data['social_links']    = $social_links;
        $data['footer']['image']      = $section->value->footer->image ?? "";
        if($request->hasFile("image")) {
            $data['footer']['image']  = $this->imageValidate($request,"image",$section->value->footer->image ?? null);
        }

        try{
            SiteSections::updateOrCreate(['key' => $slug],[
                'key'   => $slug,
                'value' => $data,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }

    /**
     * Method for show about page section page
     * @param string $slug
     * @return view
     */
    public function aboutPageView($slug) {
        $page_title = "About Page Section";
        $section_slug = Str::slug(SiteSectionConst::ABOUT_PAGE_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.about-page-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update about page section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function aboutPageUpdate(Request $request,$slug) {

        $basic_field_name = [
            'heading'       => "required|string|max:100",
            'sub_heading'   => "required|string|max:255",
            'desc'          => "required|string|max:2000",
            'button_name'   => "nullable|string|max:60",
            'button_link'   => "nullable|string|max:255",
        ];

        $slug = Str::slug(SiteSectionConst::ABOUT_PAGE_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $data = json_decode(json_encode($section->value),true);
        }else {
            $data = [];
        }

        $data['image'] = $section->value->image ?? null;
        if($request->hasFile("image")) {
            $data['image']      = $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $data['language']  = $this->contentValidate($request,$basic_field_name);
        $update_data['value']  = $data;
        $update_data['key']    = $slug;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }

    /**
     * Method for store about page item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function aboutPageItemStore(Request $request,$slug) {

        $basic_field_name = [
            'title'         => "required|string|max:255",
            'description'   => "required|string|max:2000",
        ];

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"about-page-item-add");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;
        $slug = Str::slug(SiteSectionConst::ABOUT_PAGE_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }
        $unique_id = uniqid();

        $section_data['items'][$unique_id]['language'] = $language_wise_data;
        $section_data['items'][$unique_id]['id'] = $unique_id;

        $update_data['key'] = $slug;
        $update_data['value']   = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Section item added successfully!']]);
    }

    /**
     * Method for update about page item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function aboutPageItemUpdate(Request $request,$slug) {

        $request->validate([
            'target'        => "required|string"
        ]);

        $basic_field_name = [
            'title_edit'     => "required|string|max:255",
            'description_edit'   => "required|string|max:3000",
        ];

        $slug = Str::slug(SiteSectionConst::ABOUT_PAGE_SECTION);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        $language_wise_data = $this->contentValidate($request,$basic_field_name,"about-us-item-edit");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;

        $language_wise_data = array_map(function($language) {
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $section_values['items'][$request->target]['language'] = $language_wise_data;
        $section_values['items'][$request->target]['icon']    = $request->icon_edit;

        try{
            $section->update([
                'value' => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Information updated successfully!']]);
    }

    /**
     * Method for delete about page item
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function aboutPageItemDelete(Request $request,$slug) {
        $request->validate([
            'target'    => 'required|string',
        ]);
        $slug = Str::slug(SiteSectionConst::ABOUT_PAGE_SECTION);
        $section = SiteSections::getData($slug)->first();
        if(!$section) return back()->with(['error' => ['Section not found!']]);
        $section_values = json_decode(json_encode($section->value),true);
        if(!isset($section_values['items'])) return back()->with(['error' => ['Section item not found!']]);
        if(!array_key_exists($request->target,$section_values['items'])) return back()->with(['error' => ['Section item is invalid!']]);

        try{
            unset($section_values['items'][$request->target]);
            $section->update([
                'value'     => $section_values,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section item delete successfully!']]);
    }

    /**
     * Method for show contact us section page
     * @param string $slug
     * @return view
     */
    public function contactUsView($slug) {
        $page_title = "Contact US Section";
        $section_slug = Str::slug(SiteSectionConst::CONTACT_US_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        $languages = $this->languages;

        return view('admin.sections.setup-sections.contact-us-section',compact(
            'page_title',
            'data',
            'languages',
            'slug',
        ));
    }

    /**
     * Method for update contact us section information
     * @param string $slug
     * @param \Illuminate\Http\Request  $request
     */
    public function contactUsUpdate(Request $request,$slug) {
        $basic_field_name = [
            'heading'       => "required|string|max:100",
            'sub_heading'   => "required|string|max:255",
        ];

        $slug = Str::slug(SiteSectionConst::CONTACT_US_SECTION);
        $section = SiteSections::where("key",$slug)->first();

        if($section != null) {
            $section_data = json_decode(json_encode($section->value),true);
        }else {
            $section_data = [];
        }

        $section_data['image'] = $section->value->image ?? null;
        if($request->hasFile("image")) {
            $section_data['image']      = $this->imageValidate($request,"image",$section->value->image ?? null);
        }

        $section_data['language']  = $this->contentValidate($request,$basic_field_name);

        $update_data['key']    = $slug;
        $update_data['value']  = $section_data;

        try{
            SiteSections::updateOrCreate(['key' => $slug],$update_data);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Section updated successfully!']]);
    }

    /**
     * Method for get languages form record with little modification for using only this class
     * @return array $languages
     */
    public function languages() {
        $languages = Language::whereNot('code',LanguageConst::NOT_REMOVABLE)->select("code","name")->get()->toArray();
        $languages[] = [
            'name'      => LanguageConst::NOT_REMOVABLE_CODE,
            'code'      => LanguageConst::NOT_REMOVABLE,
        ];
        return $languages;
    }

    /**
     * Method for validate request data and re-decorate language wise data
     * @param object $request
     * @param array $basic_field_name
     * @return array $language_wise_data
     */
    public function contentValidate($request,$basic_field_name,$modal = null) {
        $languages = $this->languages();

        $current_local = get_default_language_code();
        $validation_rules = [];
        $language_wise_data = [];
        foreach($request->all() as $input_name => $input_value) {
            foreach($languages as $language) {
                $input_name_check = explode("_",$input_name);
                $input_lang_code = array_shift($input_name_check);
                $input_name_check = implode("_",$input_name_check);
                if($input_lang_code == $language['code']) {
                    if(array_key_exists($input_name_check,$basic_field_name)) {
                        $langCode = $language['code'];
                        if($current_local == $langCode) {
                            $validation_rules[$input_name] = $basic_field_name[$input_name_check];
                        }else {
                            $validation_rules[$input_name] = str_replace("required","nullable",$basic_field_name[$input_name_check]);
                        }
                        $language_wise_data[$langCode][$input_name_check] = $input_value;
                    }
                    break;
                } 
            }
        }
        if($modal == null) {
            $validated = Validator::make($request->all(),$validation_rules)->validate();
        }else {
            $validator = Validator::make($request->all(),$validation_rules);
            if($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with("modal",$modal);
            }
            $validated = $validator->validate();
        }

        return $language_wise_data;
    }

    /**
     * Method for validate request image if have
     * @param object $request
     * @param string $input_name
     * @param string $old_image
     * @return boolean|string $upload
     */
    public function imageValidate($request,$input_name,$old_image) {
        if($request->hasFile($input_name)) {
            $image_validated = Validator::make($request->only($input_name),[
                $input_name         => "image|mimes:png,jpg,webp,jpeg,svg",
            ])->validate();

            $image = get_files_from_fileholder($request,$input_name);
            $upload = upload_files_from_path_dynamic($image,'site-section',$old_image);
            return $upload;
        }

        return false;
    }
}
