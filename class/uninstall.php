<?php
    $sqls = array();
    $sqls[] = 'DROP  TABLE IF EXISTS '._DB_PREFIX_.'map_config';
foreach($sqls as $sql)
{
    if(!DB::getInstance()->execute($sql))
        return false;
}