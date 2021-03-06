<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\AutowireArrayParameter\Tests\Source;

use Typo3RectorPrefix20210423\Symplify\AutowireArrayParameter\Tests\Source\Contract\FirstCollectedInterface;
use Typo3RectorPrefix20210423\Symplify\AutowireArrayParameter\Tests\Source\Contract\SecondCollectedInterface;
final class ArrayShapeCollector
{
    /**
     * @var array<FirstCollectedInterface>
     */
    private $firstCollected = [];
    /**
     * @var array<SecondCollectedInterface>
     */
    private $secondCollected = [];
    /**
     * @param array<FirstCollectedInterface> $firstCollected
     * @param array<SecondCollectedInterface> $secondCollected
     */
    public function __construct(array $firstCollected, array $secondCollected)
    {
        $this->firstCollected = $firstCollected;
        $this->secondCollected = $secondCollected;
    }
    /**
     * @return array<FirstCollectedInterface>
     */
    public function getFirstCollected() : array
    {
        return $this->firstCollected;
    }
    /**
     * @return array<SecondCollectedInterface>
     */
    public function getSecondCollected() : array
    {
        return $this->secondCollected;
    }
}
