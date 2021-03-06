<?php

declare (strict_types=1);
namespace Rector\Testing\ValueObject;

use Rector\FileSystemRector\ValueObject\AddedFileWithContent;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class InputFilePathWithExpectedFile
{
    /**
     * @var string
     */
    private $inputFilePath;
    /**
     * @var AddedFileWithContent
     */
    private $addedFileWithContent;
    public function __construct(string $inputFilePath, \Rector\FileSystemRector\ValueObject\AddedFileWithContent $addedFileWithContent)
    {
        $this->inputFilePath = $inputFilePath;
        $this->addedFileWithContent = $addedFileWithContent;
    }
    public function getInputFileInfo() : \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo
    {
        return new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($this->inputFilePath);
    }
    public function getAddedFileWithContent() : \Rector\FileSystemRector\ValueObject\AddedFileWithContent
    {
        return $this->addedFileWithContent;
    }
}
