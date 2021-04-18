<?php

namespace Typo3RectorPrefix20210418;

use Rector\Tests\Transform\Rector\New_\NewToStaticCallRector\Source\FromNewClass;
use Rector\Tests\Transform\Rector\New_\NewToStaticCallRector\Source\IntoStaticClass;
use Rector\Transform\Rector\New_\NewToStaticCallRector;
use Rector\Transform\ValueObject\NewToStaticCall;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\New_\NewToStaticCallRector::class)->call('configure', [[\Rector\Transform\Rector\New_\NewToStaticCallRector::TYPE_TO_STATIC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\NewToStaticCall(\Rector\Tests\Transform\Rector\New_\NewToStaticCallRector\Source\FromNewClass::class, \Rector\Tests\Transform\Rector\New_\NewToStaticCallRector\Source\IntoStaticClass::class, 'run')])]]);
};
