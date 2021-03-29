<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329;

use Rector\Laravel\Rector\FuncCall\HelperFuncCallToFacadeClassRector;
use Rector\Laravel\Rector\StaticCall\RequestStaticValidateToInjectRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector;
use Rector\Transform\Rector\FuncCall\FuncCallToNewRector;
use Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector;
use Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall;
use Rector\Transform\ValueObject\ArrayFuncCallToMethodCall;
use Rector\Transform\ValueObject\StaticCallToMethodCall;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
/**
 * @see https://www.freecodecamp.org/news/moving-away-from-magic-or-why-i-dont-want-to-use-laravel-anymore-2ce098c979bd/
 * @see https://tomasvotruba.com/blog/2019/03/04/how-to-turn-laravel-from-static-to-dependency-injection-in-one-day/
 * @see https://laravel.com/docs/5.7/facades#facades-vs-dependency-injection
 */
return static function (\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/laravel-array-str-functions-to-static-call.php');
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector::STATIC_CALLS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\App', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Foundation\\Application', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Artisan', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Console\\Kernel', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Auth', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Auth\\AuthManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Blade', '*', 'Typo3RectorPrefix20210329\\Illuminate\\View\\Compilers\\BladeCompiler', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Broadcast', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Broadcasting\\Factory', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Bus', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Bus\\Dispatcher', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Cache', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Cache\\CacheManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Config', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Config\\Repository', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Cookie', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Cookie\\CookieJar', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Crypt', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Encryption\\Encrypter', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\DB', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Database\\DatabaseManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Event', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Events\\Dispatcher', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\File', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Filesystem\\Filesystem', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Gate', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Auth\\Access\\Gate', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Hash', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Hashing\\Hasher', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Lang', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Translation\\Translator', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Log', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Log\\LogManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Mail', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Mail\\Mailer', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Notification', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Notifications\\ChannelManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Password', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Auth\\Passwords\\PasswordBrokerManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Queue', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Queue\\QueueManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Redirect', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Redirector', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Redis', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Redis\\RedisManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Request', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Http\\Request', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Response', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Routing\\ResponseFactory', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Route', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Schema', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Database\\Schema\\Builder', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Session', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Session\\SessionManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Storage', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Filesystem\\FilesystemManager', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\URL', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\UrlGenerator', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Validator', '*', 'Typo3RectorPrefix20210329\\Illuminate\\Validation\\Factory', '*'), new \Rector\Transform\ValueObject\StaticCallToMethodCall('Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\View', '*', 'Typo3RectorPrefix20210329\\Illuminate\\View\\Factory', '*')])]]);
    $services->set(\Rector\Laravel\Rector\StaticCall\RequestStaticValidateToInjectRector::class);
    // @see https://github.com/laravel/framework/blob/78828bc779e410e03cc6465f002b834eadf160d2/src/Illuminate/Foundation/helpers.php#L959
    // @see https://gist.github.com/barryvdh/bb6ffc5d11e0a75dba67
    $services->set(\Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::FUNCTIONS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('auth', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Auth\\Guard'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('policy', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Auth\\Access\\Gate', 'getPolicyFor'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('cookie', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Cookie\\Factory', 'make'),
        // router
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('put', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', 'put'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('get', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', 'get'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('post', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', 'post'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('patch', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', 'patch'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('delete', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', 'delete'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('resource', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Router', 'resource'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('response', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Routing\\ResponseFactory', 'make'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('info', 'Typo3RectorPrefix20210329\\Illuminate\\Log\\Writer', 'info'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('view', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\View\\Factory', 'make'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('bcrypt', 'Typo3RectorPrefix20210329\\Illuminate\\Hashing\\BcryptHasher', 'make'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('redirect', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Redirector', 'back'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('broadcast', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Broadcasting\\Factory', 'event'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('event', 'Typo3RectorPrefix20210329\\Illuminate\\Events\\Dispatcher', 'dispatch'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('dispatch', 'Typo3RectorPrefix20210329\\Illuminate\\Events\\Dispatcher', 'dispatch'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('route', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\UrlGenerator', 'route'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('asset', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\UrlGenerator', 'asset'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('url', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Routing\\UrlGenerator', 'to'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('action', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\UrlGenerator', 'action'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('trans', 'Typo3RectorPrefix20210329\\Illuminate\\Translation\\Translator', 'trans'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('trans_choice', 'Typo3RectorPrefix20210329\\Illuminate\\Translation\\Translator', 'transChoice'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('logger', 'Typo3RectorPrefix20210329\\Illuminate\\Log\\Writer', 'debug'),
        new \Rector\Transform\ValueObject\ArgumentFuncCallToMethodCall('back', 'Typo3RectorPrefix20210329\\Illuminate\\Routing\\Redirector', 'back', 'back'),
    ]), \Rector\Transform\Rector\FuncCall\ArgumentFuncCallToMethodCallRector::ARRAY_FUNCTIONS_TO_METHOD_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\ArrayFuncCallToMethodCall('config', 'Typo3RectorPrefix20210329\\Illuminate\\Contracts\\Config\\Repository', 'set', 'get'), new \Rector\Transform\ValueObject\ArrayFuncCallToMethodCall('session', 'Typo3RectorPrefix20210329\\Illuminate\\Session\\SessionManager', 'put', 'get')])]]);
    $services->set(\Rector\Transform\Rector\FuncCall\FuncCallToNewRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\FuncCallToNewRector::FUNCTIONS_TO_NEWS => ['collect' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Collection']]]);
    $services->set(\Rector\Laravel\Rector\FuncCall\HelperFuncCallToFacadeClassRector::class);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['App' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\App', 'Artisan' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Artisan', 'Auth' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Auth', 'Blade' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Blade', 'Broadcast' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Broadcast', 'Bus' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Bus', 'Cache' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Cache', 'Config' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Config', 'Cookie' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Cookie', 'Crypt' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Crypt', 'DB' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\DB', 'Date' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Date', 'Event' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Event', 'Facade' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Facade', 'File' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\File', 'Gate' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Gate', 'Hash' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Hash', 'Http' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Http', 'Lang' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Lang', 'Log' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Log', 'Mail' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Mail', 'Notification' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Notification', 'Password' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Password', 'Queue' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Queue', 'RateLimiter' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\RateLimiter', 'Redirect' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Redirect', 'Redis' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Redis', 'Request' => 'Typo3RectorPrefix20210329\\Illuminate\\Http\\Request', 'Response' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Response', 'Route' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Route', 'Schema' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Schema', 'Session' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Session', 'Storage' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Storage', 'URL' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\URL', 'Validator' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\Validator', 'View' => 'Typo3RectorPrefix20210329\\Illuminate\\Support\\Facades\\View']]]);
};
