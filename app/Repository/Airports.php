<?php

namespace App\Repository;

use Cache;
use GuzzleHttp\Client;

class Airports
{
    CONST CACHE_KEY = 'AIRPORT';

    public function getAirportInfo($apt) {
        $key = self::CACHE_KEY.'.'.$apt;

        $value = Cache::remember($key, 1440, function() use ($apt) {
            $client = new Client;
            $res = $client->request('GET', 'https://api-dev.aviationapi.com/v1/airports?apt='.$apt, [
                'auth' => ['aviationapi', 'aviationapi']
            ]);
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }
}
