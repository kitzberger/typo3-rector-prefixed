<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210323;

use Rector\Renaming\Rector\ConstFetch\RenameConstantRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
# https://docs.phalcon.io/4.0/en/upgrade#general-notes
return static function (\Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    # for class renames is better - https://docs.phalcon.io/4.0/en/upgrade#cheat-sheet
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\Resource' => 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\Component', 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\ResourceInterface' => 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\ComponentInterface', 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\ResourceAware' => 'Typo3RectorPrefix20210323\\Phalcon\\Acl\\ComponentAware', 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\ResourceInterface' => 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\AssetInterface', 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\MessageInterface' => 'Typo3RectorPrefix20210323\\Phalcon\\Messages\\MessageInterface', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\MessageInterface' => 'Typo3RectorPrefix20210323\\Phalcon\\Messages\\MessageInterface', 'Typo3RectorPrefix20210323\\Phalcon\\Annotations\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Annotations\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Annotations\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Annotations\\AnnotationsFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Application' => 'Typo3RectorPrefix20210323\\Phalcon\\Application\\AbstractApplication', 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\Resource' => 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\Asset', 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\Resource\\Css' => 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\Asset\\Css', 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\Resource\\Js' => 'Typo3RectorPrefix20210323\\Phalcon\\Assets\\Asset\\Js', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\AdapterFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend\\Apcu' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Adapter\\Apcu', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend\\File' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Adapter\\Stream', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend\\Libmemcached' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Adapter\\Libmemcached', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend\\Memory' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Adapter\\Memory', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Backend\\Redis' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Adapter\\Redis', 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Exception' => 'Typo3RectorPrefix20210323\\Phalcon\\Cache\\Exception\\Exception', 'Typo3RectorPrefix20210323\\Phalcon\\Config\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Config\\ConfigFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Db' => 'Typo3RectorPrefix20210323\\Phalcon\\Db\\AbstractDb', 'Typo3RectorPrefix20210323\\Phalcon\\Db\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Db\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Db\\Adapter\\Pdo' => 'Typo3RectorPrefix20210323\\Phalcon\\Db\\Adapter\\Pdo\\AbstractPdo', 'Typo3RectorPrefix20210323\\Phalcon\\Db\\Adapter\\Pdo\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Db\\Adapter\\PdoFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Dispatcher' => 'Typo3RectorPrefix20210323\\Phalcon\\Dispatcher\\AbstractDispatcher', 'Typo3RectorPrefix20210323\\Phalcon\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Factory\\AbstractFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Flash' => 'Typo3RectorPrefix20210323\\Phalcon\\Flash\\AbstractFlash', 'Typo3RectorPrefix20210323\\Phalcon\\Forms\\Element' => 'Typo3RectorPrefix20210323\\Phalcon\\Forms\\Element\\AbstractElement', 'Typo3RectorPrefix20210323\\Phalcon\\Image\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Image\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Image\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Image\\ImageFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Adapter\\Blackhole' => 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Adapter\\Noop', 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Adapter\\File' => 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Adapter\\Stream', 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\LoggerFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Formatter' => 'Typo3RectorPrefix20210323\\Phalcon\\Logger\\Formatter\\AbstractFormatter', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Collection' => 'Typo3RectorPrefix20210323\\Phalcon\\Collection', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Collection\\Exception' => 'Typo3RectorPrefix20210323\\Phalcon\\Collection\\Exception', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Message' => 'Typo3RectorPrefix20210323\\Phalcon\\Messages\\Message', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\MetaData\\Files' => 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\MetaData\\Stream', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Email' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\Email', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Exclusionin' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\ExclusionIn', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Inclusionin' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\InclusionIn', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Ip' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\Ip', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Numericality' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\Numericality', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\PresenceOf' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\PresenceOf', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Regex' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\Regex', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\StringLength' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\StringLength', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Uniqueness' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\Uniqueness', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Validator\\Url' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator\\Url', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Url' => 'Typo3RectorPrefix20210323\\Phalcon\\Url', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Url\\Exception' => 'Typo3RectorPrefix20210323\\Phalcon\\Url\\Exception', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\User\\Component' => 'Typo3RectorPrefix20210323\\Phalcon\\Di\\Injectable', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\User\\Module' => 'Typo3RectorPrefix20210323\\Phalcon\\Di\\Injectable', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\User\\Plugin' => 'Typo3RectorPrefix20210323\\Phalcon\\Di\\Injectable', 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\View\\Engine' => 'Typo3RectorPrefix20210323\\Phalcon\\Mvc\\View\\Engine\\AbstractEngine', 'Typo3RectorPrefix20210323\\Phalcon\\Paginator\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Paginator\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Paginator\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Paginator\\PaginatorFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Session\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Session\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Session\\Adapter\\Files' => 'Typo3RectorPrefix20210323\\Phalcon\\Session\\Adapter\\Stream', 'Typo3RectorPrefix20210323\\Phalcon\\Session\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Session\\Manager', 'Typo3RectorPrefix20210323\\Phalcon\\Translate\\Adapter' => 'Typo3RectorPrefix20210323\\Phalcon\\Translate\\Adapter\\AbstractAdapter', 'Typo3RectorPrefix20210323\\Phalcon\\Translate\\Factory' => 'Typo3RectorPrefix20210323\\Phalcon\\Translate\\TranslateFactory', 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\CombinedFieldsValidator' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\AbstractCombinedFieldsValidator', 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Message' => 'Typo3RectorPrefix20210323\\Phalcon\\Messages\\Message', 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Message\\Group' => 'Typo3RectorPrefix20210323\\Phalcon\\Messages\\Messages', 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\Validator' => 'Typo3RectorPrefix20210323\\Phalcon\\Validation\\AbstractValidator', 'Typo3RectorPrefix20210323\\Phalcon\\Text' => 'Typo3RectorPrefix20210323\\Phalcon\\Helper\\Str', 'Typo3RectorPrefix20210323\\Phalcon\\Session\\AdapterInterface' => 'SessionHandlerInterface']]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\AdapterInterface', 'isResource', 'isComponent'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\AdapterInterface', 'addResource', 'addComponent'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\AdapterInterface', 'addResourceAccess', 'addComponentAccess'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\AdapterInterface', 'dropResourceAccess', 'dropComponentAccess'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\AdapterInterface', 'getActiveResource', 'getActiveComponent'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\AdapterInterface', 'getResources', 'getComponents'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter\\Memory', 'isResource', 'isComponent'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter\\Memory', 'addResource', 'addComponent'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter\\Memory', 'addResourceAccess', 'addComponentAccess'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter\\Memory', 'dropResourceAccess', 'dropComponentAccess'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Acl\\Adapter\\Memory', 'getResources', 'getComponents'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Cli\\Console', 'addModules', 'registerModules'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Dispatcher', 'setModelBinding', 'setModelBinder'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Assets\\Manager', 'addResource', 'addAsset'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Assets\\Manager', 'addResourceByType', 'addAssetByType'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Assets\\Manager', 'collectionResourcesByType', 'collectionAssetsByType'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Http\\RequestInterface', 'isSecureRequest', 'isSecure'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Http\\RequestInterface', 'isSoapRequested', 'isSoap'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Paginator', 'getPaginate', 'paginate'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210323\\Phalcon\\Mvc\\Model\\Criteria', 'order', 'orderBy')])]]);
    $services->set(\Rector\Renaming\Rector\ConstFetch\RenameConstantRector::class)->call('configure', [[\Rector\Renaming\Rector\ConstFetch\RenameConstantRector::OLD_TO_NEW_CONSTANTS => ['FILTER_SPECIAL_CHARS' => 'FILTER_SPECIAL', 'FILTER_ALPHANUM' => 'FILTER_ALNUM']]]);
};
