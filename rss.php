<?


function cleanText($intext) 
{
    return utf8_encode(
    htmlspecialchars(
    stripslashes($intext)));
}

header("Content-Type: text/xml;charset=utf-8");

include ('config.php');
$db = mysql_pconnect("$host", "$usernamedb", "$passworddb");


if (!$db)
{
   error_log("Error: Could not connect to database in rss.php.");
   exit;
}

mysql_select_db("$base");

$result1=mysql_query("SELECT * FROM news ORDER by id DESC LIMIT 5") or die(mysql_error());
$phpversion = phpversion();

ECHO <<<END
<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
   <channel>
      <title>$title</title>
      <link>$urlweb</link>
      <description>$description</description>
      <language>en-us</language>
      <docs>$urlweb</docs>
      <generator>PHP/$phpversion</generator>
END;


for ($i = 0; $i < mysql_num_rows($result1); $i++) 
	{
   @$row = mysql_fetch_array($result1);
   $title = cleanText($row["title"]);
   $description = cleanText($row["text"]);
   $guid = $row["title"];
   $id= $row["id"];
   $pubDate = date("r", $row[time]);
	$urle=$urlweb."/?site=news&id=".$id;
ECHO <<<END

      <item>
         <title>$title</title>
         <link>$urlweb</link>
         <description>$description</description>
         <pubDate>$pubDate</pubDate>
         <guid isPermaLink="false">$guid</guid>
      </item>
END;

}

ECHO <<<END

   </channel>
</rss>
END;

?>