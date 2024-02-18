<?php

namespace App\Http\Controllers;

use App\Models\User;
use SaKanjo\EasyMetrics\Enums\GrowthRateType;
use SaKanjo\EasyMetrics\Metrics\Trend;

class MetricsController
{
    public function __invoke()
    {
        $history = Trend::make(User::class)
            ->withGrowthRate()
            ->growthRateType(GrowthRateType::Value)
            ->range(6)
            ->ranges([6])
            ->countByMonths();

        return [
            'users' => User::count(),
            'usersLast30Days' => User::where('created_at', '>', now()->subDays(30)->endOfDay())->count(),
            'history' => [
                'data' => $history->getData(),
                'labels' => $history->getLabels()
            ]
        ];
    }
}
