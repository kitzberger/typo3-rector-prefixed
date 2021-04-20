<?php

declare (strict_types=1);


if (\class_exists(\Typo3RectorPrefix20210420\Apache_Solr_Response::class)) {
    return;
}
final class Apache_Solr_Response
{
}
\class_alias('Apache_Solr_Response', 'Apache_Solr_Response', \false);
