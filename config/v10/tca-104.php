<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408;

use Ssch\TYPO3Rector\Rector\v10\v0\RemoveSeliconFieldPathRector;
use Ssch\TYPO3Rector\Rector\v10\v0\RemoveTcaOptionSetToDefaultOnCopyRector;
use Ssch\TYPO3Rector\Rector\v10\v3\RemoveExcludeOnTransOrigPointerFieldRector;
use Ssch\TYPO3Rector\Rector\v10\v3\RemoveShowRecordFieldListInsideInterfaceSectionRector;
use Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210408\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RemoveSeliconFieldPathRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v0\RemoveTcaOptionSetToDefaultOnCopyRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v3\RemoveExcludeOnTransOrigPointerFieldRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v3\RemoveShowRecordFieldListInsideInterfaceSectionRector::class);
};
