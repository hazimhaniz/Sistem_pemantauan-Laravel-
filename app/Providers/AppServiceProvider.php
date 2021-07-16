<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/Global.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (strpos(env('APP_URL'), 'https://') !== false) {
            \URL::forceScheme('https');
        }

        if (Schema::hasTable('setting')) {

            config([
                'global' => Setting::all([
                    'name','value'
                ])
                ->keyBy('name') // key every setting by its name
                ->transform(function ($setting) {
                     return $setting->value; // return only the value
                })
                ->toArray() // make it an array
            ]);

        }

        Builder::macro('whereLike', function (string $attribute, string $searchTerm) {
            return $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        });

        Schema::defaultStringLength(191);
    }
}
