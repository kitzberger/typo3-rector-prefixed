<?php

declare (strict_types=1);
namespace Rector\Nette\Naming;

use Typo3RectorPrefix20210410\Nette\Utils\Strings;
use Typo3RectorPrefix20210410\Stringy\Stringy;
final class NetteControlNaming
{
    public function createVariableName(string $shortName) : string
    {
        $stringy = new \Typo3RectorPrefix20210410\Stringy\Stringy($shortName);
        $variableName = (string) $stringy->camelize();
        if (\Typo3RectorPrefix20210410\Nette\Utils\Strings::endsWith($variableName, 'Form')) {
            return $variableName;
        }
        return $variableName . 'Control';
    }
    public function createCreateComponentClassMethodName(string $shortName) : string
    {
        $stringy = new \Typo3RectorPrefix20210410\Stringy\Stringy($shortName);
        $componentName = (string) $stringy->upperCamelize();
        return 'createComponent' . $componentName;
    }
}
