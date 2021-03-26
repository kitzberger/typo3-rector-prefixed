<?php

declare (strict_types=1);
namespace Rector\RectorPhp71\Tests\Finalize;

use Typo3RectorPrefix20210326\PHPUnit\Framework\TestCase;
final class FinalizeTest extends \Typo3RectorPrefix20210326\PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider getFiles
     */
    public function testRectoredFileEquals($rectoredFile, $expectedFile) : void
    {
        $this->assertFileEquals($rectoredFile, $expectedFile);
    }
    public function getFiles() : array
    {
        $files = \glob(__DIR__ . '/Fixture/Source/*.php');
        return \array_map(function ($file) {
            return [$file, __DIR__ . '/Fixture/Expected/' . \basename($file)];
        }, $files);
    }
}
