<?php

use Morningtrain\Deployment\Exceptions\DeploymentFileNotFoundException;
use Morningtrain\Deployment\Facades\Deployment;
use Morningtrain\Deployment\Version;

test('if no file found it throws an exception', function () {
    config()->set('deployment.file', 'missing-deployment-file.json');

    $filePath = config('deployment.file');
    $exceptionMessage = "The file `{$filePath}` does not exist.";

    expect(fn() => new \Morningtrain\Deployment\Deployment())
        ->toThrow(DeploymentFileNotFoundException::class, $exceptionMessage);
});

test('if deployment file is not specified it returns null-something', function () {
    config()->set('deployment.file');

    expect(Deployment::get())->toMatchObject(new Version(
        username: null,
        version: null,
        repository: null,
        revision: null
    ));
});

it('can retrieve version data from deployment.json file', function () {
    config()->set('deployment.file', __DIR__ . '/deployment.json');

    expect(Deployment::get())->toMatchObject(new Version(
        username: 'User Name',
        version: 'v1.4.0',
        repository: 'http://url-to.repository',
        revision: '6b375f68f1f5yc0d9d14a81479a48b781f09t2f5'
    ));
});

it('version data is null if no data in deployment.json file', function () {
    config()->set('deployment.file', __DIR__ . '/deployment_null.json');

    expect(Deployment::get())->toMatchObject(new Version(
        username: null,
        version: null,
        repository: null,
        revision: null
    ));
});

it('can retrieve specific data from deployment.json file', function ($specificData, $value) {
    config()->set('deployment.file', __DIR__ . '/deployment.json');

    expect(Deployment::$specificData())->toBe($value);
})->with([
    ['username', 'User Name'],
    ['version', 'v1.4.0'],
    ['repository', 'http://url-to.repository'],
    ['revision', '6b375f68f1f5yc0d9d14a81479a48b781f09t2f5'],
]);

it('returns null if no data from deployment.json file', function ($specificData) {
    config()->set('deployment.file', __DIR__ . '/deployment_null.json');

    expect(Deployment::$specificData())->toBeNull();
})->with([
    'version',
    'username',
    'repository',
    'revision',
]);
