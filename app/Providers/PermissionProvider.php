<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class PermissionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasrole', function ($user_name) {
            if ($user = Admin::findOrFail(Auth::user()->id)) {
                if ($user->hasRoles($user_name)) {
                    return true;
                } else {
                    return false;
                }
            }
        });
    }
}
