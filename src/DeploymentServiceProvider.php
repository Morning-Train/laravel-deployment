<?php

namespace Morningtrain\Deployment;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DeploymentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('deployment')
            ->hasConfigFile('deployment');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton('deployment', Deployment::class);
    }
}
