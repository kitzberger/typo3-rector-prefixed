<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\AnnotationReader;

use Typo3RectorPrefix20210223\Doctrine\Common\Annotations\AnnotationReader;
use Typo3RectorPrefix20210223\Doctrine\Common\Annotations\AnnotationRegistry;
use Typo3RectorPrefix20210223\Doctrine\Common\Annotations\DocParser;
use Typo3RectorPrefix20210223\Doctrine\Common\Annotations\Reader;
use Rector\BetterPhpDocParser\ValueObject\PhpDocNode\Nette\NetteInjectTagNode;
use Rector\DoctrineAnnotationGenerated\ConstantPreservingAnnotationReader;
use Rector\DoctrineAnnotationGenerated\ConstantPreservingDocParser;
final class AnnotationReaderFactory
{
    /**
     * @var string[]
     */
    private const IGNORED_NAMES = [
        'Typo3RectorPrefix20210223\\ORM\\GeneratedValue',
        'GeneratedValue',
        'Typo3RectorPrefix20210223\\ORM\\InheritanceType',
        'InheritanceType',
        'Typo3RectorPrefix20210223\\ORM\\OrderBy',
        'OrderBy',
        'Typo3RectorPrefix20210223\\ORM\\DiscriminatorMap',
        'DiscriminatorMap',
        'Typo3RectorPrefix20210223\\ORM\\UniqueEntity',
        'UniqueEntity',
        'Typo3RectorPrefix20210223\\Gedmo\\SoftDeleteable',
        'SoftDeleteable',
        'Typo3RectorPrefix20210223\\Gedmo\\Slug',
        'Slug',
        'Typo3RectorPrefix20210223\\Gedmo\\SoftDeleteable',
        'SoftDeleteable',
        'Typo3RectorPrefix20210223\\Gedmo\\Blameable',
        'Blameable',
        'Typo3RectorPrefix20210223\\Gedmo\\Versioned',
        'Versioned',
        // nette @inject dummy annotation
        \Rector\BetterPhpDocParser\ValueObject\PhpDocNode\Nette\NetteInjectTagNode::NAME,
    ];
    public function create() : \Typo3RectorPrefix20210223\Doctrine\Common\Annotations\Reader
    {
        \Typo3RectorPrefix20210223\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
        // generated
        $annotationReader = $this->createAnnotationReader();
        // without this the reader will try to resolve them and fails with an exception
        // don't forget to add it to "stubs/Doctrine/Empty" directory, because the class needs to exists
        // and run "composer dump-autoload", because the directory is loaded by classmap
        foreach (self::IGNORED_NAMES as $ignoredName) {
            $annotationReader::addGlobalIgnoredName($ignoredName);
        }
        // warning: nested tags must be parse-able, e.g. @ORM\Table must include @ORM\UniqueConstraint!
        return $annotationReader;
    }
    /**
     * @return AnnotationReader|ConstantPreservingAnnotationReader
     */
    private function createAnnotationReader() : \Typo3RectorPrefix20210223\Doctrine\Common\Annotations\Reader
    {
        // these 2 classes are generated by "bin/rector sync-annotation-parser" command
        if (\class_exists(\Rector\DoctrineAnnotationGenerated\ConstantPreservingAnnotationReader::class) && \class_exists(\Rector\DoctrineAnnotationGenerated\ConstantPreservingDocParser::class)) {
            $constantPreservingDocParser = new \Rector\DoctrineAnnotationGenerated\ConstantPreservingDocParser();
            return new \Rector\DoctrineAnnotationGenerated\ConstantPreservingAnnotationReader($constantPreservingDocParser);
        }
        // fallback for testing incompatibilities
        return new \Typo3RectorPrefix20210223\Doctrine\Common\Annotations\AnnotationReader(new \Typo3RectorPrefix20210223\Doctrine\Common\Annotations\DocParser());
    }
}