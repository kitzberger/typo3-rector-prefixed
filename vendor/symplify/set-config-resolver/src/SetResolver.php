<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210412\Symplify\SetConfigResolver;

use Typo3RectorPrefix20210412\Symplify\SetConfigResolver\Contract\SetProviderInterface;
use Typo3RectorPrefix20210412\Symplify\SetConfigResolver\Exception\SetNotFoundException;
use Typo3RectorPrefix20210412\Symplify\SetConfigResolver\ValueObject\Set;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class SetResolver
{
    /**
     * @var SetProviderInterface
     */
    private $setProvider;
    public function __construct(\Typo3RectorPrefix20210412\Symplify\SetConfigResolver\Contract\SetProviderInterface $setProvider)
    {
        $this->setProvider = $setProvider;
    }
    public function detectFromName(string $setName) : \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo
    {
        $set = $this->setProvider->provideByName($setName);
        if (!$set instanceof \Typo3RectorPrefix20210412\Symplify\SetConfigResolver\ValueObject\Set) {
            $this->reportSetNotFound($setName);
        }
        return $set->getSetFileInfo();
    }
    private function reportSetNotFound(string $setName) : void
    {
        $message = \sprintf('Set "%s" was not found', $setName);
        throw new \Typo3RectorPrefix20210412\Symplify\SetConfigResolver\Exception\SetNotFoundException($message, $setName, $this->setProvider->provideSetNames());
    }
}
