<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(string $locale): mixed
    {
        App::setLocale($locale);
        $products = Product::all();
        $categories = Category::all();
        return view('index', ['products' => $products, 'categories' => $categories]);

    }
    /**
	 * Destroy an authenticated session.
	 *
	 * @param  Request  $request
	 * @return LogoutResponse
	 */


    public function about(string $locale): mixed
    {
        App::setLocale($locale);

        return view('about');
    }
    public function product(string $locale): mixed
    {
        App::setLocale($locale);
        $categories = Category::with(['products'])->get();
        $products = Product::all();
        return view('product' ,['categories' => $categories]);
    }

    public function productDetails(string $locale ,$id): mixed
    {
       
        App::setLocale($locale);
        $categories = Category::with(['products'])->get();
        $product = Product::findOrFail($id);
        return view('product-details' ,['product' => $product]);
    }
    public function store(string $locale): mixed
    {
        App::setLocale($locale);
        $categories = Category::all()->with(['products']);
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
    public function logout(Request $request): mixed
    {
        // Log the user out of the application
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();
        $locale = 'ar'; // Set this to the appropriate locale
        return redirect()->route('home',['locale' => $locale])->with('success', 'Logged out successfully.');
    }


}
