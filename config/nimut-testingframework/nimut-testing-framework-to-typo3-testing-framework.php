<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228;

use Nimut\TestingFramework\Exception\Exception as NimutException;
use Nimut\TestingFramework\MockObject\AccessibleMockObjectInterface as NimutAccessibleMockObjectInterface;
use Nimut\TestingFramework\TestCase\FunctionalTestCase as NimutFunctionalTestCase;
use Nimut\TestingFramework\TestCase\UnitTestCase as NimutUnitTestCase;
use Nimut\TestingFramework\TestCase\ViewHelperBaseTestcase as NimutViewHelperBaseTestcase;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Exception;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3\TestingFramework\Fluid\Unit\ViewHelpers\ViewHelperBaseTestcase;
return static function (\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set('nimut_testing_framework_to_typo3_testing_framework')->class(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [\Nimut\TestingFramework\TestCase\UnitTestCase::class => \TYPO3\TestingFramework\Core\Unit\UnitTestCase::class, \Nimut\TestingFramework\TestCase\FunctionalTestCase::class => \TYPO3\TestingFramework\Core\Functional\FunctionalTestCase::class, \Nimut\TestingFramework\TestCase\ViewHelperBaseTestcase::class => \TYPO3\TestingFramework\Fluid\Unit\ViewHelpers\ViewHelperBaseTestcase::class, \Nimut\TestingFramework\MockObject\AccessibleMockObjectInterface::class => \TYPO3\TestingFramework\Core\AccessibleObjectInterface::class, \Nimut\TestingFramework\Exception\Exception::class => \TYPO3\TestingFramework\Core\Exception::class]]]);
};
