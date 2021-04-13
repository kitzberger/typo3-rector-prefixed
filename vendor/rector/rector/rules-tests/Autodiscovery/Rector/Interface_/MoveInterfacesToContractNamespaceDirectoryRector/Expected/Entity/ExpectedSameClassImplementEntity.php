<?php

declare (strict_types=1);
namespace Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Entity;

final class SameClassImplementEntity implements \Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Contract\RandomInterface
{
    public function __construct(\Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Contract\RandomInterface $random)
    {
    }
    public function returnAnother() : \Rector\Tests\Autodiscovery\Rector\Interface_\MoveInterfacesToContractNamespaceDirectoryRector\Source\Contract\RandomInterface
    {
    }
}
