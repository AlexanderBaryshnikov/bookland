<?php

namespace App\Nova;

use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'description',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make(),

            Text::make('ISBN', 'isbn')
                ->rules('required', 'min:13', 'max:25'),

            Text::make(__('Name'), 'name')
                ->rules('required', 'max:255'),

            Slug::make(__('Slug'), 'slug'),

            Textarea::make(__('Description'), 'description'),

            Number::make(__('Price'), 'price')
                ->step(0.01)
                ->fillUsing(function ($request, $model, $attribute) {
                    $model->$attribute = $request->price ?: 0;
                })
                ->rules('required', 'min:0'),

            Number::make(__('Quantity'), 'quantity')
                ->rules('required', 'min:0'),

            Medialibrary::make(__('Images'), 'products')
                ->accept('image/*')
                ->attachExisting()
                ->fields(function () {
                    return [
                        ID::make(),

                        Text::make(__('Filename'), 'file_name')
                            ->rules('required', 'min:2'),

                        Textarea::make(__('Name'), 'custom_properties->title')
                            ->alwaysShow(),

                        Text::make('Media Disk')->exceptOnForms(),

                        Text::make('Media Download Url', function () {
                            return $this->resource->exists ? $this->resource->getFullUrl() : null;
                        }),

                        Text::make('Media Size')->displayUsing(function () {
                            return $this->resource->humanReadableSize;
                        })->exceptOnForms(),

                        Text::make('Media Updated At')->displayUsing(function () {
                            return $this->resource->updated_at->diffForHumans();
                        })->exceptOnForms(),
                    ];
                }),

            // TODO add relations
            // BelongsTo::make(__('Author'), 'author', Author::class),
            // BelongsTo::make(__('Publisher'), 'publisher', Publisher::class),
        ];
    }

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('ISBN', 'isbn')
                ->rules('required', 'min:13', 'max:25'),

            Text::make(__('Name'), 'name')
                ->rules('required', 'max:255')
                ->sortable(),

            Number::make(__('Price'), 'price')
                ->step(0.01)
                ->fillUsing(function ($request, $model, $attribute) {
                    $model->$attribute = $request->price ?: 0;
                })
                ->sortable(),

            Number::make(__('Quantity'), 'quantity')
                ->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public static function label()
    {
        return __('Products');
    }

    public static function singularLabel()
    {
        return __('Product');
    }
}
