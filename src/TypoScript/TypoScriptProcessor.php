<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript;

use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\ParserInterface;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Traverser\Traverser;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Traverser\Visitor;
use Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\TokenizerException;
use Rector\Core\ValueObject\Application\File;
use Ssch\TYPO3Rector\Processor\ConfigurableProcessorInterface;
use Typo3RectorPrefix20210413\Symfony\Component\Console\Output\BufferedOutput;
/**
 * @see \Ssch\TYPO3Rector\Tests\TypoScript\TypoScriptProcessorTest
 */
final class TypoScriptProcessor implements \Ssch\TYPO3Rector\Processor\ConfigurableProcessorInterface
{
    /**
     * @var string
     */
    public const ALLOWED_FILE_EXTENSIONS = 'allowed_file_extensions';
    /**
     * @var ParserInterface
     */
    private $typoscriptParser;
    /**
     * @var ASTPrinterInterface
     */
    private $typoscriptPrinter;
    /**
     * @var BufferedOutput
     */
    private $output;
    /**
     * @var Visitor[]
     */
    private $visitors = [];
    /**
     * @var string[]
     */
    private $allowedFileExtensions = ['typoscript', 'ts', 'txt'];
    /**
     * @param Visitor[] $visitors
     */
    public function __construct(\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\ParserInterface $typoscriptParser, \Typo3RectorPrefix20210413\Symfony\Component\Console\Output\BufferedOutput $output, \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface $typoscriptPrinter, array $visitors = [])
    {
        $this->typoscriptParser = $typoscriptParser;
        $this->typoscriptPrinter = $typoscriptPrinter;
        $this->output = $output;
        $this->visitors = $visitors;
    }
    /**
     * @param File[] $files
     */
    public function process(array $files) : void
    {
        foreach ($files as $file) {
            $this->processFile($file);
        }
    }
    public function supports(\Rector\Core\ValueObject\Application\File $file) : bool
    {
        if ([] === $this->visitors) {
            return \false;
        }
        $smartFileInfo = $file->getSmartFileInfo();
        return \in_array($smartFileInfo->getExtension(), $this->allowedFileExtensions, \true);
    }
    /**
     * @return string[]
     */
    public function getSupportedFileExtensions() : array
    {
        return $this->allowedFileExtensions;
    }
    public function configure(array $configuration) : void
    {
        $this->allowedFileExtensions = $configuration[self::ALLOWED_FILE_EXTENSIONS] ?? [];
    }
    private function processFile(\Rector\Core\ValueObject\Application\File $file) : void
    {
        try {
            $smartFileInfo = $file->getSmartFileInfo();
            $originalStatements = $this->typoscriptParser->parseString($smartFileInfo->getContents());
            $traverser = new \Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Parser\Traverser\Traverser($originalStatements);
            foreach ($this->visitors as $visitor) {
                $traverser->addVisitor($visitor);
            }
            $traverser->walk();
            $this->typoscriptPrinter->printStatements($originalStatements, $this->output);
            $typoScriptContent = $this->output->fetch();
            $file->changeFileContent($typoScriptContent);
        } catch (\Typo3RectorPrefix20210413\Helmich\TypoScriptParser\Tokenizer\TokenizerException $tokenizerException) {
            return;
        }
    }
}
