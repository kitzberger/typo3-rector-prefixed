<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Processor;

use Rector\Core\Contract\Processor\NonPhpFileProcessorInterface;
interface ConfigurableProcessorInterface extends \Rector\Core\Contract\Processor\NonPhpFileProcessorInterface
{
    /**
     * @param mixed[] $configuration
     */
    public function configure(array $configuration) : void;
}
