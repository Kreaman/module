<?

$keyword=$_GET[keyword];
if (isset($_POST[keyword]))
{
$keyword=$_POST[keyword];
}
$keyword=str_replace("'","\'",$keyword);
echo "Results for $keyword<br><br>";
$story=mysql_query("SELECT * FROM news WHERE text LIKE '%$keyword%' OR tags LIKE '%$keyword%' OR title LIKE '%$keyword%'");

$story1=mysql_query("SELECT * FROM news WHERE text LIKE '%$keyword%' OR tags LIKE '%$keyword%' OR title LIKE '%$keyword%' ORDER by ID desc LIMIT $yz, $num");
while ($stor=mysql_fetch_array($story1))
{
writenews($stor);
}

strani($x, $story, $num)
?>
<br />
Ничего не нашли?<br />
<form id="search_engine" method="post" action="<? echo $urlweb; ?>/?site=search" accept-charset="UTF-8">
<p>
<input class="searchfield" name="keyword" type="text" id="keywords" value="Search Keywords" onfocus="document.forms['search_engine'].keywords.value='';" onblur="if (document.forms['search_engine'].keywords.value == '') document.forms['search_engine'].keywords.value='Search Keywords';" />
<input class="searchbutton" name="submit" type="submit" value="Search" /></p>
</form>