<?php

namespace Typo3RectorPrefix20210418;

if (\function_exists('Typo3RectorPrefix20210418\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210418\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210418\DummyMock();
}
