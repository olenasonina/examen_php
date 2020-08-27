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

    public function showAdv($id) {
        if (view()->exists('some_adv')) {
            return view('some_adv', ['title' => 'GrainBoard | Объявление']);
        }
        abort(404); 
    }
}
