<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\PortfolioResource;
use App\Http\Resources\SettingResource;
use App\Models\Brand;
use App\Models\Contactus;
use App\Models\Developer;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Trait\API;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_brands()
    {
        $brands = ImageResource::collection(Brand::query()->get());
        return API::data($brands, 200, 'Successfully Get All Brands');
    }

    public function get_portfolio()
    {
        $portfolio = PortfolioResource::collection(Portfolio::query()->get());
        return API::data($portfolio, 200, 'Successfully Get All Portfolio');
    }

    public function get_developer()
    {
        $developer = DeveloperResource::collection(Developer::query()->get());
        return API::data($developer, 200, 'Successfully Get All Developer');
    }

    public function post_contact_us(Request $request)
    {
        Contactus::query()->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message,
        ]);
        return API::data(null, 200, 'Successfully Send Message');
    }

    public function get_setting()
    {
        $setting = SettingResource::collection(Setting::query()->get());
        return API::data($setting, 200, 'Successfully Get All Setting');
    }

    public function api_token()
    {
        return response(Setting::query()->select('api_token')->first());
    }
}
