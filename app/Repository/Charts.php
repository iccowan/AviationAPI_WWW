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
            $res = $client->request('GET', 'https://api.aviationapi.com/v1/charts?apt='.$apt.'&group=1');
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }

    public function getAFD($apt) {
        $key = self::CACHE_KEY.'.AFD.'.$apt;

        $value = Cache::remember($key, 1440, function() use ($apt) {
            $client = new Client;
            $res = $client->request('GET', 'https://api.aviationapi.com/v1/charts/afd?apt='.$apt);
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }

    public function getChartChanges($apt, $chart_name) {
        $key = self::CACHE_KEY.'.CHANGE.'.$apt.$chart_name;

        $value = Cache::remember($key, 1440, function() use ($apt, $chart_name) {
            $client = new Client;
            $res = $client->request('GET', 'https://api.aviationapi.com/v1/charts/changes?apt='.$apt.'&chart_name='.$chart_name);
            $result = json_decode($res->getBody());

            return $result;
        });

        return collect($value);
    }
}
