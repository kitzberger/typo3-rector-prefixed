<?php

namespace Typo3RectorPrefix20210415;

if (\function_exists('Typo3RectorPrefix20210415\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210415\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210415\DummyMock();
}
