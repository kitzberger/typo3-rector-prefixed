<?php

declare (strict_types=1);
namespace Rector\CakePHP;

/**
 * @inspired https://github.com/cakephp/upgrade/blob/756410c8b7d5aff9daec3fa1fe750a3858d422ac/src/Shell/Task/AppUsesTask.php
 */
final class ImplicitNameResolver
{
    /**
     * A map of old => new for use statements that are missing
     *
     * @var string[]
     */
    private const IMPLICIT_MAP = [
        'App' => 'Typo3RectorPrefix20210317\\Cake\\Core\\App',
        'AppController' => 'Typo3RectorPrefix20210317\\App\\Controller\\AppController',
        'AppHelper' => 'Typo3RectorPrefix20210317\\App\\View\\Helper\\AppHelper',
        'AppModel' => 'Typo3RectorPrefix20210317\\App\\Model\\AppModel',
        'Cache' => 'Typo3RectorPrefix20210317\\Cake\\Cache\\Cache',
        'CakeEventListener' => 'Typo3RectorPrefix20210317\\Cake\\Event\\EventListener',
        'CakeLog' => 'Typo3RectorPrefix20210317\\Cake\\Log\\Log',
        'CakePlugin' => 'Typo3RectorPrefix20210317\\Cake\\Core\\Plugin',
        'CakeTestCase' => 'Typo3RectorPrefix20210317\\Cake\\TestSuite\\TestCase',
        'CakeTestFixture' => 'Typo3RectorPrefix20210317\\Cake\\TestSuite\\Fixture\\TestFixture',
        'Component' => 'Typo3RectorPrefix20210317\\Cake\\Controller\\Component',
        'ComponentRegistry' => 'Typo3RectorPrefix20210317\\Cake\\Controller\\ComponentRegistry',
        'Configure' => 'Typo3RectorPrefix20210317\\Cake\\Core\\Configure',
        'ConnectionManager' => 'Typo3RectorPrefix20210317\\Cake\\Database\\ConnectionManager',
        'Controller' => 'Typo3RectorPrefix20210317\\Cake\\Controller\\Controller',
        'Debugger' => 'Typo3RectorPrefix20210317\\Cake\\Error\\Debugger',
        'ExceptionRenderer' => 'Typo3RectorPrefix20210317\\Cake\\Error\\ExceptionRenderer',
        'Helper' => 'Typo3RectorPrefix20210317\\Cake\\View\\Helper',
        'HelperRegistry' => 'Typo3RectorPrefix20210317\\Cake\\View\\HelperRegistry',
        'Inflector' => 'Typo3RectorPrefix20210317\\Cake\\Utility\\Inflector',
        'Model' => 'Typo3RectorPrefix20210317\\Cake\\Model\\Model',
        'ModelBehavior' => 'Typo3RectorPrefix20210317\\Cake\\Model\\Behavior',
        'Object' => 'Typo3RectorPrefix20210317\\Cake\\Core\\Object',
        'Router' => 'Typo3RectorPrefix20210317\\Cake\\Routing\\Router',
        'Shell' => 'Typo3RectorPrefix20210317\\Cake\\Console\\Shell',
        'View' => 'Typo3RectorPrefix20210317\\Cake\\View\\View',
        // Also apply to already renamed ones
        'Log' => 'Typo3RectorPrefix20210317\\Cake\\Log\\Log',
        'Plugin' => 'Typo3RectorPrefix20210317\\Cake\\Core\\Plugin',
        'TestCase' => 'Typo3RectorPrefix20210317\\Cake\\TestSuite\\TestCase',
        'TestFixture' => 'Typo3RectorPrefix20210317\\Cake\\TestSuite\\Fixture\\TestFixture',
    ];
    /**
     * This value used to be directory
     * So "/" in path should be "\" in namespace
     */
    public function resolve(string $shortClass) : ?string
    {
        return self::IMPLICIT_MAP[$shortClass] ?? null;
    }
}
