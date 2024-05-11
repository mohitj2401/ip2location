<?php

namespace App\Http\Controllers;

use App\Models\GeolocationLog;
use Illuminate\Http\Request;
use Guzzle\Http\Exception\ClientErrorResponseException;

class GeolocationLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $geolocationLogs = GeolocationLog::get();
        return view("welcome", compact('geolocationLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GeolocationLog $geolocationLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeolocationLog $geolocationLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeolocationLog $geolocationLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeolocationLog $geolocationLog)
    {
    }


    public function getMyLocation()
    {

        $client = new \GuzzleHttp\Client();
        $apiKey = env('ABSTRACT_API_KEY');
        $user_ip = request()->ip();
        try {
            $response = $client->request('GET', 'https://ipgeolocation.abstractapi.com/v1/?api_key=' . $apiKey . '&ip_address=' . request()->ip());

            $data = array();
            if ($response->getBody()) {
                $data = json_decode($response->getBody()->getContents());
            }
            // return $data;
            $log = new GeolocationLog();
            $log->ip_address = $data->ip_address;
            $log->city = $data->city;
            $log->region = $data->region;
            $log->country = $data->country;
            $log->longitude = $data->longitude;
            $log->latitude = $data->latitude;
            $log->save();
            return view('mylocation', compact('log'));
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();

                \Log::error("Status Code : " . $response->getStatusCode() . "  Response Message : " . $response->getReasonPhrase());
            }
            return $response;
        } catch (\Exception $e) {
            \Log::error("Error Message : " . $e->getMessage());
            throw $e;
        }
    }
}
