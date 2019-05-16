<?php

namespace LaravelFrontendPresets\ElPreset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class ElementUiPreset extends Preset
{
    /**
     * Install the preset.
     *
     * @param bool $withAuth
     *
     * @return void
     */
    public static function install ($withAuth = false)
    {
        static::updatePackages();
        static::updateSass();
        static::updateBootstrapping();

        static::addAuthTemplates(); // optional
        static::updateWelcomePage(); //optional

        static::copyVueComponent();
        //static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param array $packages
     *
     * @return array
     */
    protected static function updatePackageArray (array $packages)
    {
        // packages to add to the package.json
        $packagesToAdd = [
            "element-ui" => "^2.8.2",
            "vue"        => "^2.6.10",
            "vue-router" => "^3.0.6",
        ];
        // packages to remove from the package.json
        $packagesToRemove = ['bootstrap', 'jquery', 'popper.js'];

        return $packagesToAdd + Arr::except($packages, $packagesToRemove);
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass ()
    {
        // clean up all the files in the sass folder
        $orphan_sass_files = glob(resource_path('/sass/*.*'));

        foreach ($orphan_sass_files as $sass_file) {
            (new Filesystem)->delete($sass_file);
        }
        // copy files from the stubs folder
        copy(__DIR__ . '/laravel-el-preset/resources/sass/app.scss', resource_path('sass/app.scss'));

        copy(__DIR__ . '/laravel-el-preset/resources/sass/element-ui.scss',
            resource_path('sass/element-ui.scss'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping ()
    {
        // remove exisiting bootstrap.js file
        (new Filesystem)->delete(
            resource_path('assets/js/bootstrap.js')
        );

        // copy a new bootstrap.js file from your stubs folder
        copy(__DIR__ . '/laravel-el-preset/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
    }

     /**
     * Update the Vue components.
     *
     * @return void
     */
    protected static function copyVueComponent ()
    {
          (new Filesystem)->copyDirectory(__DIR__ . '/laravel-el-preset/resources/js/components', resource_path('js/components'));
    }

    /**
     * Update the default welcome page file.
     *
     * @return void
     */
    protected static function updateWelcomePage ()
    {
        // remove default welcome page
        (new Filesystem)->delete(
            resource_path('views/welcome.blade.php')
        );

        // copy new one from your stubs folder
        copy(__DIR__ . '/laravel-el-preset/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    /**
     * Copy Auth view templates.
     *
     * @return void
     */
    protected static function addAuthTemplates ()
    {
        // Add Home controller
        copy(__DIR__ . '/laravel-el-preset/Controllers/HomeController.php',
            app_path('Http/Controllers/HomeController.php'));

        // Add Auth routes in 'routes/web.php'
        $auth_route_entry = "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\nRoute::fallback(function(){return redirect('/');});";
        file_put_contents('./routes/web.php', $auth_route_entry, FILE_APPEND);

        // Copy Skeleton auth views from the stubs folder
        (new Filesystem)->copyDirectory(__DIR__ . '/laravel-el-preset/resources/views', resource_path('views'));
    }
}
