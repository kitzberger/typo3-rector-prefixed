<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\EasyTesting\Tests\PHPUnit\Behavior\DirectoryAssertableTrait;

use Typo3RectorPrefix20210423\PHPUnit\Framework\ExpectationFailedException;
use Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\PHPUnit\Behavior\DirectoryAssertableTrait;
use Throwable;
final class DirectoryAssertableTraitTest extends \Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase
{
    use DirectoryAssertableTrait;
    public function testSuccess() : void
    {
        $this->assertDirectoryEquals(__DIR__ . '/Fixture/first_directory', __DIR__ . '/Fixture/second_directory');
    }
    public function testFail() : void
    {
        $throwable = null;
        try {
            $this->assertDirectoryEquals(__DIR__ . '/Fixture/first_directory', __DIR__ . '/Fixture/third_directory');
        } catch (\Throwable $throwable) {
        } finally {
            $this->assertInstanceOf(\Typo3RectorPrefix20210423\PHPUnit\Framework\ExpectationFailedException::class, $throwable);
        }
    }
}
