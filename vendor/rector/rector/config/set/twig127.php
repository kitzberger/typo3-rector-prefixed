<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210323;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Twig_Node', 'getLine', 'getTemplateLine'), new \Rector\Renaming\ValueObject\MethodCallRename('Twig_Node', 'getFilename', 'getTemplateName'), new \Rector\Renaming\ValueObject\MethodCallRename('Twig_Template', 'getSource', 'getSourceContext'), new \Rector\Renaming\ValueObject\MethodCallRename('Twig_Error', 'getTemplateFile', 'getTemplateName'), new \Rector\Renaming\ValueObject\MethodCallRename('Twig_Error', 'getTemplateName', 'setTemplateName')])]]);
};
