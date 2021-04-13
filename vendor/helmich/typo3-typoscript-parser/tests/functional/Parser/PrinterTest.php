<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tests\Functional\Parser;

use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Printer\PrettyPrinter;
use Typo3RectorPrefix20210413\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210413\Symfony\Component\Console\Output\BufferedOutput;
class PrinterTest extends \Typo3RectorPrefix20210413\PHPUnit\Framework\TestCase
{
    /** @var ASTPrinterInterface */
    private $printer;
    public function setUp() : void
    {
        $this->printer = new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Printer\PrettyPrinter();
    }
    public function dataForPrinterTest()
    {
        $files = \glob(__DIR__ . '/Fixtures/*/*.typoscript');
        $testCases = [];
        foreach ($files as $outputFile) {
            $astFile = \str_replace('.typoscript', '.php', $outputFile);
            /** @noinspection PhpIncludeInspection */
            $ast = (include $astFile);
            $exceptionFile = $outputFile . '.print';
            if (\file_exists($exceptionFile)) {
                $outputFile = $exceptionFile;
            }
            $output = \file_get_contents($outputFile);
            $output = \implode("\n", \array_filter(\explode("\n", $output)));
            $testCases[\str_replace(".typoscript", "", \basename($outputFile))] = [$ast, $output];
        }
        return $testCases;
    }
    /**
     * @dataProvider dataForPrinterTest
     * @param $ast
     * @param $expectedOutput
     */
    public function testParsedCodeIsCorrectlyPrinted($ast, $expectedOutput)
    {
        $output = new \Typo3RectorPrefix20210413\Symfony\Component\Console\Output\BufferedOutput();
        $this->printer->printStatements($ast, $output);
        $this->assertEquals(\trim($expectedOutput), \trim($output->fetch()));
    }
}
