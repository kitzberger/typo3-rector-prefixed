<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocInfo\PhpDocInfoPrinter\Source\Doctrine;

use Typo3RectorPrefix20210423\Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table(
 *     name="building",
 *     indexes={
 *          @ORM\Index(name="isDemoBuilding", columns={"is_demo_building"})
 *     }
 * )
 */
final class IndexInTable
{
}
