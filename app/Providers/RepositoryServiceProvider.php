<?php

namespace App\Providers;

use App\Http\Interfaces\Admin\DonationRequestInterface;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Repositories\Admin\DonationRequestRepository;
use App\Http\Repositories\EndUser\HomeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Http\Interfaces\GovernorateInterface',
            'App\Http\Repositories\GovernorateRepository',
        );


        $this->app->bind(
            'App\Http\Interfaces\CityInterface',
            'App\Http\Repositories\CityRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\ClientInterface',
            'App\Http\Repositories\ClientRepository',
        );


        $this->app->bind(
            'App\Http\Interfaces\NotificationInterface',
            'App\Http\Repositories\NotificationRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\SettingInterface',
            'App\Http\Repositories\SettingRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\CategoryInterface',
            'App\Http\Repositories\CategoryRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\ContactInterface',
            'App\Http\Repositories\ContactRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\PostInterface',
            'App\Http\Repositories\PostRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\TokenInterface',
            'App\Http\Repositories\TokenRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\BloodTypeInterface',
            'App\Http\Repositories\BloodTypeRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\DonationRequestInterface',
            'App\Http\Repositories\DonationRequestRepository',
        );
        

        $this->app->bind(
            'App\Http\Interfaces\Admin\HomeInterface',
            'App\Http\Repositories\Admin\HomeRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\GovernorateInterface',
            'App\Http\Repositories\Admin\GovernorateRepository',
        );
        
        $this->app->bind(
            'App\Http\Interfaces\Admin\CityInterface',
            'App\Http\Repositories\Admin\CityRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\CategoryInterface',
            'App\Http\Repositories\Admin\CategoryRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\PostInterface',
            'App\Http\Repositories\Admin\PostRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\SettingInterface',
            'App\Http\Repositories\Admin\SettingRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\RoleInterface',
            'App\Http\Repositories\Admin\RoleRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\UserInterface',
            'App\Http\Repositories\Admin\UserRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\ClientInterface',
            'App\Http\Repositories\Admin\ClientRepository',
        );

        
        $this->app->bind(
            'App\Http\Interfaces\Admin\ContactInterface',
            'App\Http\Repositories\Admin\ContactRepository',
        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\RegisterInterface',
            'App\Http\Repositories\EndUser\RegisterRepository',
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\AuthInterface',
            'App\Http\Repositories\EndUser\AuthRepository',
        );
        $this->app->bind(
           HomeInterface::class,
           HomeRepository::class
        );
        $this->app->bind(
            DonationRequestInterface::class,
            DonationRequestRepository::class
         );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
