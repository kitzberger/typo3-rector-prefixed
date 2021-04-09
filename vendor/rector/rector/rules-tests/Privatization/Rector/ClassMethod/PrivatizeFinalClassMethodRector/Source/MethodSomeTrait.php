<?php

declare (strict_types=1);
namespace Rector\Tests\Privatization\Rector\ClassMethod\PrivatizeFinalClassMethodRector\Source;

trait MethodSomeTrait
{
    protected abstract function configureRoutes();
    public function run()
    {
        $this->configureRoutes();
    }
}
