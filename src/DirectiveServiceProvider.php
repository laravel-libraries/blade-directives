<?php
namespace LaraLibs\BladeDirectives;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../blade_directives.php', 'blade_directives.php'
        );

        foreach (config('blade_directives') as $class) {

            $instance = (new $class);

            Blade::directive
                (
                    $instance->getName(),
                    function ($expression) use ($instance) {
                        return $instance->handle($expression);
                    }
                )
            ;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
    }
}
