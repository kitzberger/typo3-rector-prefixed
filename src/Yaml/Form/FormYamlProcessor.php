<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Yaml\Form;

use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange;
use Ssch\TYPO3Rector\Yaml\Form\Transformer\FormYamlTransformer;
use Typo3RectorPrefix20210412\Symfony\Component\Yaml\Yaml;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Ssch\TYPO3Rector\Tests\Yaml\Form\FormYamlProcessorTest
 */
final class FormYamlProcessor implements \Rector\Core\Contract\Processor\FileProcessorInterface
{
    /**
     * @var string[]
     */
    private const ALLOWED_FILE_EXTENSIONS = ['form.yaml'];
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
    public function process(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?\Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange
    {
        $yaml = \Typo3RectorPrefix20210412\Symfony\Component\Yaml\Yaml::parseFile($smartFileInfo->getRealPath());
        if (!\is_array($yaml)) {
            return null;
        }
        foreach ($this->transformer as $transformer) {
            $yaml = $transformer->transform($yaml);
        }
        return new \Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange($smartFileInfo->getContents(), \Typo3RectorPrefix20210412\Symfony\Component\Yaml\Yaml::dump($yaml, 99, 2));
    }
    public function supports(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        if ([] === $this->transformer) {
            return \false;
        }
        return \in_array($smartFileInfo->getExtension(), self::ALLOWED_FILE_EXTENSIONS, \true);
    }
    public function getSupportedFileExtensions() : array
    {
        return self::ALLOWED_FILE_EXTENSIONS;
    }
}
