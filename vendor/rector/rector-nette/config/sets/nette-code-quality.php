<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\Nette\Rector\ArrayDimFetch\AnnotateMagicalControlArrayAccessRector;
use Rector\Nette\Rector\Assign\ArrayAccessGetControlToGetComponentMethodCallRector;
use Rector\Nette\Rector\Assign\ArrayAccessSetControlToAddComponentMethodCallRector;
use Rector\Nette\Rector\Assign\MakeGetComponentAssignAnnotatedRector;
use Rector\Nette\Rector\ClassMethod\TemplateMagicAssignToExplicitVariableArrayRector;
use Rector\Nette\Rector\Identical\SubstrMinusToStringEndsWithRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Nette\Rector\ClassMethod\TemplateMagicAssignToExplicitVariableArrayRector::class);
    $services->set(\Rector\Nette\Rector\Assign\MakeGetComponentAssignAnnotatedRector::class);
    $services->set(\Rector\Nette\Rector\ArrayDimFetch\AnnotateMagicalControlArrayAccessRector::class);
    $services->set(\Rector\Nette\Rector\Assign\ArrayAccessSetControlToAddComponentMethodCallRector::class);
    $services->set(\Rector\Nette\Rector\Assign\ArrayAccessGetControlToGetComponentMethodCallRector::class);
    $services->set(\Rector\Nette\Rector\Identical\SubstrMinusToStringEndsWithRector::class);
};
