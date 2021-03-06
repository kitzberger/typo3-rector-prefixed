<?php

namespace Typo3RectorPrefix20210423;

use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector\Contract\ParentInterfaceWithChangeTypeInterface;
use Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector\Source\ClassMetadataFactory;
use Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector\Source\ParserInterface;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector::class)->call('configure', [[\Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector::PARAMETER_TYPEHINTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration(\Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector\Contract\ParentInterfaceWithChangeTypeInterface::class, 'process', 0, new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration(\Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector\Source\ParserInterface::class, 'parse', 0, new \PHPStan\Type\StringType()), new \Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration(\Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector\Source\ClassMetadataFactory::class, 'setEntityManager', 0, new \PHPStan\Type\ObjectType('Doctrine\\ORM\\EntityManagerInterface'))])]]);
};
