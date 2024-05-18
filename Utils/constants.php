<!-- $connector=['mysqli:'

,'pgsql:'=>[
    "connect"=>'pgsql:',
    "prepare"=>"pg_execute()",
    "execute"=>""
] -->
<?
define("BASE_PATH", dirname(__DIR__));

define ("CONNECT_DB" ,'pgsql:');
define ("PREPARE_QUERY" ,'pg_prepare()');
define ("EXECUTE_QUERY" ,'pg_execute()');
