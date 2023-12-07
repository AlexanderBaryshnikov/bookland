<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Property extends Resource
{
    public static $model = \App\Models\Property::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Name'), 'name')
                ->rules('required', 'min:2', 'max:255'),

            BelongsToMany::make(__('Products'), 'products', Product::class)
                ->fields(function () {
                    return [
                        Text::make(__('Value'), 'value')
                            ->rules('required', 'max:1000'),
                    ];
                }),

            // TODO: сделать читабельный просмотр свойств у товара через глаз
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
        return __('Properties');
    }

    public static function singularLabel()
    {
        return __('Property');
    }
}
