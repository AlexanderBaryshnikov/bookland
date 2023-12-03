<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;

class Comment extends Resource
{
    public static $model = \App\Models\Comment::class;

    public static $title = 'id';

    public static $search = [
        'text',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            NovaTinyMCE::make(__('Text'), 'text')
                ->rules('required', 'min:2', 'max:500'),

            MorphTo::make(__('Type'), 'Commentable')->types([
                Product::class,
            ]),

            BelongsTo::make(__('Author'), 'user', User::class)
                ->searchable(),

            Boolean::make(__('Published'), 'published')
                ->trueValue(1)
                ->falseValue(0)
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
        return __('Comments');
    }

    public static function singularLabel()
    {
        return __('Comment');
    }
}
