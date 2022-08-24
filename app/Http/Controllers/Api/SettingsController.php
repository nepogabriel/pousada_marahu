<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Exception;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // public function addUrlApi() {}

    public function getUrlApi()
    {
        try {
            $settings = Settings::select('set')->where('name', '=', 'urlApi')->get();

            return response()->json($settings);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Não foi possível retornar a url',
                'error' => $e->getMessage()
            ]);
        }
    }
}
