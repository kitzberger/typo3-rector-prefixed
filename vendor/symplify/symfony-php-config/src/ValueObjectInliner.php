<?php

declare (strict_types=1);
namespace Symplify\SymfonyPhpConfig;

use ReflectionClass;
use ReflectionMethod;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\InlineServiceConfigurator;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator;
use Symplify\SymfonyPhpConfig\Reflection\ArgumentAndParameterFactory;
use function Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\inline_service;
use function Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\service;
final class ValueObjectInliner
{
    public static function inlineArgumentObject(object $object, \Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator $servicesConfigurator) : \Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator
    {
        $reflectionClass = new \ReflectionClass($object);
        $className = $reflectionClass->getName();
        $propertyValues = self::resolvePropertyValues($reflectionClass, $object);
        // create fake factory with private accessor, as properties are different
        // @see https://symfony.com/doc/current/service_container/factories.html#passing-arguments-to-the-factory-method
        $servicesConfigurator->set(\Symplify\SymfonyPhpConfig\Reflection\ArgumentAndParameterFactory::class);
        $argumentValues = self::resolveArgumentValues($reflectionClass, $object);
        $servicesConfigurator->set($className)->factory([\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Symplify\SymfonyPhpConfig\Reflection\ArgumentAndParameterFactory::class), 'create'])->args([$className, $argumentValues, $propertyValues]);
        return \Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\service($className);
    }
    /**
     * @param object|object[] $object
     * @return InlineServiceConfigurator|InlineServiceConfigurator[]
     */
    public static function inline($object)
    {
        if (\is_object($object)) {
            return self::inlineSingle($object);
        }
        return self::inlineMany($object);
    }
    /**
     * @return mixed[]
     */
    public static function resolveArgumentValues(\ReflectionClass $reflectionClass, object $object) : array
    {
        $argumentValues = [];
        $constructorReflectionMethod = $reflectionClass->getConstructor();
        if (!$constructorReflectionMethod instanceof \ReflectionMethod) {
            // value object without constructor
            return [];
        }
        foreach ($constructorReflectionMethod->getParameters() as $reflectionParameter) {
            $parameterName = $reflectionParameter->getName();
            $propertyReflection = $reflectionClass->getProperty($parameterName);
            $propertyReflection->setAccessible(\true);
            $resolvedValue = $propertyReflection->getValue($object);
            $resolvedValue = self::inlineNestedArrayObjects($resolvedValue);
            $argumentValues[] = \is_object($resolvedValue) ? self::inlineSingle($resolvedValue) : $resolvedValue;
        }
        return $argumentValues;
    }
    /**
     * @param object[] $objects
     * @return InlineServiceConfigurator[]
     */
    private static function inlineMany(array $objects) : array
    {
        $inlineServices = [];
        foreach ($objects as $object) {
            $inlineServices[] = self::inlineSingle($object);
        }
        return $inlineServices;
    }
    /**
     * @return array<string, mixed>
     */
    private static function resolvePropertyValues(\ReflectionClass $reflectionClass, object $object) : array
    {
        $propertyValues = [];
        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
            $parameterName = $reflectionProperty->getName();
            $reflectionProperty->setAccessible(\true);
            $propertyValues[$parameterName] = $reflectionProperty->getValue($object);
        }
        return $propertyValues;
    }
    private static function inlineSingle(object $object) : \Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\InlineServiceConfigurator
    {
        $reflectionClass = new \ReflectionClass($object);
        $className = $reflectionClass->getName();
        $argumentValues = self::resolveArgumentValues($reflectionClass, $object);
        $inlineServiceConfigurator = \Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\inline_service($className);
        if ($argumentValues !== []) {
            $inlineServiceConfigurator->args($argumentValues);
        }
        return $inlineServiceConfigurator;
    }
    /**
     * @param mixed|mixed[] $resolvedValue
     * @return mixed|mixed[]
     */
    private static function inlineNestedArrayObjects($resolvedValue)
    {
        if (\is_array($resolvedValue)) {
            foreach ($resolvedValue as $key => $value) {
                if (\is_object($value)) {
                    $resolvedValue[$key] = self::inline($value);
                }
            }
        }
        return $resolvedValue;
    }
}
