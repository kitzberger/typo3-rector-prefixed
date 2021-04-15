<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415\Symfony\Component\Form\Extension\Core\Type;

use Typo3RectorPrefix20210415\Symfony\Component\Form\FormBuilderInterface;
use Typo3RectorPrefix20210415\Symfony\Component\Form\FormTypeInterface;
if (\class_exists('Typo3RectorPrefix20210415\\Symfony\\Component\\Form\\Extension\\Core\\Type\\TextType')) {
    return;
}
class TextType implements \Typo3RectorPrefix20210415\Symfony\Component\Form\FormTypeInterface, \Typo3RectorPrefix20210415\Symfony\Component\Form\FormBuilderInterface
{
}
