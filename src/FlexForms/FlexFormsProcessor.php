<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\FlexForms;

use DOMDocument;
use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\ValueObject\Application\File;
use Ssch\TYPO3Rector\FlexForms\Transformer\FlexFormTransformer;
use UnexpectedValueException;
/**
 * @see \Ssch\TYPO3Rector\Tests\FlexForms\FlexFormsProcessorTest
 */
final class FlexFormsProcessor implements \Rector\Core\Contract\Processor\FileProcessorInterface
{
    /**
     * @var FlexFormTransformer[]
     */
    private $transformer = [];
    /**
     * @param FlexFormTransformer[] $transformer
     */
    public function __construct(array $transformer)
    {
        $this->transformer = $transformer;
    }
    /**
     * @param File[] $files
     */
    public function process(array $files) : void
    {
        if ([] === $this->transformer) {
            return;
        }
        foreach ($files as $file) {
            $this->processFile($file);
        }
    }
    public function supports(\Rector\Core\ValueObject\Application\File $file) : bool
    {
        $smartFileInfo = $file->getSmartFileInfo();
        if (!\in_array($smartFileInfo->getExtension(), $this->getSupportedFileExtensions(), \true)) {
            return \false;
        }
        $xml = \simplexml_load_string($file->getFileContent());
        if (\false === $xml) {
            return \false;
        }
        return 'T3DataStructure' === $xml->getName();
    }
    public function getSupportedFileExtensions() : array
    {
        return ['xml'];
    }
    private function processFile(\Rector\Core\ValueObject\Application\File $file) : void
    {
        $domDocument = new \DOMDocument();
        $domDocument->formatOutput = \true;
        $domDocument->loadXML($file->getFileContent());
        foreach ($this->transformer as $transformer) {
            $transformer->transform($domDocument);
        }
        $xml = $domDocument->saveXML($domDocument->documentElement, \LIBXML_NOEMPTYTAG);
        if (\false === $xml) {
            throw new \UnexpectedValueException('Could not convert to xml');
        }
        if ($xml === $file->getFileContent()) {
            return;
        }
        $changedContent = \html_entity_decode($xml) . "\n";
        $file->changeFileContent($changedContent);
    }
}
