<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(string $locale): mixed
    {
        App::setLocale($locale);
        return view('index');
    }
    public function logout(Request $request): LogoutResponse
    {
        $this->guard->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return app(LogoutResponse::class);
    }

    public function about(string $locale): mixed
    {
        App::setLocale($locale);

        return view('about');
    }
    public function product(string $locale): mixed
    {
        App::setLocale($locale);
        return view('product');
    }


    public function store(string $locale): mixed
    {
        App::setLocale($locale);
        return view('store');
    }
    public function contact(string $locale): mixed
    {
        App::setLocale($locale);
        return view('contact');
    }

    public function error500(): mixed
    {
        return view('errors.minimal-500')->with('code', 500);
    }



}
