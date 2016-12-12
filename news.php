<?
if($_POST[text]<>'')
{
$_POST[name]=substr (htmlspecialchars (stripcslashes($_POST[name]),ENT_QUOTES ),0,64); #len of name <=64
$_POST[text]=substr (htmlspecialchars (stripcslashes($_POST[text]),ENT_QUOTES ),0,1024); #len of text <=1024
$vstavi=mysql_query("INSERT INTO comments(id, name, text, newsid, time) VALUES('','$_POST[name]','$_POST[text]','$_GET[id]','$time')") or die(mysql_error());
}
if(isset($_GET[rating]))
{

}
if(!is_numeric($_GET[id]))
{
exit("Попытка взлома неудалась :P");
}

$query=mysql_query("SELECT * FROM news WHERE id='$_GET[id]'");
$news=mysql_fetch_array($query);

writenews($news);
rate($_GET[id]);

comment();
$comments=mysql_query("SELECT * FROM comments WHERE newsid='$_GET[id]'ORDER by id DESC LIMIT $yz, 10 ");
while ($comment=mysql_fetch_array($comments))
{
writecomment($comment);
}

stranikomentarjev($x, $comments, $num, $_GET[id])
?>