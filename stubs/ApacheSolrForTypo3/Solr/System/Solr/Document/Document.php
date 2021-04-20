<?php

declare (strict_types=1);


if (\class_exists(\ApacheSolrForTypo3\Solr\System\Solr\Document\Document::class)) {
    return;
}
final class Document
{
    public function __set($name, $value)
    {
    }
    public function __get($name)
    {
    }
    public function __unset($name)
    {
    }
    public function addField($key, $value, $boost = null, $modifier = null) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function setField($key, $value, $boost = null, $modifier = null) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function removeField($key) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function getFieldBoost($key) : ?float
    {
        return null;
    }
    public function setFieldBoost($key, $boost) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function getFieldBoosts() : array
    {
        return [];
    }
    public function setBoost($boost) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function getBoost() : ?float
    {
        return null;
    }
    public function clear() : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function setKey($key, $value = null) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function setFieldModifier($key, $modifier = null) : \ApacheSolrForTypo3\Solr\System\Solr\Document\Document
    {
        return $this;
    }
    public function getFields() : array
    {
        return [];
    }
}
