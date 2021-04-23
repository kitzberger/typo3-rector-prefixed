<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner;

use Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Caster\Caster;
use Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Exception\ThrowingCasterException;
/**
 * AbstractCloner implements a generic caster mechanism for objects and resources.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
abstract class AbstractCloner implements \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\ClonerInterface
{
    public static $defaultCasters = ['__PHP_Incomplete_Class' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\Caster', 'castPhpIncompleteClass'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\CutStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'castStub'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\CutArrayStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'castCutArray'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ConstStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'castStub'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\EnumStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'castEnum'], 'Closure' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castClosure'], 'Generator' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castGenerator'], 'ReflectionType' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castType'], 'ReflectionAttribute' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castAttribute'], 'ReflectionGenerator' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castReflectionGenerator'], 'ReflectionClass' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castClass'], 'ReflectionClassConstant' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castClassConstant'], 'ReflectionFunctionAbstract' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castFunctionAbstract'], 'ReflectionMethod' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castMethod'], 'ReflectionParameter' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castParameter'], 'ReflectionProperty' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castProperty'], 'ReflectionReference' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castReference'], 'ReflectionExtension' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castExtension'], 'ReflectionZendExtension' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster', 'castZendExtension'], 'Typo3RectorPrefix20210423\\Doctrine\\Common\\Persistence\\ObjectManager' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Doctrine\\Common\\Proxy\\Proxy' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster', 'castCommonProxy'], 'Typo3RectorPrefix20210423\\Doctrine\\ORM\\Proxy\\Proxy' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster', 'castOrmProxy'], 'Typo3RectorPrefix20210423\\Doctrine\\ORM\\PersistentCollection' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster', 'castPersistentCollection'], 'Typo3RectorPrefix20210423\\Doctrine\\Persistence\\ObjectManager' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'DOMException' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castException'], 'DOMStringList' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castLength'], 'DOMNameList' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castLength'], 'DOMImplementation' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castImplementation'], 'DOMImplementationList' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castLength'], 'DOMNode' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castNode'], 'DOMNameSpaceNode' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castNameSpaceNode'], 'DOMDocument' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castDocument'], 'DOMNodeList' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castLength'], 'DOMNamedNodeMap' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castLength'], 'DOMCharacterData' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castCharacterData'], 'DOMAttr' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castAttr'], 'DOMElement' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castElement'], 'DOMText' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castText'], 'DOMTypeinfo' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castTypeinfo'], 'DOMDomError' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castDomError'], 'DOMLocator' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castLocator'], 'DOMDocumentType' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castDocumentType'], 'DOMNotation' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castNotation'], 'DOMEntity' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castEntity'], 'DOMProcessingInstruction' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castProcessingInstruction'], 'DOMXPath' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DOMCaster', 'castXPath'], 'XMLReader' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\XmlReaderCaster', 'castXmlReader'], 'ErrorException' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castErrorException'], 'Exception' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castException'], 'Error' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castError'], 'Typo3RectorPrefix20210423\\Symfony\\Bridge\\Monolog\\Logger' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\DependencyInjection\\ContainerInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\EventDispatcher\\EventDispatcherInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\HttpClient\\CurlHttpClient' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SymfonyCaster', 'castHttpClient'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\HttpClient\\NativeHttpClient' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SymfonyCaster', 'castHttpClient'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\HttpClient\\Response\\CurlResponse' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SymfonyCaster', 'castHttpClientResponse'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\HttpClient\\Response\\NativeResponse' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SymfonyCaster', 'castHttpClientResponse'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\HttpFoundation\\Request' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SymfonyCaster', 'castRequest'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Exception\\ThrowingCasterException' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castThrowingCasterException'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\TraceStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castTraceStub'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\FrameStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castFrameStub'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Cloner\\AbstractCloner' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\ErrorHandler\\Exception\\SilencedErrorContext' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster', 'castSilencedErrorContext'], 'Typo3RectorPrefix20210423\\Imagine\\Image\\ImageInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ImagineCaster', 'castImage'], 'Typo3RectorPrefix20210423\\Ramsey\\Uuid\\UuidInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\UuidCaster', 'castRamseyUuid'], 'Typo3RectorPrefix20210423\\ProxyManager\\Proxy\\ProxyInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ProxyManagerCaster', 'castProxy'], 'PHPUnit_Framework_MockObject_MockObject' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\PHPUnit\\Framework\\MockObject\\MockObject' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\PHPUnit\\Framework\\MockObject\\Stub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Prophecy\\Prophecy\\ProphecySubjectInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'Typo3RectorPrefix20210423\\Mockery\\MockInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\StubCaster', 'cutInternals'], 'PDO' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\PdoCaster', 'castPdo'], 'PDOStatement' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\PdoCaster', 'castPdoStatement'], 'AMQPConnection' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\AmqpCaster', 'castConnection'], 'AMQPChannel' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\AmqpCaster', 'castChannel'], 'AMQPQueue' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\AmqpCaster', 'castQueue'], 'AMQPExchange' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\AmqpCaster', 'castExchange'], 'AMQPEnvelope' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\AmqpCaster', 'castEnvelope'], 'ArrayObject' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castArrayObject'], 'ArrayIterator' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castArrayIterator'], 'SplDoublyLinkedList' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castDoublyLinkedList'], 'SplFileInfo' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castFileInfo'], 'SplFileObject' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castFileObject'], 'SplHeap' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castHeap'], 'SplObjectStorage' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castObjectStorage'], 'SplPriorityQueue' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castHeap'], 'OuterIterator' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castOuterIterator'], 'WeakReference' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\SplCaster', 'castWeakReference'], 'Redis' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RedisCaster', 'castRedis'], 'RedisArray' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RedisCaster', 'castRedisArray'], 'RedisCluster' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RedisCaster', 'castRedisCluster'], 'DateTimeInterface' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DateCaster', 'castDateTime'], 'DateInterval' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DateCaster', 'castInterval'], 'DateTimeZone' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DateCaster', 'castTimeZone'], 'DatePeriod' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DateCaster', 'castPeriod'], 'GMP' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\GmpCaster', 'castGmp'], 'MessageFormatter' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\IntlCaster', 'castMessageFormatter'], 'NumberFormatter' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\IntlCaster', 'castNumberFormatter'], 'IntlTimeZone' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\IntlCaster', 'castIntlTimeZone'], 'IntlCalendar' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\IntlCaster', 'castIntlCalendar'], 'IntlDateFormatter' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\IntlCaster', 'castIntlDateFormatter'], 'Memcached' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\MemcachedCaster', 'castMemcached'], 'Typo3RectorPrefix20210423\\Ds\\Collection' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DsCaster', 'castCollection'], 'Typo3RectorPrefix20210423\\Ds\\Map' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DsCaster', 'castMap'], 'Typo3RectorPrefix20210423\\Ds\\Pair' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DsCaster', 'castPair'], 'Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DsPairStub' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\DsCaster', 'castPairStub'], 'CurlHandle' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castCurl'], ':curl' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castCurl'], ':dba' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castDba'], ':dba persistent' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castDba'], 'GdImage' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castGd'], ':gd' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castGd'], ':mysql link' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castMysqlLink'], ':pgsql large object' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster', 'castLargeObject'], ':pgsql link' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster', 'castLink'], ':pgsql link persistent' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster', 'castLink'], ':pgsql result' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster', 'castResult'], ':process' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castProcess'], ':stream' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castStream'], 'OpenSSLCertificate' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castOpensslX509'], ':OpenSSL X.509' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castOpensslX509'], ':persistent stream' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castStream'], ':stream-context' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\ResourceCaster', 'castStreamContext'], 'XmlParser' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\XmlResourceCaster', 'castXml'], ':xml' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\XmlResourceCaster', 'castXml'], 'RdKafka' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castRdKafka'], 'Typo3RectorPrefix20210423\\RdKafka\\Conf' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castConf'], 'Typo3RectorPrefix20210423\\RdKafka\\KafkaConsumer' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castKafkaConsumer'], 'Typo3RectorPrefix20210423\\RdKafka\\Metadata\\Broker' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castBrokerMetadata'], 'Typo3RectorPrefix20210423\\RdKafka\\Metadata\\Collection' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castCollectionMetadata'], 'Typo3RectorPrefix20210423\\RdKafka\\Metadata\\Partition' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castPartitionMetadata'], 'Typo3RectorPrefix20210423\\RdKafka\\Metadata\\Topic' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castTopicMetadata'], 'Typo3RectorPrefix20210423\\RdKafka\\Message' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castMessage'], 'Typo3RectorPrefix20210423\\RdKafka\\Topic' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castTopic'], 'Typo3RectorPrefix20210423\\RdKafka\\TopicPartition' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castTopicPartition'], 'Typo3RectorPrefix20210423\\RdKafka\\TopicConf' => ['Typo3RectorPrefix20210423\\Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster', 'castTopicConf']];
    protected $maxItems = 2500;
    protected $maxString = -1;
    protected $minDepth = 1;
    private $casters = [];
    private $prevErrorHandler;
    private $classInfo = [];
    private $filter = 0;
    /**
     * @param callable[]|null $casters A map of casters
     *
     * @see addCasters
     */
    public function __construct(array $casters = null)
    {
        if (null === $casters) {
            $casters = static::$defaultCasters;
        }
        $this->addCasters($casters);
    }
    /**
     * Adds casters for resources and objects.
     *
     * Maps resources or objects types to a callback.
     * Types are in the key, with a callable caster for value.
     * Resource types are to be prefixed with a `:`,
     * see e.g. static::$defaultCasters.
     *
     * @param callable[] $casters A map of casters
     */
    public function addCasters(array $casters)
    {
        foreach ($casters as $type => $callback) {
            $this->casters[$type][] = $callback;
        }
    }
    /**
     * Sets the maximum number of items to clone past the minimum depth in nested structures.
     */
    public function setMaxItems(int $maxItems)
    {
        $this->maxItems = $maxItems;
    }
    /**
     * Sets the maximum cloned length for strings.
     */
    public function setMaxString(int $maxString)
    {
        $this->maxString = $maxString;
    }
    /**
     * Sets the minimum tree depth where we are guaranteed to clone all the items.  After this
     * depth is reached, only setMaxItems items will be cloned.
     */
    public function setMinDepth(int $minDepth)
    {
        $this->minDepth = $minDepth;
    }
    /**
     * Clones a PHP variable.
     *
     * @param mixed $var    Any PHP variable
     * @param int   $filter A bit field of Caster::EXCLUDE_* constants
     *
     * @return Data The cloned variable represented by a Data object
     */
    public function cloneVar($var, int $filter = 0)
    {
        $this->prevErrorHandler = \set_error_handler(function ($type, $msg, $file, $line, $context = []) {
            if (\E_RECOVERABLE_ERROR === $type || \E_USER_ERROR === $type) {
                // Cloner never dies
                throw new \ErrorException($msg, 0, $type, $file, $line);
            }
            if ($this->prevErrorHandler) {
                return ($this->prevErrorHandler)($type, $msg, $file, $line, $context);
            }
            return \false;
        });
        $this->filter = $filter;
        if ($gc = \gc_enabled()) {
            \gc_disable();
        }
        try {
            return new \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\Data($this->doClone($var));
        } finally {
            if ($gc) {
                \gc_enable();
            }
            \restore_error_handler();
            $this->prevErrorHandler = null;
        }
    }
    /**
     * Effectively clones the PHP variable.
     *
     * @param mixed $var Any PHP variable
     *
     * @return array The cloned variable represented in an array
     */
    protected abstract function doClone($var);
    /**
     * Casts an object to an array representation.
     *
     * @param bool $isNested True if the object is nested in the dumped structure
     *
     * @return array The object casted as array
     */
    protected function castObject(\Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested)
    {
        $obj = $stub->value;
        $class = $stub->class;
        if (\PHP_VERSION_ID < 80000 ? "\0" === ($class[15] ?? null) : \false !== \strpos($class, "@anonymous\0")) {
            $stub->class = \get_debug_type($obj);
        }
        if (isset($this->classInfo[$class])) {
            [$i, $parents, $hasDebugInfo, $fileInfo] = $this->classInfo[$class];
        } else {
            $i = 2;
            $parents = [$class];
            $hasDebugInfo = \method_exists($class, '__debugInfo');
            foreach (\class_parents($class) as $p) {
                $parents[] = $p;
                ++$i;
            }
            foreach (\class_implements($class) as $p) {
                $parents[] = $p;
                ++$i;
            }
            $parents[] = '*';
            $r = new \ReflectionClass($class);
            $fileInfo = $r->isInternal() || $r->isSubclassOf(\Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\Stub::class) ? [] : ['file' => $r->getFileName(), 'line' => $r->getStartLine()];
            $this->classInfo[$class] = [$i, $parents, $hasDebugInfo, $fileInfo];
        }
        $stub->attr += $fileInfo;
        $a = \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Caster\Caster::castObject($obj, $class, $hasDebugInfo, $stub->class);
        try {
            while ($i--) {
                if (!empty($this->casters[$p = $parents[$i]])) {
                    foreach ($this->casters[$p] as $callback) {
                        $a = $callback($obj, $a, $stub, $isNested, $this->filter);
                    }
                }
            }
        } catch (\Exception $e) {
            $a = [(\Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\Stub::TYPE_OBJECT === $stub->type ? \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL : '') . '⚠' => new \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Exception\ThrowingCasterException($e)] + $a;
        }
        return $a;
    }
    /**
     * Casts a resource to an array representation.
     *
     * @param bool $isNested True if the object is nested in the dumped structure
     *
     * @return array The resource casted as array
     */
    protected function castResource(\Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested)
    {
        $a = [];
        $res = $stub->value;
        $type = $stub->class;
        try {
            if (!empty($this->casters[':' . $type])) {
                foreach ($this->casters[':' . $type] as $callback) {
                    $a = $callback($res, $a, $stub, $isNested, $this->filter);
                }
            }
        } catch (\Exception $e) {
            $a = [(\Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Cloner\Stub::TYPE_OBJECT === $stub->type ? \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL : '') . '⚠' => new \Typo3RectorPrefix20210423\Symfony\Component\VarDumper\Exception\ThrowingCasterException($e)] + $a;
        }
        return $a;
    }
}
