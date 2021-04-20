<?php

declare (strict_types=1);


if (\class_exists(\Symfony\Component\Mime\AbstractPart::class)) {
    return;
}
abstract class AbstractPart
{
}
