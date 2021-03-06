<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocInfo\PhpDocInfoPrinter\Source\Doctrine;

use Typo3RectorPrefix20210423\Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
/**
 * @ORM\Table(
 *   uniqueConstraints={
 *      @UniqueConstraint(name="content_status_unique", columns={"content_id", "site_id", "lang"})
 *     }
 * )
 */
final class Short
{
}
