<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302;

use ApacheSolrForTypo3\Solr\System\Solr\Document\Document;
use ApacheSolrForTypo3\Solr\System\Solr\ResponseAdapter;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Ssch\TYPO3Rector\Rector\Extensions\solr\ApacheSolrDocumentToSolariumDocumentRector;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\Extensions\solr\ApacheSolrDocumentToSolariumDocumentRector::class);
    $services->set('apache_solr_to_solarium_classes')->class(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [\Typo3RectorPrefix20210302\Apache_Solr_Document::class => \ApacheSolrForTypo3\Solr\System\Solr\Document\Document::class, \Typo3RectorPrefix20210302\Apache_Solr_Response::class => \ApacheSolrForTypo3\Solr\System\Solr\ResponseAdapter::class]]]);
};
