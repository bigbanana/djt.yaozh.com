<?php
$b = include "./Application/Common/Conf/upload.php";
$a = array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST' => array('Home','Admin'),
	'DEFAULT_MODULE' => 'Home',
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'rdsrvaz2ervaz2e.mysql.rds.aliyuncs.com',
	'DB_NAME' => 'club',
	'DB_USER' => 'sqluser',
	'DB_PWD' => 'kangzhou008',
	'DB_PREFIX' => 'yzclub_',
	/* 模板界定符设置 */
    'TMPL_L_DELIM' => '<{',
    'TMPL_R_DELIM' => '}>',
    /* OSS常规配置 */
    'OSS_ACCESS_ID'=>'I4F7QqQA0hte5UNH',
    'OSS_ACCESS_KEY'=>'cujGzhjPzO1s0GSx700VeC2sLJ9pXX',
    'ALI_LOG'=>FALSE,
    'ALI_DISPLAY_LOG'=>FALSE,
    'ALI_LANG'=>'zh',
    'BUCKET'=>'yzclub',
    'URL'=>'http://img.club.yaozh.com/',
    'CACHE_TIME' => 1, // 缓存时间，单位为小时,
    'UPLOAD_CONFIG' => $b,
);
return $a;