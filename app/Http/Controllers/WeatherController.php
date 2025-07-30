<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        if (!Storage::exists('weather.json')) {
            return "File not found.";
        }

        $json = Storage::get('weather.json');
        $weatherData = json_decode($json, true);

        if ($weatherData === null) {
            return "Failed to decode JSON.";
        }

        return view('weather.index', ['weather' => $weatherData]);
    }
}