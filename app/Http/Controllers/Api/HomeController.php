<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\CertificateResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\FooterLogoResource;
use App\Http\Resources\FooterSocialResource;
use App\Http\Resources\HeaderResource;
use App\Http\Resources\HeroResource;
use App\Http\Resources\MissionResource;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\SeoResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\WorthResource;
use App\Models\About;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\FooterLogo;
use App\Models\FooterSocial;
use App\Models\Header;
use App\Models\Hero;
use App\Models\Mission;
use App\Models\Partner;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Worth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heros = Hero::orderBy('created_at', 'desc')->get();
        $about = About::first();
        $partners = Partner::get();
        $mission = Mission::first();
        $worths = Worth::get();
        $contact = Contact::first();
        $footer_logo = FooterLogo::first();
        $footer_socials = FooterSocial::get();
        $services = Service::get();
        $header = Header::first();
        $certificates = Certificate::get();
        $seo = Seo::first();
        return response()->json([
            'status' => 'success',
            'data' => [
                'heros' => HeroResource::collection($heros),
                'about'=>new AboutResource($about),
                'partners' => PartnerResource::collection($partners),
                'mission' => new MissionResource($mission),
                'worths' => WorthResource::collection($worths),
                'contact' => new ContactResource($contact),
                'footer_logo' => new FooterLogoResource($footer_logo),
                'footer_socials' => FooterSocialResource::collection($footer_socials),
                'services' => ServiceResource::collection($services),
                'header' => new HeaderResource($header),
                'certificates' => CertificateResource::collection($certificates),
                'seo' => new SeoResource($seo)
            ]
        ]);
    }
}
