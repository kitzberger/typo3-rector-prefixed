<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript;

use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\ParserInterface;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Traverser;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Visitor;
use Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Tokenizer\TokenizerException;
use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange;
use Ssch\TYPO3Rector\Processor\ConfigurableProcessorInterface;
use Typo3RectorPrefix20210412\Symfony\Component\Console\Output\BufferedOutput;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
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
     * @var ErrorAndDiffCollector
     */
    private $errorAndDiffCollector;
    /**
     * @var string[]
     */
    private $allowedFileExtensions = ['typoscript', 'ts', 'txt'];
    /**
     * @param Visitor[] $visitors
     */
    public function __construct(\Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\ParserInterface $typoscriptParser, \Typo3RectorPrefix20210412\Symfony\Component\Console\Output\BufferedOutput $output, \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface $typoscriptPrinter, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, array $visitors = [])
    {
        $this->typoscriptParser = $typoscriptParser;
        $this->typoscriptPrinter = $typoscriptPrinter;
        $this->output = $output;
        $this->visitors = $visitors;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
    }
    public function process(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?\Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange
    {
        try {
            $originalStatements = $this->typoscriptParser->parseString($smartFileInfo->getContents());
            $traverser = new \Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Parser\Traverser\Traverser($originalStatements);
            foreach ($this->visitors as $visitor) {
                $traverser->addVisitor($visitor);
            }
            $traverser->walk();
            $this->typoscriptPrinter->printStatements($originalStatements, $this->output);
            $typoScriptContent = $this->output->fetch();
            $this->errorAndDiffCollector->addFileDiff($smartFileInfo, $typoScriptContent, $smartFileInfo->getContents());
            return new \Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange($smartFileInfo->getContents(), $typoScriptContent);
        } catch (\Typo3RectorPrefix20210412\Helmich\TypoScriptParser\Tokenizer\TokenizerException $tokenizerException) {
            return null;
        }
    }
    public function supports(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        if ([] === $this->visitors) {
            return \false;
        }
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
}
