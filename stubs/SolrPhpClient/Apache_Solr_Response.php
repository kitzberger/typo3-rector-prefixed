<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Apache_Solr_Response::class)) {
    return;
}
class Apache_Solr_Response
{
}
\class_alias('Apache_Solr_Response', 'Apache_Solr_Response', \false);
