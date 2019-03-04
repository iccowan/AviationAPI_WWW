<?php

namespace App\Repository;

use Cache;
use GuzzleHttp\Client;

class Vatsim
{
    CONST CACHE_KEY = 'VATSIM';

    public function getPilots($apt) {
        $key = self::CACHE_KEY.'.PILOTS.'.$apt;

        $value = Cache::remember($key, 60, function() use ($apt) {
            $client = new Client;
            $res = $client->request('GET', 'https://api.aviationapi.com/v1/vatsim/pilots?apt='.$apt);
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }

    public function getControllers($fac) {
        $key = self::CACHE_KEY.'.CONTROLLERS.'.$fac;

        $value = Cache::remember($key, 60, function() use ($fac) {
            $client = new Client;
            $res = $client->request('GET', 'https://api.aviationapi.com/v1/vatsim/controllers?fac='.$fac.'_');
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }
}
