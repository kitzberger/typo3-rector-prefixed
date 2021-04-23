<?php

namespace Typo3RectorPrefix20210423;

use Typo3RectorPrefix20210423\Symfony\Component\Routing\Annotation\Route;
class SomeController
{
    /**
     * @Route()
     */
    public function someMethod()
    {
    }
}
\class_alias('SomeController', 'SomeController', \false);
