<?php

declare (strict_types=1);
namespace Rector\Core\Tests\NonPhpFile\Source;

use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class TextNonPhpFileProcessor implements \Rector\Core\Contract\Processor\FileProcessorInterface
{
    public function process(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?\Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange
    {
        $oldContent = $smartFileInfo->getContents();
        $newContent = \str_replace('Foo', 'Bar', $oldContent);
        return new \Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange($oldContent, $newContent);
    }
    public function supports(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        return \in_array($smartFileInfo->getExtension(), $this->getSupportedFileExtensions());
    }
    public function getSupportedFileExtensions() : array
    {
        return ['txt'];
    }
}
