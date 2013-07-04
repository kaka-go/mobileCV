<html>
<head></head>
<body>
<?php
$services_json = json_decode(getenv("VCAP_SERVICES"),true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
$username = $mysql_config["username"];
$password = $mysql_config["password"];
$hostname = $mysql_config["hostname"];
$port = $mysql_config["port"];
$db = $mysql_config["name"];
$link = mysql_connect("$hostname:$port", $username, $password);
$db_selected = mysql_select_db($db, $link);

if (!$link){
  print('Could not connect: ' . mysql_error());
}
if (!$db_selected){
  print("Can\'t use test_db : " . mysql_error());
}
mysql_close($con);

echo $username.$password.$hostname."<br />";

$name = $services_json["mysql-5.1"][0]["name"];
echo $name."<br />";

var_dump($services_json);
print_r($services_json);
/*

{"mysql-5.1":[
    {
        "name":"mysql-4f700",
        "label":"mysql-5.1",
        "plan":"free",
        "tags":["mysql","mysql-5.1","relational"],
        "credentials":{
            "name":"d6d665aa69817406d8901cd145e05e3c6",
            "hostname":"mysql-node01.us-east-1.aws.af.cm",
            "host":"mysql-node01.us-east-1.aws.af.cm",
            "port":3306,
            "user":"uB7CoL4Hxv9Ny",
            "username":"uB7CoL4Hxv9Ny",
            "password":"pzAx0iaOp2yKB"
        }
    },
    {
        "name":"mysql-f1a13",
        "label":"mysql-5.1",
        "plan":"free",
        "tags":["mysql","mysql-5.1","relational"],
        "credentials":{
            "name":"db777ab9da32047d99dd6cdae3aafebda",
            "hostname":"mysql-node01.us-east-1.aws.af.cm",
            "host":"mysql-node01.us-east-1.aws.af.cm",
            "port":3306,
            "user":"uJHApvZF6JBqT",
            "username":"uJHApvZF6JBqT",
            "password":"p146KmfkqGYmi"
        }
    }
]}

*/
?>

<?php
phpinfo();
?>

</body>
</html>
