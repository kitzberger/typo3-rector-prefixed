<?php

namespace Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source;

use Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\SomeChild;
class ActionClass
{
    /**
     * @var SomeChild|null
     */
    private $someChildValueObject;
    public function someFunction()
    {
        $this->someChildValueObject = new \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\SomeChild('value');
        $someChildValueObject = new \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\Source\SomeChild();
    }
}
