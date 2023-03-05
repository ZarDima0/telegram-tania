<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Fields\SwitchBoolean;
use Leeto\MoonShine\Fields\Text;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Actions\FiltersAction;

class TelegramUserResource extends Resource
{
    public static string $model = 'App\Models\TelegramUser';

    public static string $title = 'TelegramUsers';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('ID Telegram', 'user_id')->sortable(),
            Text::make('first_name', 'first_name')->sortable(),
            SwitchBoolean::make('Уведомления', 'is_notifications')
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
