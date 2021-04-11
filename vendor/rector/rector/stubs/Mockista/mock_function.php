<?php

namespace Typo3RectorPrefix20210411;

if (\function_exists('Typo3RectorPrefix20210411\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210411\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210411\DummyMock();
}
