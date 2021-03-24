<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#deprecations-in-the-wrapper-connection-class
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'executeUpdate', 'executeStatement'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'exec', 'executeStatement'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'query', 'executeQuery'),
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#driverexceptiongeterrorcode-is-deprecated
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\DriverException', 'getErrorCode', 'getSQLState'),
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#deprecated-expressionbuilder-methods
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Query\\Expression\\ExpressionBuilder', 'andX', 'and'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Query\\Expression\\ExpressionBuilder', 'orX', 'or'),
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#deprecated-compositeexpression-methods
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Query\\Expression\\CompositeExpression', 'add', 'with'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Query\\Expression\\CompositeExpression', 'addMultiple', 'with'),
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#deprecated-fetchmode-and-the-corresponding-methods
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'fetchAssoc', 'fetchAssociative'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'fetchArray', 'fetchNumeric'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'fetchColumn', 'fetchOne'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connection', 'fetchAll', 'fetchAllAssociative'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Statement', 'fetchAssoc', 'fetchAssociative'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Statement', 'fetchColumn', 'fetchOne'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Statement', 'fetchAll', 'fetchAllAssociative'),
    ])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#pdo-related-classes-outside-of-the-pdo-namespace-are-deprecated
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOMySql\\Driver' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\MySQL\\Driver',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOOracle\\Driver' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\OCI\\Driver',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOPgSql\\Driver' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\PgSQL\\Driver',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOSqlite\\Driver' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\SQLite\\Driver',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOSqlsrv\\Driver' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\SQLSrv\\Driver',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOSqlsrv\\Connection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\SQLSrv\\Connection',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOSqlsrv\\Statement' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\SQLSrv\\Statement',
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#deprecated-dbalexception
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\DBALException' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Exception',
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#inconsistently-and-ambiguously-named-driver-level-classes-are-deprecated
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\DriverException' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\Exception',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\AbstractDriverException' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\AbstractException',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\IBMDB2\\DB2Driver' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\IBMDB2\\Driver',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\IBMDB2\\DB2Connection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\IBMDB2\\Connection',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\IBMDB2\\DB2Statement' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\IBMDB2\\Statement',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\Mysqli\\MysqliConnection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\Mysqli\\Connection',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\Mysqli\\MysqliStatement' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\Mysqli\\Statement',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\OCI8\\OCI8Connection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\OCI8\\Connection',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\OCI8\\OCI8Statement' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\OCI8\\Statement',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\SQLSrv\\SQLSrvConnection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\SQLSrv\\Connection',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\SQLSrv\\SQLSrvStatement' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\SQLSrv\\Statement',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOConnection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\Connection',
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDOStatement' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Driver\\PDO\\Statement',
        // https://github.com/doctrine/dbal/blob/master/UPGRADE.md#deprecated-masterslaveconnection-use-primaryreadreplicaconnection
        'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connections\\MasterSlaveConnection' => 'Typo3RectorPrefix20210324\\Doctrine\\DBAL\\Connections\\PrimaryReadReplicaConnection',
    ]]]);
};
