<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Transform\Rector\String_\StringToClassConstantRector;
use Rector\Transform\ValueObject\StringToClassConstant;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
# see: https://laravel.com/docs/5.2/upgrade
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210324\\Illuminate\\Auth\\Access\\UnauthorizedException' => 'Typo3RectorPrefix20210324\\Illuminate\\Auth\\Access\\AuthorizationException', 'Typo3RectorPrefix20210324\\Illuminate\\Http\\Exception\\HttpResponseException' => 'Typo3RectorPrefix20210324\\Illuminate\\Foundation\\Validation\\ValidationException', 'Typo3RectorPrefix20210324\\Illuminate\\Foundation\\Composer' => 'Typo3RectorPrefix20210324\\Illuminate\\Support\\Composer']]]);
    $services->set(\Rector\Transform\Rector\String_\StringToClassConstantRector::class)->call('configure', [[\Rector\Transform\Rector\String_\StringToClassConstantRector::STRINGS_TO_CLASS_CONSTANTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\StringToClassConstant('artisan.start', 'Typo3RectorPrefix20210324\\Illuminate\\Console\\Events\\ArtisanStarting', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('auth.attempting', 'Typo3RectorPrefix20210324\\Illuminate\\Auth\\Events\\Attempting', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('auth.login', 'Typo3RectorPrefix20210324\\Illuminate\\Auth\\Events\\Login', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('auth.logout', 'Typo3RectorPrefix20210324\\Illuminate\\Auth\\Events\\Logout', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('cache.missed', 'Typo3RectorPrefix20210324\\Illuminate\\Cache\\Events\\CacheMissed', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('cache.hit', 'Typo3RectorPrefix20210324\\Illuminate\\Cache\\Events\\CacheHit', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('cache.write', 'Typo3RectorPrefix20210324\\Illuminate\\Cache\\Events\\KeyWritten', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('cache.delete', 'Typo3RectorPrefix20210324\\Illuminate\\Cache\\Events\\KeyForgotten', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('illuminate.query', 'Typo3RectorPrefix20210324\\Illuminate\\Database\\Events\\QueryExecuted', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('illuminate.queue.before', 'Typo3RectorPrefix20210324\\Illuminate\\Queue\\Events\\JobProcessing', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('illuminate.queue.after', 'Typo3RectorPrefix20210324\\Illuminate\\Queue\\Events\\JobProcessed', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('illuminate.queue.failed', 'Typo3RectorPrefix20210324\\Illuminate\\Queue\\Events\\JobFailed', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('illuminate.queue.stopping', 'Typo3RectorPrefix20210324\\Illuminate\\Queue\\Events\\WorkerStopping', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('mailer.sending', 'Typo3RectorPrefix20210324\\Illuminate\\Mail\\Events\\MessageSending', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('router.matched', 'Typo3RectorPrefix20210324\\Illuminate\\Routing\\Events\\RouteMatched', 'class')])]]);
};
