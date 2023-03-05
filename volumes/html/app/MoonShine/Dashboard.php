<?php

namespace App\MoonShine;

use App\Models\User;
use Leeto\MoonShine\Dashboard\DashboardBlock;
use Leeto\MoonShine\Dashboard\DashboardScreen;
use Leeto\MoonShine\Metrics\ValueMetric;

class Dashboard extends DashboardScreen
{
	public function blocks(): array
	{
		return [
            DashboardBlock::make([
                ValueMetric::make('Пользователей')
                    ->value(User::query()->count())
            ])
        ];
	}
}
