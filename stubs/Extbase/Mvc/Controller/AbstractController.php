<?php

declare (strict_types=1);


use TYPO3\CMS\Extbase\Mvc\Request;
if (\class_exists(\TYPO3\CMS\Extbase\Mvc\Controller\AbstractController::class)) {
    return;
}
abstract class AbstractController
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->request = new \TYPO3\CMS\Extbase\Mvc\Request();
    }
}
