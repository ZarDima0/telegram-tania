<?php

namespace app\MoonShine\Resources;

use App\Models\DefaultMessage;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Fields\Image as ImageMake;
use Leeto\MoonShine\Fields\SwitchBoolean;
use Leeto\MoonShine\Fields\Text;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Actions\FiltersAction;

class DefaultMessageResource extends Resource
{
    public static string $model = DefaultMessage::class;

    public static string $title = 'Ответы';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('code', 'code')->sortable(),
            Text::make('Сообщение', 'message')->sortable(),
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
