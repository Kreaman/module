<?
$select2=mysql_query("SELECT * FROM news WHERE main='1'") or die(mysql_error());
$select=mysql_query("SELECT * FROM news WHERE main='1' ORDER by id DESC LIMIT $yz, $num") or die(mysql_error());
while($news=mysql_fetch_array($select))
{
writenews($news);
}
strani($x, $select2, $num)
?>