<?php

declare (strict_types=1);
namespace Rector\Tests\NetteToSymfony\Rector\ClassMethod\RouterListToControllerAnnotationsRector\Source;

use Typo3RectorPrefix20210409\Nette\Application\Routers\Route;
final class RouteFactory
{
    public static function get(string $path, string $presenterClass) : \Typo3RectorPrefix20210409\Nette\Application\Routers\Route
    {
        return new \Typo3RectorPrefix20210409\Nette\Application\Routers\Route($path, $presenterClass);
    }
}
