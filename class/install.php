<?php
    $sqls = array();
    $sqls[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'map_config (
        name VARCHAR(50),
        api_key VARCHAR(100),
        title_content_left_ts VARCHAR(100),
        text_content_left_ts VARCHAR(500),
        title_content_right_ts VARCHAR(100),
        text_content_right_ts VARCHAR(500),
        title_content_left_sp VARCHAR(100),
        text_content_left_sp VARCHAR(500),
        title_content_right_sp VARCHAR(100),
        text_content_right_sp VARCHAR(500)
    ) ENGINE ='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8';

    foreach($sqls as $sql)
    {
        if(!DB::getInstance()->execute($sql))
            return false;
    }
    $datos = array(
        'name' => '__DATA__MAP__GOO__'
    );
    $tableConfig = 'map_config';
    $ans = DB::getInstance()->insert(
        $tableConfig,
        $datos 
    );