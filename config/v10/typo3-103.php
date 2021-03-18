<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Ssch\TYPO3Rector\Rector\v10\v3\SubstituteResourceFactoryRector;
use Ssch\TYPO3Rector\Rector\v10\v3\UseClassTypo3VersionRector;
use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
use TYPO3\CMS\Extbase\Mvc\Request;
use TYPO3\CMS\Extbase\Mvc\Response;
use TYPO3\CMS\Extbase\Mvc\Web\Request as WebRequest;
use TYPO3\CMS\Extbase\Mvc\Web\Response as WebResponse;
use TYPO3\CMS\Linkvalidator\Repository\BrokenLinkRepository;
return static function (\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../services.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v3\UseClassTypo3VersionRector::class);
    $services->set('rename_broken_link_repository_number_of_broken_links_to_is_link_target_broken_link')->class(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename(\TYPO3\CMS\Linkvalidator\Repository\BrokenLinkRepository::class, 'getNumberOfBrokenLinks', 'isLinkTargetBrokenLink')])]]);
    $services->set(\Ssch\TYPO3Rector\Rector\v10\v3\SubstituteResourceFactoryRector::class);
    $services->set('web_request_to_request_web_response_to_response')->class(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [\TYPO3\CMS\Extbase\Mvc\Web\Request::class => \TYPO3\CMS\Extbase\Mvc\Request::class, \TYPO3\CMS\Extbase\Mvc\Web\Response::class => \TYPO3\CMS\Extbase\Mvc\Response::class]]]);
};
