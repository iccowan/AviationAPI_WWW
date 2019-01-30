<?php

namespace App\Console\Commands;

use App\Chart;
use Cache;
use DB;
use Illuminate\Console\Command;

class UpdateChartOfDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Update:ChartOfTheDay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the chart of the day every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        a:
        $rand_id = rand(1, 15000);
        $chart = DB::table('charts_current')->find($rand_id);

        if(substr($chart->pdf_name, -6) == '_C.PDF') goto a;

        DB::table('www_chart')->truncate();
        $c = new Chart;
        $c->pdf_url = $chart->pdf_path;
        $c->save();

        Cache::forget('CHART.OFTHEDAY');
        Cache::forever('CHART.OFTHEDAY', $c);
    }
}
