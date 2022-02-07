<?php

namespace App\Http\Controllers\Backend;

use App\ContactUs;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function ssd(){
        $contactus=ContactUs::query();
        return Datatables::of($contactus)->make(true);

    }

    public function contactus(){
        return view('backend.contactus');
    }

}
