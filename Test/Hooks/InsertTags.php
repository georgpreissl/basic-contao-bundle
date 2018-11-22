<?php

/**
 * Contao Open Source CMS
 */

namespace DeinName\Test;



class MyClass extends \Frontend
{
    public function myReplaceInsertTags($strTag)
    {
        // Parameter abtrennen
        $arrSplit = explode('::', $strTag);

        if ($arrSplit[0] != 'foo' && $arrSplit[0] != 'cache_foo')
        {
            //nicht unser Insert-Tag
            return false;
        }
        // Parameter angegeben?
        if (isset($arrSplit[1]) && $arrSplit[1] == 'bar')
        {
            return 'Parameter bar';
        } else {
            return 'Fehler! foo ohne Parameter!';
        }
    }
}
