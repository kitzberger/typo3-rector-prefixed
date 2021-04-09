<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Ssch\TYPO3Rector\Rector\v10\v2\ExcludeServiceKeysToArrayRector;
use Ssch\TYPO3Rector\Rector\v10\v2\InjectEnvironmentServiceIfNeededInResponseRector;
use Ssch\TYPO3Rector\Rector\v10\v2\MoveApplicationContextToEnvironmentApiRector;
use Ssch\TYPO3Rector\Rector\v10\v2\UseActionControllerRector;
use Ssch\TYPO3Rector\Rector\v10\v2\UseTypo3InformationForCopyRightNoticeRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v2\MoveApplicationContextToEnvironmentApiRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v2\ExcludeServiceKeysToArrayRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v2\UseActionControllerRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v2\UseTypo3InformationForCopyRightNoticeRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v2\InjectEnvironmentServiceIfNeededInResponseRector::class);
};
