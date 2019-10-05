<?php

namespace Sweetmancc\DatabaseTrigger;

use Illuminate\Support\ServiceProvider;
use Sweetmancc\DatabaseTrigger\Schema\MySqlBuilder;
use Sweetmancc\DatabaseTrigger\Command\TriggerMakeCommand;

class TriggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TriggerMakeCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->singleton('trigger-builder', function () {
            return new MySqlBuilder(app('db.connection'));
        });
    }
}
