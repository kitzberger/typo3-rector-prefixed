<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210311\Symplify\SetConfigResolver\Contract;

use Typo3RectorPrefix20210311\Symplify\SetConfigResolver\ValueObject\Set;
interface SetProviderInterface
{
    /**
     * @return Set[]
     */
    public function provide() : array;
    /**
     * @return string[]
     */
    public function provideSetNames() : array;
    public function provideByName(string $setName) : ?\Typo3RectorPrefix20210311\Symplify\SetConfigResolver\ValueObject\Set;
}
