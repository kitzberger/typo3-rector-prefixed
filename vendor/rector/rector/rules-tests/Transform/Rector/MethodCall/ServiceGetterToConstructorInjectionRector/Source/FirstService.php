<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source;

class FirstService
{
    /**
     * @var AnotherService
     */
    private $anotherService;
    public function __construct(\Rector\Tests\Transform\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source\AnotherService $anotherService)
    {
        $this->anotherService = $anotherService;
    }
    public function getAnotherService() : \Rector\Tests\Transform\Rector\MethodCall\ServiceGetterToConstructorInjectionRector\Source\AnotherService
    {
        return $this->anotherService;
    }
}
