<?php

namespace Typo3RectorPrefix20210420;

use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::class)->call('configure', [[\Rector\Renaming\Rector\Namespace_\RenameNamespaceRector::OLD_TO_NEW_NAMESPACES => ['OldNamespace' => 'NewNamespace', 'Typo3RectorPrefix20210420\\OldNamespaceWith\\OldSplitNamespace' => 'Typo3RectorPrefix20210420\\NewNamespaceWith\\NewSplitNamespace', 'Typo3RectorPrefix20210420\\Old\\Long\\AnyNamespace' => 'Typo3RectorPrefix20210420\\Short\\AnyNamespace', 'PHPUnit_Framework_' => 'PHPUnit\\Framework\\']]]);
};
