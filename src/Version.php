<?php

namespace Morningtrain\Deployment;

class Version
{
    public function __construct(
        public ?string $username,
        public ?string $version,
        public ?string $repository,
        public ?string $revision,
    )
    {
    }
}
