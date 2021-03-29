<?php

declare (strict_types=1);
namespace Rector\Caching\Detector;

use Typo3RectorPrefix20210329\Nette\Utils\Strings;
use Rector\Caching\Config\FileHashComputer;
use Typo3RectorPrefix20210329\Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;
use Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * Inspired by https://github.com/symplify/symplify/pull/90/files#diff-72041b2e1029a08930e13d79d298ef11
 * @see \Rector\Caching\Tests\Detector\ChangedFilesDetectorTest
 */
final class ChangedFilesDetector
{
    /**
     * @var string
     */
    private const CONFIGURATION_HASH_KEY = 'configuration_hash';
    /**
     * @var TagAwareAdapterInterface
     */
    private $tagAwareAdapter;
    /**
     * @var FileHashComputer
     */
    private $fileHashComputer;
    public function __construct(\Rector\Caching\Config\FileHashComputer $fileHashComputer, \Typo3RectorPrefix20210329\Symfony\Component\Cache\Adapter\TagAwareAdapterInterface $tagAwareAdapter)
    {
        $this->tagAwareAdapter = $tagAwareAdapter;
        $this->fileHashComputer = $fileHashComputer;
    }
    /**
     * @param string[] $dependentFiles
     */
    public function addFileWithDependencies(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo, array $dependentFiles) : void
    {
        $fileInfoCacheKey = $this->getFileInfoCacheKey($smartFileInfo);
        $hash = $this->hashFile($smartFileInfo);
        $this->saveItemWithValue($fileInfoCacheKey, $hash);
        $this->saveItemWithValue($fileInfoCacheKey . '_files', $dependentFiles);
    }
    public function hasFileChanged(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        $currentFileHash = $this->hashFile($smartFileInfo);
        $fileInfoCacheKey = $this->getFileInfoCacheKey($smartFileInfo);
        $cacheItem = $this->tagAwareAdapter->getItem($fileInfoCacheKey);
        $oldFileHash = $cacheItem->get();
        return $currentFileHash !== $oldFileHash;
    }
    public function invalidateFile(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $fileInfoCacheKey = $this->getFileInfoCacheKey($smartFileInfo);
        $this->tagAwareAdapter->deleteItem($fileInfoCacheKey);
    }
    public function clear() : void
    {
        $this->tagAwareAdapter->clear();
    }
    /**
     * @return SmartFileInfo[]
     */
    public function getDependentFileInfos(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : array
    {
        $fileInfoCacheKey = $this->getFileInfoCacheKey($fileInfo);
        $cacheItem = $this->tagAwareAdapter->getItem($fileInfoCacheKey . '_files');
        if ($cacheItem->get() === null) {
            return [];
        }
        $dependentFileInfos = [];
        $dependentFiles = $cacheItem->get();
        foreach ($dependentFiles as $dependentFile) {
            if (!\file_exists($dependentFile)) {
                continue;
            }
            $dependentFileInfos[] = new \Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo($dependentFile);
        }
        return $dependentFileInfos;
    }
    /**
     * @api
     */
    public function setFirstResolvedConfigFileInfo(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        // the first config is core to all → if it was changed, just invalidate it
        $configHash = $this->fileHashComputer->compute($fileInfo);
        $this->storeConfigurationDataHash($fileInfo, $configHash);
    }
    private function getFileInfoCacheKey(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : string
    {
        return \sha1($smartFileInfo->getRealPath());
    }
    private function hashFile(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : string
    {
        return (string) \sha1_file($smartFileInfo->getRealPath());
    }
    /**
     * @param mixed $value
     */
    private function saveItemWithValue(string $key, $value) : void
    {
        $cacheItem = $this->tagAwareAdapter->getItem($key);
        $cacheItem->set($value);
        $this->tagAwareAdapter->save($cacheItem);
    }
    private function storeConfigurationDataHash(\Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $fileInfo, string $configurationHash) : void
    {
        $key = self::CONFIGURATION_HASH_KEY . '_' . \Typo3RectorPrefix20210329\Nette\Utils\Strings::webalize($fileInfo->getRealPath());
        $this->invalidateCacheIfConfigurationChanged($key, $configurationHash);
        $this->saveItemWithValue($key, $configurationHash);
    }
    private function invalidateCacheIfConfigurationChanged(string $key, string $configurationHash) : void
    {
        $cacheItem = $this->tagAwareAdapter->getItem($key);
        $oldConfigurationHash = $cacheItem->get();
        if ($configurationHash !== $oldConfigurationHash) {
            // should be unique per getcwd()
            $this->clear();
        }
    }
}
