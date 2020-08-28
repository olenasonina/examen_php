<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Advertisement;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function getIndex()
    {
        if (view()->exists('index')) {
            $cats = \DB::table('crops_categories')->get();
            $advs = \DB::table('advertisements')
            ->join('crops', 'advertisements.crop_id', '=', 'crops.id')
            ->select('advertisements.*', 'crops.name as crops_name')
            ->orderBy('updated_at', 'desc')->get();
            return view('index', ['title' => 'GrainBoard | Главная', 'cats' => $cats, 'advs' => $advs]);
        }
        abort(404);
    }

    public function createAdv(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'image' => 'image',
                'crop' => 'required',
                'crops_class' => 'required',
                'districts' => 'required',
                'pickup' => 'required',
                'cropdescription' => 'required|max:4294967295',
                'seller_types' => 'required',
                'phone' => 'required|alpha_dash|max:20',
                'price' => 'required|numeric',
            ]);

            $filename = '1598417043.png';

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path($this->getImagePath($request->id)) . $filename);
            }

            $id = Auth::id();

            Advertisement::create([
                'user_id' => $id,
                'crop_id' => $request->input('crop'),
                'image' => $filename,
                'crops_class_id' => $request->input('crops_class'),
                'incoterms_id' => $request->input('incoterms'),
                'location_regions_district_id' => $request->input('districts'),
                'pickup_id' => $request->input('pickup'),
                'price' => $request->input('price'),
                'description' => $request->input('cropdescription'),
                'seller_type_id' => $request->input('seller_types'),
                'web-syte' => $request->input('c_web'),
                'telephon' => $request->input('phone'),
                'payment_method_id' => $request->input('payment_methods'),
                'payment_form_id' => $request->input('payment_forms'),

            ]);
            return redirect()->route('index')->with('info', 'Ваше объявление отправлено на модерацию');
        }

        if (view()->exists('form')) {
            $crops = \DB::table('crops')->get()->where('available', 'yes');
            $crops_classiness = \DB::table('crops_classiness')->get()->where('available', 'yes');
            $incoterms = \DB::table('incoterms')->get()->where('available', 'yes');
            $locations = \DB::table('location_regions_districts')
                ->join('location_regions', 'location_regions_districts.region_id', '=', 'location_regions.id')
                ->select('location_regions_districts.*', 'location_regions.name as regions_name')
                ->where('location_regions_districts.available', 'yes')
                ->orderBy('location_regions.name')
                ->get();
            $seller_types = \DB::table('seller_types')->get()->where('available', 'yes');
            $pickup = \DB::table('pickup')->get()->where('available', 'yes');
            $payment_methods = \DB::table('payment_methods')->get()->where('available', 'yes');
            $payment_forms = \DB::table('payment_forms')->get();
            $units = ['kg'=>'кг', 'ton'=>'тонн'];
            return view('form', ['title' => 'GrainBoard | Создать'], [
                'crops' => $crops, 'crops_classiness' => $crops_classiness,
                'incoterms' => $incoterms, 'locations' => $locations,
                'seller_types' => $seller_types, 'pickup' => $pickup, 'payment_methods' => $payment_methods,
                'payment_forms' => $payment_forms, 'units' => $units
            ]);
        }
        abort(404);
    }

    public function getImagePath()
    {
        $path = "uploads/adv_images";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return "/$path/";
    }

    public function showAdv($id_adv) {
        $adv = \DB::table('advertisements')
            ->join('users', 'advertisements.user_id', '=', 'users.id')
            ->join('crops', 'advertisements.crop_id', '=', 'crops.id')
            ->join('crops_categories', 'crops.category_id', '=', 'crops_categories.id')
            ->join('crops_classiness', 'advertisements.crops_class_id', '=', 'crops_classiness.id')
            ->join('incoterms', 'advertisements.incoterms_id', '=', 'incoterms.id')
            ->join('incoterms_groups', 'incoterms.group_id', '=', 'incoterms_groups.id')
            ->join('location_regions_districts', 'advertisements.location_regions_district_id', '=', 'location_regions_districts.id')
            ->join('location_regions', 'location_regions_districts.region_id', '=', 'location_regions.id')
            ->join('pickup', 'advertisements.pickup_id', '=', 'pickup.id')
            ->join('seller_types', 'advertisements.seller_type_id', '=', 'seller_types.id')
            ->join('payment_forms', 'advertisements.payment_form_id', '=', 'payment_forms.id')
            ->join('payment_methods', 'advertisements.payment_method_id', '=', 'payment_methods.id')
            ->select('advertisements.*', 'advertisements.web-syte as web','users.name as user_name', 'crops.name as crop_name', 'crops_categories.name as category_name',
                     'incoterms.abbr as incoterm_name', 'incoterms_groups.name as group_name', 'crops_classiness.name as crops_class_name',
                     'location_regions_districts.name as district_name', 'location_regions.name as location_region_name',
                     'pickup.name as pickup_name', 'seller_types.name as seller_type_name', 'payment_forms.name as pay_form_name',
                     'payment_methods.name as pay_method_name')
            ->where('advertisements.id', $id_adv)
            ->get();
            // dd($adv);
        if (view()->exists('some_adv')) {
            return view('some_adv', ['title' => 'GrainBoard | Объявление', 'adv' => $adv]);
        }
        abort(404); 
    }

    public function showCat($id_cat) {
        $cats = \DB::table('crops_categories')->get();
        $c_advs = \DB::table('advertisements')
                  ->join('crops', 'advertisements.crop_id', '=', 'crops.id')
                  ->join('crops_categories', 'crops.category_id', '=', 'crops_categories.id')
                  ->select('advertisements.*', 'crops.name as crops_name', 'crops_categories.name as category_name')
                  ->where('crops_categories.id', $id_cat)
                  ->orderBy('updated_at', 'desc')->get();
        return view('cats', ['title' => 'GrainBoard | Категория', 'cats' => $cats, 'advs' => $c_advs]);
    }
    
    public function myAdv() {
        $c_advs = \DB::table('advertisements')
                  ->join('crops', 'advertisements.crop_id', '=', 'crops.id')
                  ->select('advertisements.*', 'crops.name as crops_name')
                  ->where('advertisements.user_id', Auth::id())
                  ->orderBy('updated_at', 'desc')->get();
        return view('userAdv', ['title' => 'GrainBoard | Объявления', 'advs' => $c_advs]);
    }
}
