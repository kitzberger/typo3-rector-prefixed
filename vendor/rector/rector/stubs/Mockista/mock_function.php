<?php

namespace Typo3RectorPrefix20210413;

if (\function_exists('Typo3RectorPrefix20210413\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210413\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210413\DummyMock();
}
