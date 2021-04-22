<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Symfony\Component\Form;

if (\class_exists('Symfony\\Component\\Form\\FormBuilder')) {
    return;
}
class FormBuilder implements \Typo3RectorPrefix20210422\Symfony\Component\Form\FormBuilderInterface
{
}
