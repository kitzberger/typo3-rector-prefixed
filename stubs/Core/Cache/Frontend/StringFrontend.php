<?php

declare (strict_types=1);


if (\interface_exists(\TYPO3\CMS\Core\Cache\Frontend\StringFrontend::class)) {
    return;
}
final class StringFrontend
{
}
