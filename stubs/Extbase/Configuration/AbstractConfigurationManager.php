<?php

namespace TYPO3\CMS\Extbase\Configuration;

if (\class_exists(\TYPO3\CMS\Extbase\Configuration\AbstractConfigurationManager::class)) {
    return;
}
abstract class AbstractConfigurationManager
{
    protected abstract function getSwitchableControllerActions(string $extensionName, string $pluginName);
}
