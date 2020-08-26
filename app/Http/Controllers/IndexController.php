<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function getIndex()
    {
        if (view()->exists('index')) {
            return view('index', ['title' => 'GrainBoard | Главная']);
        }
        abort(404);
    }

    public function createAdv(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save(public_path($this->getImagePath($request->id)) . $filename);
            }
        }

        if (view()->exists('form')) {
            $crops = \DB::table('crops')->get()->where('available', 'yes');
            $crops_classiness = \DB::table('crops_classiness')->get()->where('available', 'yes');
            $incoterms = \DB::table('incoterms')->get()->where('available', 'yes');
            $locations = \DB::table('location_regions_districts')
                ->join('location_regions', 'location_regions_districts.region_id', '=', 'location_regions.id')
                ->select('location_regions_districts.*', 'location_regions.name as regions_name')
                ->where('location_regions_districts.available','yes')
                ->orderBy('location_regions.name')
                ->get();
            $seller_types = \DB::table('seller_types')->get()->where('available', 'yes');
            $pickup = \DB::table('pickup')->get()->where('available', 'yes');
            $payment_methods = \DB::table('payment_methods')->get()->where('available', 'yes');
            $payment_forms = \DB::table('payment_forms')->get();
            return view('form', ['title' => 'GrainBoard | Создать'], [
                'crops' => $crops, 'crops_classiness' => $crops_classiness,
                'incoterms' => $incoterms, 'locations' => $locations,
                'seller_types' => $seller_types, 'pickup' => $pickup, 'payment_methods' => $payment_methods,
                'payment_forms' => $payment_forms
            ]);
        }
        abort(404);
    }

    public function getImagePath() {
        $path = "uploads/adv_images";
        if(! file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return "/$path/";
    }
}
