<?php

namespace App\Repository;

use Cache;
use GuzzleHttp\Client;

class Charts
{
    CONST CACHE_KEY = 'CHARTS';

    public function getCharts($apt) {
        $key = self::CACHE_KEY.'.'.$apt;

        $value = Cache::remember($key, 1440, function() use ($apt) {
            $client = new Client;
            $res = $client->request('GET', 'https://api-dev.aviationapi.com/v1/charts?apt='.$apt.'&group=1', [
                'auth' => ['aviationapi', 'aviationapi']
            ]);
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }
}
