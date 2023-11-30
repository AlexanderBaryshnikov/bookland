<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Category extends Resource
{
    public static $model = \App\Models\Category::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Name'), 'name')
                ->rules('required', 'max:255')
                ->creationRules('unique:categories'),

            Slug::make(__('Slug'), 'slug'),

            Boolean::make(__('Is subcategory'), 'is_subcategory')
                ->trueValue(1)
                ->falseValue(0)
                ->fillUsing(function ($request, $model, $attribute) {
                    $model->{$attribute} = !is_null($request->parent);
                    if (empty($model->{$attribute})) {
                        $model->parent_id = null;
                    }
                }),

            BelongsTo::make(__('Category'), 'parent', self::class)
                ->readonly()
                ->dependsOn(
                    ['is_subcategory'],
                    function (BelongsTo $field, NovaRequest $request, FormData $formData) {
                        if ($formData->is_subcategory) {
                            $field->readonly(false)->rules(['required']);
                        } else {
                            $field->setValue(null);
                        }
                    }
                )
                ->nullable(),

            HasMany::make(__('Child resources'), 'children', self::class)
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
        return __('Categories');
    }

    public static function singularLabel()
    {
        return __('Category');
    }
}
