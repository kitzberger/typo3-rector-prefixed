<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318\Symplify\SetConfigResolver\Provider;

use Typo3RectorPrefix20210318\Nette\Utils\Strings;
use Typo3RectorPrefix20210318\Symplify\SetConfigResolver\Contract\SetProviderInterface;
use Typo3RectorPrefix20210318\Symplify\SetConfigResolver\Exception\SetNotFoundException;
use Typo3RectorPrefix20210318\Symplify\SetConfigResolver\ValueObject\Set;
use Typo3RectorPrefix20210318\Symplify\SymplifyKernel\Exception\ShouldNotHappenException;
abstract class AbstractSetProvider implements \Typo3RectorPrefix20210318\Symplify\SetConfigResolver\Contract\SetProviderInterface
{
    /**
     * @return string[]
     */
    public function provideSetNames() : array
    {
        $setNames = [];
        $sets = $this->provide();
        foreach ($sets as $set) {
            $setNames[] = $set->getName();
        }
        return $setNames;
    }
    public function provideByName(string $desiredSetName) : ?\Typo3RectorPrefix20210318\Symplify\SetConfigResolver\ValueObject\Set
    {
        // 1. name-based approach
        $sets = $this->provide();
        foreach ($sets as $set) {
            if ($set->getName() !== $desiredSetName) {
                continue;
            }
            return $set;
        }
        // 2. path-based approach
        try {
            $sets = $this->provide();
            foreach ($sets as $set) {
                // possible bug for PHAR files, see https://bugs.php.net/bug.php?id=52769
                // this is very tricky to handle, see https://stackoverflow.com/questions/27838025/how-to-get-a-phar-file-real-directory-within-the-phar-file-code
                $setUniqueId = $this->resolveSetUniquePathId($set->getSetPathname());
                $desiredSetUniqueId = $this->resolveSetUniquePathId($desiredSetName);
                if ($setUniqueId !== $desiredSetUniqueId) {
                    continue;
                }
                return $set;
            }
        } catch (\Typo3RectorPrefix20210318\Symplify\SymplifyKernel\Exception\ShouldNotHappenException $shouldNotHappenException) {
        }
        $message = \sprintf('Set "%s" was not found', $desiredSetName);
        throw new \Typo3RectorPrefix20210318\Symplify\SetConfigResolver\Exception\SetNotFoundException($message, $desiredSetName, $this->provideSetNames());
    }
    private function resolveSetUniquePathId(string $setPath) : string
    {
        $setPath = \Typo3RectorPrefix20210318\Nette\Utils\Strings::after($setPath, \DIRECTORY_SEPARATOR, -2);
        if ($setPath === null) {
            throw new \Typo3RectorPrefix20210318\Symplify\SymplifyKernel\Exception\ShouldNotHappenException();
        }
        return $setPath;
    }
}
