<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\String_\StringToClassConstantRector;
use Rector\Transform\ValueObject\StringToClassConstant;
use Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
# see: https://laravel.com/docs/5.4/upgrade
return static function (\Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\String_\StringToClassConstantRector::class)->call('configure', [[\Rector\Transform\Rector\String_\StringToClassConstantRector::STRINGS_TO_CLASS_CONSTANTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\StringToClassConstant('kernel.handled', 'Typo3RectorPrefix20210330\\Illuminate\\Foundation\\Http\\Events\\RequestHandled', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('locale.changed', 'Typo3RectorPrefix20210330\\Illuminate\\Foundation\\Events\\LocaleUpdated', 'class'), new \Rector\Transform\ValueObject\StringToClassConstant('illuminate.log', 'Typo3RectorPrefix20210330\\Illuminate\\Log\\Events\\MessageLogged', 'class')])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210330\\Illuminate\\Console\\AppNamespaceDetectorTrait' => 'Typo3RectorPrefix20210330\\Illuminate\\Console\\DetectsApplicationNamespace', 'Typo3RectorPrefix20210330\\Illuminate\\Http\\Exception\\HttpResponseException' => 'Typo3RectorPrefix20210330\\Illuminate\\Http\\Exceptions\\HttpResponseException', 'Typo3RectorPrefix20210330\\Illuminate\\Http\\Exception\\PostTooLargeException' => 'Typo3RectorPrefix20210330\\Illuminate\\Http\\Exceptions\\PostTooLargeException', 'Typo3RectorPrefix20210330\\Illuminate\\Foundation\\Http\\Middleware\\VerifyPostSize' => 'Typo3RectorPrefix20210330\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize', 'Typo3RectorPrefix20210330\\Symfony\\Component\\HttpFoundation\\Session\\SessionInterface' => 'Typo3RectorPrefix20210330\\Illuminate\\Contracts\\Session\\Session']]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Support\\Collection', 'every', 'nth'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany', 'setJoin', 'performJoin'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany', 'getRelatedIds', 'allRelatedIds'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Routing\\Router', 'middleware', 'aliasMiddleware'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Routing\\Route', 'getPath', 'uri'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Routing\\Route', 'getUri', 'uri'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Routing\\Route', 'getMethods', 'methods'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Routing\\Route', 'getParameter', 'parameter'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Contracts\\Session\\Session', 'set', 'put'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Contracts\\Session\\Session', 'getToken', 'token'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Support\\Facades\\Request', 'setSession', 'setLaravelSession'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Http\\Request', 'setSession', 'setLaravelSession'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Routing\\UrlGenerator', 'forceSchema', 'forceScheme'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Validation\\Validator', 'addError', 'addFailure'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210330\\Illuminate\\Validation\\Validator', 'doReplacements', 'makeReplacements')])]]);
};
