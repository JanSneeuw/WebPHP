<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\PickUp;
use App\Models\User;
use App\Policies\PackagePolicy;
use App\Policies\PickUpPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Package::class => PackagePolicy::class,
        Pickup::class => PickupPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
