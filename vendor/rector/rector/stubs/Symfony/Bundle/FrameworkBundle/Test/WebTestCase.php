<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Symfony\Bundle\FrameworkBundle\Test;

if (\class_exists('Symfony\\Bundle\\FrameworkBundle\\Test\\WebTestCase')) {
    return;
}
class WebTestCase extends \Typo3RectorPrefix20210422\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}
