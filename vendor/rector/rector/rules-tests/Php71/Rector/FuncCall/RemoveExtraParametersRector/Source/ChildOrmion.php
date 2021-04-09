<?php

declare (strict_types=1);
namespace Rector\Tests\Php71\Rector\FuncCall\RemoveExtraParametersRector\Source;

final class ChildOrmion extends \Rector\Tests\Php71\Rector\FuncCall\RemoveExtraParametersRector\Source\Ormion
{
    public static function getDb() : \Rector\Tests\Php71\Rector\FuncCall\RemoveExtraParametersRector\Source\Db
    {
        return new \Rector\Tests\Php71\Rector\FuncCall\RemoveExtraParametersRector\Source\Db();
    }
    /**
     * @return Db
     */
    public static function getDbWithAnnotationReturn()
    {
        return new \Rector\Tests\Php71\Rector\FuncCall\RemoveExtraParametersRector\Source\Db();
    }
}
