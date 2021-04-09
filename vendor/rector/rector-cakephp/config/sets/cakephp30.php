<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Rector\CakePHP\Rector\FileWithoutNamespace\ImplicitShortClassNameUseStatementRector;
use Rector\CakePHP\Rector\Namespace_\AppUsesStaticCallToUseStatementRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    # @see https://github.com/cakephp/upgrade/tree/master/src/Shell/Task
    $services->set(\Rector\CakePHP\Rector\Namespace_\AppUsesStaticCallToUseStatementRector::class);
    $services->set(\Rector\CakePHP\Rector\FileWithoutNamespace\ImplicitShortClassNameUseStatementRector::class);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # see https://github.com/cakephp/upgrade/blob/756410c8b7d5aff9daec3fa1fe750a3858d422ac/src/Shell/Task/RenameClassesTask.php#L37
        'Typo3RectorPrefix20210409\\Cake\\Network\\Http\\HttpSocket' => 'Typo3RectorPrefix20210409\\Cake\\Network\\Http\\Client',
        'Typo3RectorPrefix20210409\\Cake\\Model\\ConnectionManager' => 'Typo3RectorPrefix20210409\\Cake\\Database\\ConnectionManager',
        'Typo3RectorPrefix20210409\\Cake\\TestSuite\\CakeTestCase' => 'Typo3RectorPrefix20210409\\Cake\\TestSuite\\TestCase',
        'Typo3RectorPrefix20210409\\Cake\\TestSuite\\Fixture\\CakeTestFixture' => 'Typo3RectorPrefix20210409\\Cake\\TestSuite\\Fixture\\TestFixture',
        'Typo3RectorPrefix20210409\\Cake\\Utility\\String' => 'Typo3RectorPrefix20210409\\Cake\\Utility\\Text',
        'CakePlugin' => 'Plugin',
        'CakeException' => 'Exception',
        # see https://book.cakephp.org/3/en/appendices/3-0-migration-guide.html#configure
        'Typo3RectorPrefix20210409\\Cake\\Configure\\PhpReader' => 'Typo3RectorPrefix20210409\\Cake\\Core\\Configure\\EnginePhpConfig',
        'Typo3RectorPrefix20210409\\Cake\\Configure\\IniReader' => 'Typo3RectorPrefix20210409\\Cake\\Core\\Configure\\EngineIniConfig',
        'Typo3RectorPrefix20210409\\Cake\\Configure\\ConfigReaderInterface' => 'Typo3RectorPrefix20210409\\Cake\\Core\\Configure\\ConfigEngineInterface',
        # https://book.cakephp.org/3/en/appendices/3-0-migration-guide.html#request
        'CakeRequest' => 'Typo3RectorPrefix20210409\\Cake\\Network\\Request',
    ]]]);
};
