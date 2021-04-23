<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Yaml\Form;

use Typo3RectorPrefix20210423\Nette\Utils\Strings;
use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\ValueObject\Application\File;
use Ssch\TYPO3Rector\Yaml\Form\Transformer\FormYamlTransformer;
use Typo3RectorPrefix20210423\Symfony\Component\Yaml\Yaml;
/**
 * @see \Ssch\TYPO3Rector\Tests\Yaml\Form\FormYamlProcessorTest
 */
final class FormYamlProcessor implements \Rector\Core\Contract\Processor\FileProcessorInterface
{
    /**
     * @var string[]
     */
    private const ALLOWED_FILE_EXTENSIONS = ['yaml'];
    /**
     * @var FormYamlTransformer[]
     */
    private $transformer = [];
    /**
     * @param FormYamlTransformer[] $transformer
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
        foreach ($files as $file) {
            $this->processFile($file);
        }
    }
    public function supports(\Rector\Core\ValueObject\Application\File $file) : bool
    {
        if ([] === $this->transformer) {
            return \false;
        }
        $smartFileInfo = $file->getSmartFileInfo();
        return \Typo3RectorPrefix20210423\Nette\Utils\Strings::endsWith($smartFileInfo->getFilename(), 'form.yaml');
    }
    public function getSupportedFileExtensions() : array
    {
        return self::ALLOWED_FILE_EXTENSIONS;
    }
    private function processFile(\Rector\Core\ValueObject\Application\File $file) : void
    {
        $smartFileInfo = $file->getSmartFileInfo();
        $yaml = \Typo3RectorPrefix20210423\Symfony\Component\Yaml\Yaml::parseFile($smartFileInfo->getRealPath());
        if (!\is_array($yaml)) {
            return;
        }
        foreach ($this->transformer as $transformer) {
            $yaml = $transformer->transform($yaml);
        }
        $changedContent = \Typo3RectorPrefix20210423\Symfony\Component\Yaml\Yaml::dump($yaml, 99, 2);
        $file->changeFileContent($changedContent);
    }
}
