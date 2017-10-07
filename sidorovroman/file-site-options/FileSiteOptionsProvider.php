<?php

namespace SidorovRoman\FileSiteOptions;

use App;
use Illuminate\Support\ServiceProvider;
use SidorovRoman\FileSiteOptions\Repository;

class FileSiteOptionsProvider extends ServiceProvider
{
    protected $file_path = "/vendor/FSOptionsStorage/fileSiteOptions.json";
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__. '/fileSiteOptions.json' => base_path($this->file_path),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        App::singleton('fsoptions', function () {
            return new Repository($this->file_path);
        });
    }
}
