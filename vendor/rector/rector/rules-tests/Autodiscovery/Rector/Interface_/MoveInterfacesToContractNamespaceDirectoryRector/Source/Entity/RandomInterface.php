<?php

declare (strict_types=1);
namespace Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Entity;

interface RandomInterface
{
    public function returnAnother() : \Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Entity\RandomInterface;
}
