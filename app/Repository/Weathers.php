<?php

namespace App\Repository;

use Cache;
use GuzzleHttp\Client;

class Weathers
{
    CONST CACHE_KEY = 'WEATHERS';

    public function getMetar($apt) {
        $key = self::CACHE_KEY.'.METAR.'.$apt;

        $value = Cache::remember($key, 5, function() use ($apt) {
            $client = new Client(['exceptions' => false]);
            $res = $client->request('GET', 'https://api-dev.aviationapi.com/v1/weather/metar?apt='.$apt, [
                'auth' => ['aviationapi', 'aviationapi']
            ]);
            $status = $res->getStatusCode();
            if($status == 200) {
                $result = json_decode($res->getBody());
            } else {
                $result = null;
            }

            return $result;
        });

        return collect($value);
    }

    public function getTaf($apt) {
        $key = self::CACHE_KEY.'.TAF.'.$apt;

        $value = Cache::remember($key, 120, function() use ($apt) {
            $client = new Client(['exceptions' => false]);
            $res = $client->request('GET', 'https://api-dev.aviationapi.com/v1/weather/taf?apt='.$apt, [
                'auth' => ['aviationapi', 'aviationapi']
            ]);
            $status = $res->getStatusCode();
            if($status == 200) {
                $result = json_decode($res->getBody());
            } else {
                $result = null;
            }

            return $result;
        });

        return collect($value);
    }
}
