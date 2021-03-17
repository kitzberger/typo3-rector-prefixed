<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317;

use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\UnionType;
use Rector\Composer\Rector\ChangePackageVersionComposerRector;
use Rector\Composer\Rector\RemovePackageComposerRector;
use Rector\Composer\ValueObject\PackageAndVersion;
use Rector\Nette\Rector\MethodCall\ContextGetByTypeToConstructorInjectionRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Rector\Transform\Rector\Assign\DimFetchAssignToMethodCallRector;
use Rector\Transform\Rector\MethodCall\CallableInMethodCallToVariableRector;
use Rector\Transform\ValueObject\CallableInMethodCallToVariable;
use Rector\Transform\ValueObject\DimFetchAssignToMethodCall;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration;
use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\MethodCall\CallableInMethodCallToVariableRector::class)->call('configure', [[
        // see https://github.com/nette/caching/commit/5ffe263752af5ccf3866a28305e7b2669ab4da82
        \Rector\Transform\Rector\MethodCall\CallableInMethodCallToVariableRector::CALLABLE_IN_METHOD_CALL_TO_VARIABLE => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\CallableInMethodCallToVariable('Typo3RectorPrefix20210317\\Nette\\Caching\\Cache', 'save', 1)]),
    ]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        'Typo3RectorPrefix20210317\\Nette\\Bridges\\ApplicationLatte\\Template' => 'Typo3RectorPrefix20210317\\Nette\\Bridges\\ApplicationLatte\\DefaultTemplate',
        // https://github.com/nette/application/compare/v3.0.7...v3.1.0
        'Typo3RectorPrefix20210317\\Nette\\Application\\IRouter' => 'Typo3RectorPrefix20210317\\Nette\\Routing\\Router',
        'Typo3RectorPrefix20210317\\Nette\\Application\\IResponse' => 'Typo3RectorPrefix20210317\\Nette\\Application\\Response',
        'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\IRenderable' => 'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\Renderable',
        'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\ISignalReceiver' => 'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\SignalReceiver',
        'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\IStatePersistent' => 'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\StatePersistent',
        'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\ITemplate' => 'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\Template',
        'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\ITemplateFactory' => 'Typo3RectorPrefix20210317\\Nette\\Application\\UI\\TemplateFactory',
        'Typo3RectorPrefix20210317\\Nette\\Bridges\\ApplicationLatte\\ILatteFactory' => 'Typo3RectorPrefix20210317\\Nette\\Bridges\\ApplicationLatte\\LatteFactory',
        // https://github.com/nette/bootstrap/compare/v3.0.2...v3.1.0
        'Typo3RectorPrefix20210317\\Nette\\Configurator' => 'Typo3RectorPrefix20210317\\Nette\\Bootstrap\\Configurator',
        // https://github.com/nette/caching/compare/v3.0.2...v3.1.0
        'Typo3RectorPrefix20210317\\Nette\\Caching\\IBulkReader' => 'Typo3RectorPrefix20210317\\Nette\\Caching\\BulkReader',
        'Typo3RectorPrefix20210317\\Nette\\Caching\\IStorage' => 'Typo3RectorPrefix20210317\\Nette\\Caching\\Storage',
        'Typo3RectorPrefix20210317\\Nette\\Caching\\Storages\\IJournal' => 'Typo3RectorPrefix20210317\\Nette\\Caching\\Storages\\Journal',
        // https://github.com/nette/database/compare/v3.0.7...v3.1.1
        'Typo3RectorPrefix20210317\\Nette\\Database\\ISupplementalDriver' => 'Typo3RectorPrefix20210317\\Nette\\Database\\Driver',
        'Typo3RectorPrefix20210317\\Nette\\Database\\IConventions' => 'Typo3RectorPrefix20210317\\Nette\\Database\\Conventions',
        'Typo3RectorPrefix20210317\\Nette\\Database\\Context' => 'Typo3RectorPrefix20210317\\Nette\\Database\\Explorer',
        'Typo3RectorPrefix20210317\\Nette\\Database\\IRow' => 'Typo3RectorPrefix20210317\\Nette\\Database\\Row',
        'Typo3RectorPrefix20210317\\Nette\\Database\\IRowContainer' => 'Typo3RectorPrefix20210317\\Nette\\Database\\ResultSet',
        'Typo3RectorPrefix20210317\\Nette\\Database\\Table\\IRow' => 'Typo3RectorPrefix20210317\\Nette\\Database\\Table\\ActiveRow',
        'Typo3RectorPrefix20210317\\Nette\\Database\\Table\\IRowContainer' => 'Typo3RectorPrefix20210317\\Nette\\Database\\Table\\Selection',
        // https://github.com/nette/forms/compare/v3.0.7...v3.1.0-RC2
        'Typo3RectorPrefix20210317\\Nette\\Forms\\IControl' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Control',
        'Typo3RectorPrefix20210317\\Nette\\Forms\\IFormRenderer' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\FormRenderer',
        'Typo3RectorPrefix20210317\\Nette\\Forms\\ISubmitterControl' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\SubmitterControl',
        // https://github.com/nette/mail/compare/v3.0.1...v3.1.5
        'Typo3RectorPrefix20210317\\Nette\\Mail\\IMailer' => 'Typo3RectorPrefix20210317\\Nette\\Mail\\Mailer',
        // https://github.com/nette/security/compare/v3.0.5...v3.1.2
        'Typo3RectorPrefix20210317\\Nette\\Security\\IAuthorizator' => 'Typo3RectorPrefix20210317\\Nette\\Security\\Authorizator',
        'Typo3RectorPrefix20210317\\Nette\\Security\\Identity' => 'Typo3RectorPrefix20210317\\Nette\\Security\\SimpleIdentity',
        'Typo3RectorPrefix20210317\\Nette\\Security\\IResource' => 'Typo3RectorPrefix20210317\\Nette\\Security\\Resource',
        'Typo3RectorPrefix20210317\\Nette\\Security\\IRole' => 'Typo3RectorPrefix20210317\\Nette\\Security\\Role',
        // https://github.com/nette/utils/compare/v3.1.4...v3.2.1
        'Typo3RectorPrefix20210317\\Nette\\Utils\\IHtmlString' => 'Typo3RectorPrefix20210317\\Nette\\HtmlStringable',
        'Typo3RectorPrefix20210317\\Nette\\Localization\\ITranslator' => 'Typo3RectorPrefix20210317\\Nette\\Localization\\Translator',
        // https://github.com/nette/latte/compare/v2.5.5...v2.9.2
        'Typo3RectorPrefix20210317\\Latte\\ILoader' => 'Typo3RectorPrefix20210317\\Latte\\Loader',
        'Typo3RectorPrefix20210317\\Latte\\IMacro' => 'Typo3RectorPrefix20210317\\Latte\\Macro',
        'Typo3RectorPrefix20210317\\Latte\\Runtime\\IHtmlString' => 'Typo3RectorPrefix20210317\\Latte\\Runtime\\HtmlStringable',
        'Typo3RectorPrefix20210317\\Latte\\Runtime\\ISnippetBridge' => 'Typo3RectorPrefix20210317\\Latte\\Runtime\\SnippetBridge',
    ]]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // https://github.com/nette/caching/commit/60281abf366c4ab76e9436dc1bfe2e402db18b67
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210317\\Nette\\Caching\\Cache', 'start', 'capture'),
        // https://github.com/nette/forms/commit/faaaf8b8fd3408a274a9de7ca3f342091010ad5d
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210317\\Nette\\Forms\\Container', 'addImage', 'addImageButton'),
        // https://github.com/nette/utils/commit/d0427c1811462dbb6c503143eabe5478b26685f7
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210317\\Nette\\Utils\\Arrays', 'searchKey', 'getKeyOffset'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210317\\Nette\\Configurator', 'addParameters', 'addStaticParameters'),
    ])]]);
    $services->set(\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // https://github.com/nette/utils/commit/8a4b795acd00f3f6754c28a73a7e776b60350c34
        new \Rector\Renaming\ValueObject\RenameStaticMethod('Typo3RectorPrefix20210317\\Nette\\Utils\\Callback', 'closure', 'Closure', 'fromCallable'),
    ])]]);
    $services->set(\Rector\Transform\Rector\Assign\DimFetchAssignToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\Assign\DimFetchAssignToMethodCallRector::DIM_FETCH_ASSIGN_TO_METHOD_CALL => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\DimFetchAssignToMethodCall('Typo3RectorPrefix20210317\\Nette\\Application\\Routers\\RouteList', 'Typo3RectorPrefix20210317\\Nette\\Application\\Routers\\Route', 'addRoute')])]]);
    $services->set(\Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector::class)->call('configure', [[\Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector::PARAMETER_TYPEHINTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration('Typo3RectorPrefix20210317\\Nette\\Application\\UI\\Presenter', 'sendTemplate', 0, new \PHPStan\Type\UnionType([new \PHPStan\Type\ObjectType('Typo3RectorPrefix20210317\\Nette\\Application\\UI\\Template'), new \PHPStan\Type\NullType()]))])]]);
    $services->set(\Rector\Nette\Rector\MethodCall\ContextGetByTypeToConstructorInjectionRector::class);
    $services->set(\Rector\Composer\Rector\ChangePackageVersionComposerRector::class)->call('configure', [[\Rector\Composer\Rector\ChangePackageVersionComposerRector::PACKAGES_AND_VERSIONS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // meta package
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/nette', '^3.1'),
        // https://github.com/nette/nette/blob/v3.0.0/composer.json vs https://github.com/nette/nette/blob/v3.1.0/composer.json
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/application', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/bootstrap', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/caching', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/database', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/di', '^3.0'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/finder', '^2.5'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/forms', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/http', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/mail', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/php-generator', '^3.5'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/robot-loader', '^3.3'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/safe-stream', '^2.4'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/security', '^3.1'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/tokenizer', '^3.0'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nette/utils', '^3.2'),
        new \Rector\Composer\ValueObject\PackageAndVersion('latte/latte', '^2.9'),
        new \Rector\Composer\ValueObject\PackageAndVersion('tracy/tracy', '^2.8'),
        // contributte
        new \Rector\Composer\ValueObject\PackageAndVersion('contributte/console', '^0.9'),
        new \Rector\Composer\ValueObject\PackageAndVersion('contributte/event-dispatcher', '^0.8'),
        new \Rector\Composer\ValueObject\PackageAndVersion('contributte/event-dispatcher-extra', '^0.8'),
        // nettrine
        new \Rector\Composer\ValueObject\PackageAndVersion('nettrine/annotations', '^0.7'),
        new \Rector\Composer\ValueObject\PackageAndVersion('nettrine/cache', '^0.3'),
    ])]]);
    $services->set(\Rector\Composer\Rector\RemovePackageComposerRector::class)->call('configure', [[\Rector\Composer\Rector\RemovePackageComposerRector::PACKAGE_NAMES => ['nette/component-model', 'nette/neon']]]);
};
