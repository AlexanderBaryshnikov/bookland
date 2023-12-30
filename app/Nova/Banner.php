<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Banner extends Resource
{
    public static $model = \App\Models\Banner::class;

    public static $title = 'id';

    public static $search = [
        'title',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Title'), 'title')
                ->rules('required', 'min:3', 'max:255')
                ->sortable(),

            Boolean::make(__('Published'), 'published')
                ->default(0),

            BelongsTo::make(__('Product'), 'product', Product::class)
                ->searchable(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }

    public static function label()
    {
        return __('Banners');
    }

    public static function singularLabel()
    {
        return __('Banner');
    }
}
