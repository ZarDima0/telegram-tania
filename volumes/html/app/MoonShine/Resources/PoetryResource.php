<?php

namespace App\MoonShine\Resources;

use App\Models\Poetry;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Fields\SwitchBoolean;
use Leeto\MoonShine\Fields\Textarea;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Actions\FiltersAction;
use Leeto\MoonShine\Fields\Checkbox;

class PoetryResource extends Resource
{
    public static string $model = Poetry::class;

    public static string $title = 'Стихи';
    public static string $subTitle = 'Управление стихами';

    public function fields(): array
    {
        return [
            ID::make(),
            Textarea::make('Тут должен быть стих','poetry'),
            SwitchBoolean::make('Отправлено', 'is_send')
                ->onValue(1)
                ->offValue(0)
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
