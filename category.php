<?
$_GET[cat]=str_replace("'","\'",$_GET[cat]);
echo "<b>$_GET[cat]</b><br><br>";
$select2=mysql_query("SELECT * FROM news WHERE cat='$_GET[cat]'") or die(mysql_error());
$select=mysql_query("SELECT * FROM news WHERE cat='$_GET[cat]' ORDER by id DESC LIMIT $yz, $num") or die(mysql_error());
while($news=mysql_fetch_array($select))
{
writenews($news);
}
categorystrani($x, $select2, $num, $_GET[cat])
?>