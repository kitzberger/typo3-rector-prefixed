<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\Tests\PhpDocParser\TagValueNodeReprint\Fixture\SymfonyRoute;

use Typo3RectorPrefix20210302\Symfony\Component\Routing\Annotation\Route;
// @see https://github.com/rectorphp/rector/issues/3212#issue-603962176
final class RouteWithSpacesOnItem
{
    /**
     * @Route(
     *     path="/some-endpoint",
     *     methods={"POST"}
     * )
     */
    public function run()
    {
    }
}
