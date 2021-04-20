<?php

namespace Typo3RectorPrefix20210420;

use Typo3RectorPrefix20210420\Symfony\Component\Routing\Annotation\Route;
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
