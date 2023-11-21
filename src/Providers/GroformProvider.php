<?php

namespace Gromatics\Groform\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class GroformProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'groform');
        $this->loadViewComponentsAs('', $this->viewComponents());

        $this->publishes([
            __DIR__.'/../views/groform/' => resource_path('views/groform/')
        ], 'groform-views');

        $this->publishes([
            __DIR__.'/../groforms/' => resource_path('groforms/')
        ], 'groform-forms');
    }

    protected function viewComponents(): array
    {
        return [
            \Gromatics\Groform\View\Components\Groform::class
        ];
    }
}
