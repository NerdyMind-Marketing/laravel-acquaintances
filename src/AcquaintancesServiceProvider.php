<?php


namespace Multicaret\Acquaintances;

use Illuminate\Support\ServiceProvider;
use Multicaret\Acquaintances\Observers\FriendshipGroupObserver;
use Multicaret\Acquaintances\Observers\FriendshipObserver;
use Multicaret\Acquaintances\Observers\InteractionRelationObserver;
use Multicaret\Acquaintances\Models\FriendFriendshipGroups;
use Multicaret\Acquaintances\Models\Friendship;
use Multicaret\Acquaintances\Models\InteractionRelation;

class AcquaintancesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        Friendship::observe(new FriendshipObserver());
        FriendFriendshipGroups::observe(new FriendshipGroupObserver());
        InteractionRelation::observe(new InteractionRelationObserver());
    }

    /**
     * Register Acquaintances's migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if (count(\File::glob(database_path('migrations/*acquaintances*.php'))) === 0) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->offerPublishing();
    }

    /**
     * Setup the configuration for Acquaintances.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/acquaintances.php', 'acquaintances'
        );
    }

    /**
     * Setup the resource publishing groups for Acquaintances.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/acquaintances.php' => config_path('acquaintances.php'),
            ], 'acquaintances-config');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'acquaintances-migrations');
        }
    }
}
