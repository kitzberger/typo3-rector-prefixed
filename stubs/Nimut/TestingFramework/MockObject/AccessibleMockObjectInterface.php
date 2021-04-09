<?php

namespace Nimut\TestingFramework\MockObject;

if (\interface_exists(\Nimut\TestingFramework\MockObject\AccessibleMockObjectInterface::class)) {
    return;
}
interface AccessibleMockObjectInterface
{
}
