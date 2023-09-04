<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $usersData = User::selectRaw('DATE_FORMAT(created_at, "%M") as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();
    
        $months = $usersData->pluck('month')->toArray();
        $userCounts = $usersData->pluck('count')->toArray();
    
        return $this->chart->lineChart()
            ->setTitle('Users Multilink', '#0057ff')
            ->setSubtitle('Number of users each month')
            ->addData('Users', $userCounts)
            ->setXAxis($months)
            ->setColors(['#0057ff']);
    }
    
}
