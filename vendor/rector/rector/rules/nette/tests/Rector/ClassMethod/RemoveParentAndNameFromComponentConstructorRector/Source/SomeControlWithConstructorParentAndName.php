<?php

declare (strict_types=1);
namespace Rector\Nette\Tests\Rector\ClassMethod\RemoveParentAndNameFromComponentConstructorRector\Source;

use Typo3RectorPrefix20210331\Nette\Application\UI\Control;
final class SomeControlWithConstructorParentAndName extends \Typo3RectorPrefix20210331\Nette\Application\UI\Control
{
    public function __construct($parent = null, $name = '')
    {
        $this->parent = $parent;
        $this->name = $name;
    }
}
