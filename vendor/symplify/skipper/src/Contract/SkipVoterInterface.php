<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326\Symplify\Skipper\Contract;

use Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo;
interface SkipVoterInterface
{
    /**
     * @param string|object $element
     */
    public function match($element) : bool;
    /**
     * @param string|object $element
     */
    public function shouldSkip($element, \Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool;
}
