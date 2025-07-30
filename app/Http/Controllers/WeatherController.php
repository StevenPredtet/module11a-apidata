<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
{
    $json = Storage::disk('public')->get('weather.json');
    $weatherData = json_decode($json, true);
    return view('weather.index', ['weather' => $weatherData]);
}
}