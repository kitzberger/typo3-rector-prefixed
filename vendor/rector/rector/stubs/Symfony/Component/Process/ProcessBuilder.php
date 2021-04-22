<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Symfony\Component\Process;

if (\class_exists('Symfony\\Component\\Process\\ProcessBuilder')) {
    return;
}
class ProcessBuilder
{
}
