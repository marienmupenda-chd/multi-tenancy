<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();

        // \Laravel\Passport\Passport::routes(null, ['middleware' => 'tenancy.enforce']);

        $this->commands([
            \Laravel\Passport\Console\InstallCommand::class,
            \Laravel\Passport\Console\ClientCommand::class,
            \Laravel\Passport\Console\KeysCommand::class,
        ]);

        \Laravel\Passport\Passport::tokensExpireIn(\Carbon\Carbon::now()->addMinutes(10));
        \Laravel\Passport\Passport::refreshTokensExpireIn(\Carbon\Carbon::now()->addDays(1));


    }
}
