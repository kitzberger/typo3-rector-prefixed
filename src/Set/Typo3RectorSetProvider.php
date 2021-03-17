<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Set;

use Typo3RectorPrefix20210317\Nette\Utils\Strings;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\Util\StaticRectorStrings;
use ReflectionClass;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Contract\SetProviderInterface;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Exception\SetNotFoundException;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Provider\AbstractSetProvider;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\ValueObject\Set;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo;
final class Typo3RectorSetProvider extends \Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Provider\AbstractSetProvider
{
    /**
     * @var string
     * @see https://regex101.com/r/8gO8w6/1
     */
    private const DASH_NUMBER_REGEX = '#\\-(\\d+)#';
    /**
     * @var SetProviderInterface
     */
    private $rectorSetProvider;
    /**
     * @var Set[]
     */
    private $sets = [];
    public function __construct(\Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Contract\SetProviderInterface $rectorSetProvider)
    {
        $setListReflectionClass = new \ReflectionClass(\Ssch\TYPO3Rector\Set\Typo3SetList::class);
        $this->hydrateSetsFromConstants($setListReflectionClass);
        $this->rectorSetProvider = $rectorSetProvider;
    }
    public function provide() : array
    {
        return \array_merge($this->sets, $this->rectorSetProvider->provide());
    }
    public function provideByName(string $desiredSetName) : ?\Typo3RectorPrefix20210317\Symplify\SetConfigResolver\ValueObject\Set
    {
        try {
            $foundSet = parent::provideByName($desiredSetName);
            if ($foundSet instanceof \Typo3RectorPrefix20210317\Symplify\SetConfigResolver\ValueObject\Set) {
                return $foundSet;
            }
            // second approach by set path
            foreach ($this->sets as $set) {
                if (!\file_exists($desiredSetName)) {
                    continue;
                }
                $desiredSetFileInfo = new \Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo($desiredSetName);
                if ($set->getSetFileInfo()->getRealPath() !== $desiredSetFileInfo->getRealPath()) {
                    continue;
                }
                return $set;
            }
            $message = \sprintf('Set "%s" was not found', $desiredSetName);
            throw new \Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Exception\SetNotFoundException($message, $desiredSetName, $this->provideSetNames());
        } catch (\Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Exception\SetNotFoundException $setNotFoundException) {
            return $this->rectorSetProvider->provideByName($desiredSetName);
        }
    }
    private function hydrateSetsFromConstants(\ReflectionClass $setListReflectionClass) : void
    {
        foreach ($setListReflectionClass->getConstants() as $name => $setPath) {
            if (!\file_exists($setPath)) {
                $message = \sprintf('Set path "%s" was not found', $name);
                throw new \Rector\Core\Exception\ShouldNotHappenException($message);
            }
            $setName = \Rector\Core\Util\StaticRectorStrings::constantToDashes($name);
            // remove `-` before numbers
            $setName = \Typo3RectorPrefix20210317\Nette\Utils\Strings::replace($setName, self::DASH_NUMBER_REGEX, '$1');
            $this->sets[] = new \Typo3RectorPrefix20210317\Symplify\SetConfigResolver\ValueObject\Set($setName, new \Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo($setPath));
        }
    }
}
