<?php

declare (strict_types=1);
namespace Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Control;

interface ControlFactory
{
    public function create() : \Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Control\SomeControl;
}
