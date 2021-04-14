<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414\Symfony\Bundle\FrameworkBundle\Test;

if (\class_exists('Typo3RectorPrefix20210414\\Symfony\\Bundle\\FrameworkBundle\\Test\\WebTestCase')) {
    return;
}
class WebTestCase extends \Typo3RectorPrefix20210414\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}
