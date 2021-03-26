<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326\Symplify\SetConfigResolver\Tests\Bootstrap;

use Typo3RectorPrefix20210326\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210326\Symplify\SetConfigResolver\Bootstrap\InvalidSetReporter;
use Typo3RectorPrefix20210326\Symplify\SetConfigResolver\Exception\SetNotFoundException;
final class InvalidSetReporterTest extends \Typo3RectorPrefix20210326\PHPUnit\Framework\TestCase
{
    /**
     * @var InvalidSetReporter
     */
    private $invalidSetReporter;
    protected function setUp() : void
    {
        $this->invalidSetReporter = new \Typo3RectorPrefix20210326\Symplify\SetConfigResolver\Bootstrap\InvalidSetReporter();
    }
    /**
     * @doesNotPerformAssertions
     */
    public function test() : void
    {
        $setNotFoundException = new \Typo3RectorPrefix20210326\Symplify\SetConfigResolver\Exception\SetNotFoundException('not found', 'one', ['two', 'three']);
        $this->invalidSetReporter->report($setNotFoundException);
    }
}
