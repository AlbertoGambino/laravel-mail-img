<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;

use App\Brand;
use App\Car;

use App\Mail\NewCarNotify;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createCar(){

        $brands = Brand::all();

        return view('pages.create-car', compact('brands'));
    }

    public function storeCar(Request $request){

        $validated = $request -> validate([

            'name' => 'required|string|min:3|max:255',
            'model' => 'required|string|min:3|max:255',
            'kW' => 'required|integer|min:10|max:1000',

        ]);

        $img = $request -> file('image');
        $imgExt = $img -> getClientOriginalExtension();
        $imgNewName = time() . rand(0, 1000) . '.' . $imgExt;
        $folder = '/car-img';

        $imgFile = $img -> storeAs($folder, $imgNewName, 'public');

        $car = Car::make($validated);

        $brand = Brand::findOrFail($request-> brand_id);

        $car -> brand() -> associate($brand);

        $car -> img = $imgNewName;

        $car -> save();

        $user = Auth::user();

        $mail = new NewCarNotify($car);

        Mail::to('destinatario@mail.com')
            ->send($mail);

        Mail::to($user -> email)
            ->send($mail);

        return redirect() -> route('home');

    }
}
