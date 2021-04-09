<?php

namespace Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\NameTypeResolver\Source;

use Rector\Tests\NodeTypeResolver\Source\AnotherClass;
class ParentCall extends \Rector\Tests\NodeTypeResolver\Source\AnotherClass
{
    public function getParameters()
    {
        parent::getParameters();
    }
}
