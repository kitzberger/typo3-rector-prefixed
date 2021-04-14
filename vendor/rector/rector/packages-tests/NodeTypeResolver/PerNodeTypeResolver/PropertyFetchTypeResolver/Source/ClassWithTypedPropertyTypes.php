<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver\Source;

final class ClassWithTypedPropertyTypes
{
    public $implicitMixed;
    public string $text;
    public int $number;
    public ?string $textNullable;
    public ?int $numberNullable;
    public \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver\Source\Abc $abc;
    public ?\Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver\Source\Abc $abcNullable;
    public \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver\Source\Abc $abcFQ;
    public \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver\Source\IDontExist $nonexistent;
    public \Typo3RectorPrefix20210414\A\B\C\IDontExist $nonexistentFQ;
    public array $array;
    /** @var array<Abc> */
    public array $arrayOfAbcs;
}
