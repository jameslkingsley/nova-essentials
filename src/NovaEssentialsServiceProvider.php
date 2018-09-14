<?php

namespace Kingsley\NovaEssentials;

use Laravel\Nova\Nova;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class NovaEssentialsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCases();
        $this->registerJson();
    }

    /**
     * Registers the JSON macros.
     *
     * @return void
     */
    public function registerJson()
    {
        Code::macro('jsonFromObject', function () {
            return $this->json()->resolveUsing(function ($value) {
                return json_encode((array) $value, JSON_PRETTY_PRINT);
            });
        });
    }

    /**
     * Register the text case macros.
     *
     * @return void
     */
    public function registerCases()
    {
        foreach (['camel_case', 'kebab_case', 'snake_case', 'studly_case', 'title_case'] as $method) {
            Field::macro(camel_case($method), function () use ($method) {
                return $this->displayUsing(function ($value) use ($method) {
                    return $method($value);
                });
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
