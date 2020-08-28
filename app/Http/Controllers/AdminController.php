<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdminController extends Controller
{
    public function showMod($param) {
        
        if($param == 'pending') {
            $param_name = 'Объявления со статусом - в ожидании';
            $where_param = 'offers_statuses.id';
            $where_value = '1';
        }
        
        $advs = \DB::table('advertisements')
            ->leftJoin('users', 'advertisements.user_id', '=', 'users.id')
            ->leftJoin('crops', 'advertisements.crop_id', '=', 'crops.id')
            ->leftJoin('crops_categories', 'crops.category_id', '=', 'crops_categories.id')
            ->leftJoin('crops_classiness', 'advertisements.crops_class_id', '=', 'crops_classiness.id')
            ->leftJoin('incoterms', 'advertisements.incoterms_id', '=', 'incoterms.id')
            ->leftJoin('incoterms_groups', 'incoterms.group_id', '=', 'incoterms_groups.id')
            ->leftJoin('location_regions_districts', 'advertisements.location_regions_district_id', '=', 'location_regions_districts.id')
            ->leftJoin('location_regions', 'location_regions_districts.region_id', '=', 'location_regions.id')
            ->leftJoin('pickup', 'advertisements.pickup_id', '=', 'pickup.id')
            ->leftJoin('seller_types', 'advertisements.seller_type_id', '=', 'seller_types.id')
            ->leftJoin('payment_forms', 'advertisements.payment_form_id', '=', 'payment_forms.id')
            ->leftJoin('payment_methods', 'advertisements.payment_method_id', '=', 'payment_methods.id')
            ->leftJoin('offers_statuses', 'advertisements.offers_status_id', '=', 'offers_statuses.id' )
            ->select('advertisements.*', 'advertisements.web-syte as web','users.name as user_name', 'crops.name as crop_name', 'crops_categories.name as category_name',
                     'incoterms.abbr as incoterm_name', 'incoterms_groups.name as group_name', 'crops_classiness.name as crops_class_name',
                     'location_regions_districts.name as district_name', 'location_regions.name as location_region_name',
                     'pickup.name as pickup_name', 'seller_types.name as seller_type_name', 'payment_forms.name as pay_form_name',
                     'payment_methods.name as pay_method_name', 'offers_statuses.name as offer_name')
            ->where('offers_statuses.id', '1')
            ->get(); 
            // dd($advs);           
        if (view()->exists('admin.showMod')) {
            return view('admin.showMod', ['title' => 'GrainBoard | Модерация', 'advs' => $advs, 'param' => $param_name]);
        }
        abort(404);
        
    }

    public function changeStatus(Request $request, $id) {
        $status = $request->status;
        Advertisement::where('id', $id)
          ->update(['offers_status_id' => $status]);
        return redirect()->route('showMod', 'pending')->with('info', 'Статус успешно изменен.');
    }
}
