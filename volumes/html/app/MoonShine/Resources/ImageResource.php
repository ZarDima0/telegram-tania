<?php

namespace App\MoonShine\Resources;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Fields\Image as ImageMake;
use Leeto\MoonShine\Fields\SwitchBoolean;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Actions\FiltersAction;

class ImageResource extends Resource
{
	public static string $model = Image::class;

	public static string $title = 'Картинки';

	public function fields(): array
	{
		return [
            ID::make()->sortable(),
            ImageMake::make('Картинка', 'path')
                ->dir('/') // Директория где будут хранится файлы в storage (по умолчанию /)
                ->disk('public') // filesystems disk
                ->allowedExtensions(['jpg', 'gif', 'png']),
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
