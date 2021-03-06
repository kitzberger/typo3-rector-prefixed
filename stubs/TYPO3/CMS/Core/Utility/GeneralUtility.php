<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Utility;

if (\class_exists(\TYPO3\CMS\Core\Utility\GeneralUtility::class)) {
    return;
}
class GeneralUtility
{
    const SYSLOG_SEVERITY_INFO = 0;
    const SYSLOG_SEVERITY_NOTICE = 1;
    const SYSLOG_SEVERITY_WARNING = 2;
    const SYSLOG_SEVERITY_ERROR = 3;
    const SYSLOG_SEVERITY_FATAL = 4;
    public static function getApplicationContext() : void
    {
    }
    /**
     * @return object
     */
    public static function makeInstance(string $class, ...$constructorArguments)
    {
        return new $class(...$constructorArguments);
    }
    public static function getUserObj(string $class) : void
    {
    }
    public static function getIndpEnv(string $var) : string
    {
        return 'foo';
    }
    public static function mkdir_deep(string $folder)
    {
        return 'foo';
    }
    public static function explodeUrl2Array($string, $multidim = null) : string
    {
        return 'foo';
    }
    public static function logDeprecatedFunction() : string
    {
        return 'foo';
    }
    public static function logDeprecatedViewHelperAttribute() : string
    {
        return 'foo';
    }
    public static function deprecationLog(string $message) : string
    {
        return $message ?? '';
    }
    public static function getDeprecationLogFileName() : string
    {
        return 'foo';
    }
    public static function makeInstanceService($serviceType, $serviceSubType = '', $excludeServiceKeys = []) : string
    {
        return 'foo';
    }
    public static function trimExplode($delim, $string, $removeEmptyValues = \false, $limit = 0) : array
    {
        return [];
    }
    public static function idnaEncode($value) : string
    {
        return 'foo';
    }
    public static function isRunningOnCgiServerApi() : bool
    {
        return \false;
    }
    public static function getUrl($url, $includeHeader = 0, $requestHeaders = null, &$report = null) : void
    {
    }
    public static function IPv6Hex2Bin(string $hex) : string
    {
        return '';
    }
    public static function IPv6Bin2Hex(string $bin) : string
    {
        return '';
    }
    public static function compressIPv6(string $address) : string
    {
        return '';
    }
    public static function milliseconds() : int
    {
        return 1;
    }
    public static function intExplode($delimiter, $limit) : array
    {
        return [];
    }
    public static function verifyFilenameAgainstDenyPattern($filename) : void
    {
    }
    public static function getFileAbsFileName($filename) : void
    {
    }
    public static function generateRandomBytes($bytesToReturn) : string
    {
        return 'bytes';
    }
    public static function getRandomHexString($count) : string
    {
        return 'hex';
    }
    public static function requireOnce($requireFile) : void
    {
    }
    public static function requireFile($requireFile) : void
    {
    }
    public static function strtoupper($str) : string
    {
        return 'FOO';
    }
    public static function strtolower($str) : string
    {
        return 'foo';
    }
    public static function loadTCA() : void
    {
    }
    public static function int_from_ver($verNumberStr) : int
    {
        return 1;
    }
    public static function array2xml_cs(array $array, $docTag = 'phparray', array $options = [], $charset = '') : string
    {
        // Set default charset unless explicitly specified
        $charset = $charset ?: 'utf-8';
        // Return XML:
        return '<?xml version="1.0" encoding="' . \htmlspecialchars($charset) . '" standalone="yes" ?>' . LF . self::array2xml($array, '', 0, $docTag, 0, $options);
    }
    public static function array2xml(array $array, $NSprefix = '', $level = 0, $docTag = 'phparray', $spaceInd = 0, array $options = [], array $stackData = []) : string
    {
        return 'xml';
    }
    public static function csvValues(array $row, $delim = ',', $quote = '"') : void
    {
    }
    public static function compat_version() : void
    {
    }
    public static function convertMicrotime() : void
    {
    }
    public static function deHSCentities() : void
    {
    }
    public static function slashJS() : void
    {
    }
    public static function rawUrlEncodeJS() : void
    {
    }
    public static function rawUrlEncodeFP() : void
    {
    }
    public static function lcfirst() : void
    {
    }
    public static function getMaximumPathLength() : void
    {
    }
    public static function wrapJS($string, $_ = null) : void
    {
    }
    public static function readLLfile($fileRef, $langKey, $charset = '', $errorMode = 0) : void
    {
    }
    public static function isFirstPartOfStr($str, $partStr)
    {
    }
    public static function implodeArrayForUrl(string $string, $cHash_array) : string
    {
        return 'foo';
    }
    public static function cmpIP(string $getIndpEnv, $devIPmask) : bool
    {
        return \false;
    }
    public static function uniqueList($in_list, $secondParameter = null)
    {
        return [];
    }
    public static function devLog($msg, $extKey, $severity = 0, $dataVar = \false)
    {
    }
    public static function sysLog($msg, $extKey, $severity = 0)
    {
    }
    public static function initSysLog()
    {
    }
}
