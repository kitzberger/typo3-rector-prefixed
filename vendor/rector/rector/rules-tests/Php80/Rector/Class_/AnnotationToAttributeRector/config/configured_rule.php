<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421;

use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\Php80\ValueObject\AnnotationToAttribute;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php80\Rector\Class_\AnnotationToAttributeRector::class)->call('configure', [[\Rector\Php80\Rector\Class_\AnnotationToAttributeRector::ANNOTATION_TO_ATTRIBUTE => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // nette 3.0+, see https://github.com/nette/application/commit/d2471134ed909210de8a3e8559931902b1bee67b#diff-457507a8bdc046dd4f3a4aa1ca51794543fbb1e06f03825ab69ee864549a570c
        new \Rector\Php80\ValueObject\AnnotationToAttribute('inject', 'Nette\\DI\\Attributes\\Inject'),
        new \Rector\Php80\ValueObject\AnnotationToAttribute('persistent', 'Nette\\Application\\Attributes\\Persistent'),
        new \Rector\Php80\ValueObject\AnnotationToAttribute('crossOrigin', 'Nette\\Application\\Attributes\\CrossOrigin'),
        // symfony
        new \Rector\Php80\ValueObject\AnnotationToAttribute('required', 'Symfony\\Contracts\\Service\\Attribute\\Required'),
        new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Routing\\Annotation\\Route', 'Symfony\\Component\\Routing\\Annotation\\Route'),
        // symfony/validation
        new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Email', 'Symfony\\Component\\Validator\\Constraints\\Email'),
        new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Range', 'Symfony\\Component\\Validator\\Constraints\\Range'),
    ])]]);
};
