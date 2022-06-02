<?php

namespace Morningtrain\Deployment;

use Morningtrain\Deployment\Exceptions\DeploymentFileNotFoundException;

class Deployment
{
    public Version $version;

    public function __construct()
    {
        $filePath = config('deployment.file');

        if (! file_exists($filePath)) {
            throw new DeploymentFileNotFoundException("The file `{$filePath}` does not exist.");
        }

        $content = file_get_contents(config('deployment.file'));
        $parsed = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        $this->version = new Version(
            username: $this->checkForEmptyValues($parsed['username']),
            version: $this->checkForEmptyValues($parsed['version']),
            repository: $this->checkForEmptyValues($parsed['repository']),
            revision: $this->checkForEmptyValues($parsed['revision']),
        );
    }

    public function get(): Version
    {
        return $this->version;
    }

    public function username(): ?string
    {
        return $this->version->username;
    }

    public function version(): ?string
    {
        return $this->version->version;
    }

    public function repository(): ?string
    {
        return $this->version->repository;
    }

    public function revision(): ?string
    {
        return $this->version->revision;
    }

    protected function checkForEmptyValues(string $value): ?string
    {
        if (empty($value)) {
            return null;
        }

        return $value;
    }
}
