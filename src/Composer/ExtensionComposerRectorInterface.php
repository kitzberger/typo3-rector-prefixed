<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Composer;

use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\Contract\Rector\RectorInterface;
use Typo3RectorPrefix20210414\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
interface ExtensionComposerRectorInterface extends \Rector\Core\Contract\Rector\RectorInterface, \Rector\Core\Contract\Rector\ConfigurableRectorInterface
{
    public function refactor(\Typo3RectorPrefix20210414\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson) : void;
}
