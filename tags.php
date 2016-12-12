<?php
$values = '';
$result = mysql_query("SELECT tags FROM news");
while($row = mysql_fetch_array($result))
    $values .= $row['tags']." ";

$values = explode(' ', $values);
$values=(array_count_values($values));

array_multisort($values, SORT_DESC);
$values=array_slice($values, 0,10);

//Разнообразные теги
   $randomized_keys = array_rand($values, count($values));
   foreach($randomized_keys as $current_key) {
   $values2[$current_key] = $values[$current_key]; 
   }

//Увеличение размера тега
foreach ($values2 as $name=>$value)
{
$kolk+=$value;
$ss+=1;
}

//Вывод тегов
foreach ($values2 as $name=>$value)
{
$size=$tagsize*$value/$kolk;
echo "<font size='$size'><a href='$urlweb/?site=search&keyword=$name'>$name</a></font> ";
}
?>