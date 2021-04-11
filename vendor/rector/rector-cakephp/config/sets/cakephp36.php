<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector;
use Rector\Transform\ValueObject\PropertyFetchToMethodCall;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    # source: https://book.cakephp.org/3.0/en/appendices/3-6-migration-guide.html
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210411\\Cake\\ORM\\Table', 'association', 'getAssociation'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210411\\Cake\\Validation\\ValidationSet', 'isPresenceRequired', 'requirePresence'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210411\\Cake\\Validation\\ValidationSet', 'isEmptyAllowed', 'allowEmpty')])]]);
    $services->set(\Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector::PROPERTIES_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\PropertyFetchToMethodCall('Typo3RectorPrefix20210411\\Cake\\Controller\\Controller', 'name', 'getName', 'setName'), new \Rector\Transform\ValueObject\PropertyFetchToMethodCall('Typo3RectorPrefix20210411\\Cake\\Controller\\Controller', 'plugin', 'getPlugin', 'setPlugin'), new \Rector\Transform\ValueObject\PropertyFetchToMethodCall('Typo3RectorPrefix20210411\\Cake\\Form\\Form', 'validator', 'getValidator', 'setValidator')])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210411\\Cake\\Cache\\Engine\\ApcEngine' => 'Typo3RectorPrefix20210411\\Cake\\Cache\\Engine\\ApcuEngine', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\BadRequestException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\BadRequestException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\ConflictException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\ConflictException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\ForbiddenException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\ForbiddenException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\GoneException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\GoneException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\HttpException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\HttpException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\InternalErrorException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\InternalErrorException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\InvalidCsrfTokenException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\InvalidCsrfTokenException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\MethodNotAllowedException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\MethodNotAllowedException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\NotAcceptableException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\NotAcceptableException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\NotFoundException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\NotFoundException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\NotImplementedException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\NotImplementedException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\ServiceUnavailableException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\ServiceUnavailableException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\UnauthorizedException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\UnauthorizedException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Exception\\UnavailableForLegalReasonsException' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Exception\\UnavailableForLegalReasonsException', 'Typo3RectorPrefix20210411\\Cake\\Network\\Session' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Session', 'Typo3RectorPrefix20210411\\Cake\\Network\\Session\\DatabaseSession' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Session\\DatabaseSession', 'Typo3RectorPrefix20210411\\Cake\\Network\\Session\\CacheSession' => 'Typo3RectorPrefix20210411\\Cake\\Http\\Session\\CacheSession', 'Typo3RectorPrefix20210411\\Cake\\Network\\CorsBuilder' => 'Typo3RectorPrefix20210411\\Cake\\Http\\CorsBuilder', 'Typo3RectorPrefix20210411\\Cake\\View\\Widget\\WidgetRegistry' => 'Typo3RectorPrefix20210411\\Cake\\View\\Widget\\WidgetLocator']]]);
};
