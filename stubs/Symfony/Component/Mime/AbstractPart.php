<?php

declare (strict_types=1);
namespace Symfony\Component\Mime;

if (\class_exists(\Symfony\Component\Mime\AbstractPart::class)) {
    return;
}
abstract class AbstractPart
{
}
