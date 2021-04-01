<?php

declare (strict_types=1);
namespace Rector\NetteToSymfony\Tests\Rector\ClassMethod\RouterListToControllerAnnotationsRector\Source;

use Typo3RectorPrefix20210401\Nette\Application\Routers\Route;
final class RouteFactory
{
    public static function get(string $path, string $presenterClass) : \Typo3RectorPrefix20210401\Nette\Application\Routers\Route
    {
        return new \Typo3RectorPrefix20210401\Nette\Application\Routers\Route($path, $presenterClass);
    }
}
