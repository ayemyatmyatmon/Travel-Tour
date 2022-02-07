<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\Package;
use App\ContactUs;
use App\Day_By_Day_Package;
use App\Http\Requests\StoreContactUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::paginate(4);
        $packages = Package::paginate(4);
        $packagedetails = Day_By_Day_Package::get();
        return view('frontend.home', compact('packages', 'packagedetails', 'cities'));
    }

    public function show($id)
    {
        // if($first_city){
        //     $first_city_images = $first_city->images ?? [];
        //     $feature_image = count($first_city_images) ? Storage::url('city/' . $first_city_images[$id]) : null;
        // }

        $city = City::findOrFail($id);
        $feature_images=[];
        if($city){
            $city_images=$city->images??[];
            $feature_image=count($city_images) ? Storage::url('city/'.$city_images[0] ): null;
        }
        $cities = City::get();
        return view('frontend.show', compact('city', 'cities','feature_image'));

    }

    public function destination()
    {
        $feature_image = null;
        $first_city = City::inRandomOrder()->first();
        if($first_city){
            $first_city_images = $first_city->images ?? [];
            $feature_image = count($first_city_images) ? Storage::url('city/' . collect($first_city_images)->random()) : null;
        }

        $cities = City::paginate(8);

        return view('frontend.destination', compact('cities', 'feature_image'));
    }

    public function aboutUs()
    {
        $cities = City::get();
        return view('frontend.aboutus', compact('cities'));
    }

    public function package()
    {
        $feature_image = null;
        $first_package = Package::inRandomOrder()->first();
        if($first_package){
            $first_package_images = $first_package->images ?? [];
            $feature_image = Storage::url('package/' . $first_package_images);
        }
        $packages = Package::paginate(8);
        return view('frontend.package', compact('packages','feature_image'));
    }

    public function packageDetailShow($id)
    {
        $package = Package::findOrfail($id);
        $feature_images=[];
        if($package){
            $package_images=$package->images??[];
            $feature_image=Storage::url('package/' . $package_images);
        }
        $packagedetail = Day_By_Day_Package::get();
        $packagedetails = $package->packagedetail->all();
        return view('frontend.packagedetail', compact('packagedetails', 'package','feature_image'));
    }

    public function hotel()
    {
        $hotels = Hotel::get();
        $city = City::get();
        return view('frontend.hotel', compact('hotels'));
    }

    public function contact()
    {
        return view('frontend.contactus');
    }

    public function contactUsStore(StoreContactUs $request)
    {
        $contactus = new ContactUs;
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->subject = $request->subject;
        $contactus->message = $request->message;
        $contactus->save();
        return redirect(route('user.home'));

    }
    public function currency(){
        $response = Http::get('http://forex.cbm.gov.mm/api/latest');
        $currency=$response->json();
        // return $currency['rates'];
        return view('frontend.currency',compact('currency'));

    }
}
