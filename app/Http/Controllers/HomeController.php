<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Investment;
use App\Models\Package;
use App\Models\Service;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Home Page',
            'packages'  => Package::where('status',1)->get(),
            'deposits'=>Investment::where('status','1')->orWhere('status','4')->orderBy('id','desc')->limit(10)->get(),
            'withdrawals'=>Withdrawal::where('status','!=',3)->orderBy('id','desc')->limit(10)->get(),
            'services'  =>Service::where('status',1)->get()
        ];

        return view('home.home',$dataView);
    }

    public function about()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Company Overview',
            'packages'  => Package::where('status',1)->get(),
            'services'  =>Service::where('status',1)->get()
        ];

        return view('home.about',$dataView);
    }
    public function plans()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Packages',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.plans',$dataView);
    }
    public function terms()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Terms and Conditions',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.terms',$dataView);
    }
    public function privacy()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Privacy Policy',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.privacy',$dataView);
    }
    public function faqs()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Frequently Asked Questions',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.faq',$dataView);
    }
    public function services()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Services',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.service',$dataView);
    }
    public function estate()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Real Estates',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.estates',$dataView);
    }
    public function contact()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Contact us',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.contact',$dataView);
    }
    public function buyBtc()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Where to Buy Bitcoin',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.buy_btc',$dataView);
    }
    //service detail
    public function serviceDetail($id)
    {
        $web = GeneralSetting::where('id',1)->first();

        $service = Service::where('id',$id)->firstOrFail();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => $service->title,
            'service'  => $service,
            'packages'  => Package::where('status',1)->get(),
        ];

        return view('home.service_detail',$dataView);
    }
    //security
    public function security()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Security Information',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.security',$dataView);
    }

    public function realEstate()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Real Estate',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.estates',$dataView);
    }
    public function nft()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'NFT',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.nft',$dataView);
    }
    public function gold()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Gold',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.gold',$dataView);
    }
    public function retirement()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Retirement',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.retirement',$dataView);
    }
    public function forex()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Foreign Exchange',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.forex',$dataView);
    }
    public function stocks()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Stocks & ETFs',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.stocks',$dataView);
    }
    public function agriculture()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Agriculture',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.agriculture',$dataView);
    }
    public function career()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Career',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.career',$dataView);
    }
    public function affiliate()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Affiliates',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.affiliate',$dataView);
    }
}

