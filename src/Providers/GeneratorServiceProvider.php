<?php

namespace Cwfan\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the provided services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the provided services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Cwfan\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Cwfan\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Cwfan\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Cwfan\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Cwfan\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Cwfan\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Cwfan\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Cwfan\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Cwfan\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Cwfan\Modules\Console\Generators\MakeTestCommand::class,
            'command.make.module.job'        => \Cwfan\Modules\Console\Generators\MakeJobCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
