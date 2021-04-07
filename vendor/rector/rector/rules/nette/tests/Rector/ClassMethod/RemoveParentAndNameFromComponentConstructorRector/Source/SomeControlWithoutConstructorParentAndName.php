<?php

declare (strict_types=1);
namespace Rector\Nette\Tests\Rector\ClassMethod\RemoveParentAndNameFromComponentConstructorRector\Source;

use Typo3RectorPrefix20210407\Nette\Application\UI\Control;
final class SomeControlWithoutConstructorParentAndName extends \Typo3RectorPrefix20210407\Nette\Application\UI\Control
{
    private $key;
    private $value;
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
