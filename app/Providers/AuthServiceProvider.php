<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
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
        //
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('create-posts', function ($user) {
           return $user->role == 'admin' || $user->role == 'creator'; 
        });

        Gate::define('creator', function ($user) {
            return $user->role == 'creator';
        });

        Gate::define('edit-post', function (User $user, Post $post) {
            return $user->role == 'admin' || $user->id == $post->user_id;
        });
    }
}
