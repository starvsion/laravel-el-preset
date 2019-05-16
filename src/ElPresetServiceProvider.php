<?php
namespace LaravelFrontendPresets\ElPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class ElPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('element-ui', function ($command) {
            ElementUiPreset::install(false);
            $command->info('Element UI scaffolding installed successfully.');
            $command->comment('Please run "yarn install && yarn run dev" to compile your fresh scaffolding.');
        });

        PresetCommand::macro('element-ui-auth', function ($command) { //optional
            ElementUiPreset::install(true);
            $command->info('Element UI scaffolding with Auth views installed successfully.');
            $command->comment('Please run "yarn install && yarn run dev" to compile your fresh scaffolding.');
        });
    }
}
