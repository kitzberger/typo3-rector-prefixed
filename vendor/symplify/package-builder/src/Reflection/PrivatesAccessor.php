<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\PackageBuilder\Reflection;

use ReflectionProperty;
use Typo3RectorPrefix20210423\Symplify\PHPStanRules\Exception\ShouldNotHappenException;
/**
 * @see \Symplify\PackageBuilder\Tests\Reflection\PrivatesAccessorTest
 */
final class PrivatesAccessor
{
    /**
     * @return mixed
     */
    public function getPrivateProperty(object $object, string $propertyName)
    {
        $propertyReflection = $this->resolvePropertyReflection($object, $propertyName);
        $propertyReflection->setAccessible(\true);
        return $propertyReflection->getValue($object);
    }
    public function setPrivateProperty(object $object, string $propertyName, $value) : void
    {
        $propertyReflection = $this->resolvePropertyReflection($object, $propertyName);
        $propertyReflection->setAccessible(\true);
        $propertyReflection->setValue($object, $value);
    }
    private function resolvePropertyReflection(object $object, string $propertyName) : \ReflectionProperty
    {
        if (\property_exists($object, $propertyName)) {
            return new \ReflectionProperty($object, $propertyName);
        }
        $parentClass = \get_parent_class($object);
        if ($parentClass === \false) {
            throw new \Typo3RectorPrefix20210423\Symplify\PHPStanRules\Exception\ShouldNotHappenException();
        }
        return new \ReflectionProperty($parentClass, $propertyName);
    }
}
