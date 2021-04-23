<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symfony\Bundle\FrameworkBundle\Controller;

use Typo3RectorPrefix20210423\Symfony\Component\Form\FormInterface;
if (\class_exists('Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller')) {
    return;
}
class Controller
{
    public function createForm() : \Typo3RectorPrefix20210423\Symfony\Component\Form\FormInterface
    {
    }
}
