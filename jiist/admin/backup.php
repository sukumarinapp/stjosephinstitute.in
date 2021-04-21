<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";

$database = $mysql_database;
$user = $mysql_user;
$pass = $mysql_password;
$host = $mysql_hostname;

# create directory backup
# chmod -R 775 backup 
# chown -R www-data backup

$dir = dirname(__FILE__) . '/backup/dump.sql';

echo "<h3>Backing up database to `<code>backup/dump.sql</code>`</h3>";

exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<a download="<?php echo $database; ?>.sql" href="backup/dump.sql" >Download Database Backup</a>	
</body>
</html>

