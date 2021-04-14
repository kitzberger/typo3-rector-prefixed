<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

use PHPStan\Type\VoidType;
use Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector\Source\PHPUnitTestCase;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector::class)->call('configure', [[\Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector::METHOD_RETURN_TYPES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration(\Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector\Source\PHPUnitTestCase::class, 'tearDown', new \PHPStan\Type\VoidType())])]]);
};
