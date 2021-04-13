<?php

declare (strict_types=1);
namespace Rector\Tests\Defluent\Rector\MethodCall\InArgChainFluentMethodCallToStandaloneMethodCallRectorTest\Source;

use Typo3RectorPrefix20210413\Nette\Utils\DateTime;
final class SetGetDateTime
{
    /**
     * @var DateTime|null
     */
    private $dateMin = null;
    public function setDateMin(?\Typo3RectorPrefix20210413\Nette\Utils\DateTime $dateTime = null)
    {
        $this->dateMin = $dateTime;
    }
    public function getDateMin() : ?\Typo3RectorPrefix20210413\Nette\Utils\DateTime
    {
        return $this->dateMin;
    }
}
