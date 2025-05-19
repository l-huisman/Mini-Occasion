<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totVehicles = Vehicle::count();
        $totalBoughtAt = Vehicle::sum('bought_at');
        $totalAvailableAt = Vehicle::sum('available_at');

        $marginAmount = $totalAvailableAt - $totalBoughtAt;

        if ($totalBoughtAt > 0) {
            $marginPercentage = round((($totalAvailableAt - $totalBoughtAt) / $totalBoughtAt) * 100, 2);
        } else {
            $marginPercentage = 0;
        }

        return [
            Stat::make('Total Vehicles', $totVehicles),
            Stat::make('Total Bought At', '€' . number_format($totalBoughtAt, 2)),
            Stat::make('Total Available At', '€' . number_format($totalAvailableAt, 2)),
            Stat::make('Total Margin (€)', '€' . number_format($marginAmount, 2)),
            Stat::make('Total Margin (%)', $marginPercentage . '%'),
        ];
    }
}
