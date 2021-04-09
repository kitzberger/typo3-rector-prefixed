<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\FuncCall\FuncCallToMethodCallRector\Source;

abstract class TranslatorProvider
{
    private $translator;
    public function getTranslator() : \Rector\Tests\Transform\Rector\FuncCall\FuncCallToMethodCallRector\Source\SomeTranslator
    {
        return $this->translator;
    }
}
