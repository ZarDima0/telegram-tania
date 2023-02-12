<?php

namespace App\Providers;

use App\Models\Poetry;
use App\MoonShine\Resources\ImageResource;
use App\MoonShine\Resources\PoetryResource;
use Illuminate\Support\ServiceProvider;
use Leeto\MoonShine\MoonShine;
use Leeto\MoonShine\Menu\MenuGroup;
use Leeto\MoonShine\Menu\MenuItem;
use Leeto\MoonShine\Resources\MoonShineUserResource;
use Leeto\MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->registerResources([
            MoonShineUserResource::class, // Системный раздел с администраторами
            MoonShineUserRoleResource::class, // Системный раздел с ролями администраторов
            PoetryResource::class, // Наш новый раздел
            ImageResource::class, // Наш новый раздел
        ]);
    }
}
