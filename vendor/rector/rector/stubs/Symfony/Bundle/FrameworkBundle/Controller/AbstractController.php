<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409\Symfony\Bundle\FrameworkBundle\Controller;

use Typo3RectorPrefix20210409\Doctrine\Common\Persistence\ManagerRegistry;
use Typo3RectorPrefix20210409\Symfony\Component\HttpFoundation\RedirectResponse;
use Typo3RectorPrefix20210409\Symfony\Component\HttpFoundation\Response;
if (\class_exists('Typo3RectorPrefix20210409\\Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController')) {
    return;
}
abstract class AbstractController
{
    public function getDoctrine() : \Typo3RectorPrefix20210409\Doctrine\Common\Persistence\ManagerRegistry
    {
    }
    public function render($templateName, $params = []) : \Typo3RectorPrefix20210409\Symfony\Component\HttpFoundation\Response
    {
    }
    public function redirectToRoute($routeName) : \Typo3RectorPrefix20210409\Symfony\Component\HttpFoundation\RedirectResponse
    {
    }
}