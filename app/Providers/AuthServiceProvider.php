<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('manage_post', function ($user) {
            return $user->hasAnyPermission([
                'post_show',
                'post_create',
                'post_update',
                'post_detail',
                'post_delete'
            ]);
        });
        Gate::define('manage_categories', function ($user) {
            return $user->hasAnyPermission([
                'category_show',
                'category_create',
                'category_update',
                'category_detail',
                'category_delete'
            ]);
        });
        Gate::define('manage_tags', function ($user) {
            return $user->hasAnyPermission([
                'tag_show',
                'tag_create',
                'tag_update',
                'tag_delete'
            ]);
        });
        Gate::define('manage_users', function ($user) {
            return $user->hasAnyPermission([
                'user_show',
                'user_create',
                'user_update',
                'user_detail',
                'user_delete'
            ]);
        });
        Gate::define('manage_roles', function ($user) {
            return $user->hasAnyPermission([
                'role_show',
                'role_create',
                'role_update',
                'role_detail',
                'role_delete'
            ]);
        });
    }
}
