<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocInfo\PhpDocInfoPrinter\Source;

use Typo3RectorPrefix20210413\Doctrine\ORM\Mapping as ORM;
use Typo3RectorPrefix20210413\JMS\Serializer\Annotation as Serializer;
use Typo3RectorPrefix20210413\Symfony\Component\Validator\Constraints as Assert;
final class ManyToPropertyClass
{
    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Spaceflow\Api\Reservation\Entity\Reservation", mappedBy="amenity", cascade={"persist", "merge"})
     * @Serializer\Type("int")
     * @Assert\Range(
     *     min = 0,
     *     max = 2629744
     * )
     * @Assert\Url(
     *     protocols = {"https"}
     * )
     */
    private $manyTo;
}
