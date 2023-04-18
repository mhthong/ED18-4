<?php

namespace App\Http\Controllers;

use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class AnalyticsController extends Controller
{

public function __construct(Analytics $analytics)
{
    $this->analytics = $analytics;
}

// code
public function Analytics_index(Analytics $analytics)
{
    $period = Period::create(Carbon::now()->subMonth(), Carbon::now());
    $data = $this->analytics->performQuery(
        $period,
        'ga:pageviews'
    );
}

}
