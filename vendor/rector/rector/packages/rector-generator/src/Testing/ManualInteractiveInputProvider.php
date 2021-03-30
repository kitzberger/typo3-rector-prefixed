<?php

declare (strict_types=1);
namespace Rector\RectorGenerator\Testing;

use Typo3RectorPrefix20210330\Symfony\Component\Console\Input\ArrayInput;
use Typo3RectorPrefix20210330\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210330\Symfony\Component\Console\Tester\CommandTester;
use Typo3RectorPrefix20210330\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use Typo3RectorPrefix20210330\Symplify\PackageBuilder\Reflection\PrivatesCaller;
final class ManualInteractiveInputProvider
{
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @var PrivatesCaller
     */
    private $privatesCaller;
    /**
     * @var PrivatesAccessor
     */
    private $privatesAccessor;
    public function __construct(\Typo3RectorPrefix20210330\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Typo3RectorPrefix20210330\Symplify\PackageBuilder\Reflection\PrivatesCaller $privatesCaller, \Typo3RectorPrefix20210330\Symplify\PackageBuilder\Reflection\PrivatesAccessor $privatesAccessor)
    {
        $this->symfonyStyle = $symfonyStyle;
        $this->privatesCaller = $privatesCaller;
        $this->privatesAccessor = $privatesAccessor;
    }
    /**
     * Use an in-memory input stream even if no inputs are set so that QuestionHelper::ask() does not rely on the blocking STDIN
     * @param string[]|null[] $manualInteractiveInput
     */
    public function setInput(array $manualInteractiveInput) : void
    {
        $arrayInput = new \Typo3RectorPrefix20210330\Symfony\Component\Console\Input\ArrayInput([]);
        $inputStream = $this->createInputStream($manualInteractiveInput);
        $arrayInput->setStream($inputStream);
        // use stream input as input for SymfonyStyle
        $this->privatesAccessor->setPrivateProperty($this->symfonyStyle, 'input', $arrayInput);
    }
    /**
     * @param string[]|null[] $manualInteractiveInput
     * @return resource
     */
    private function createInputStream(array $manualInteractiveInput)
    {
        // mimics CommandTester, only with DI approach
        return $this->privatesCaller->callPrivateMethod(\Typo3RectorPrefix20210330\Symfony\Component\Console\Tester\CommandTester::class, 'createStream', [$manualInteractiveInput]);
    }
}
