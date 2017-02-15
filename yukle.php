<?php 
$limit=$_POST["limit"]; 
$sorgu=mysql_query("Select * from tablo_adi order by id desc limit $limit,$limit"); 
while($yazdir=mysql_fetch_array($sorgu)) 
{ 
    echo $yazdir["baslik"]."<br/>"; 
} 
?> 
