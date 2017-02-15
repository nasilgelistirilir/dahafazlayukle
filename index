<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script> 
$(document).ready(function() { 
    var limit=0; 
    $("#yukle").click(function(event) 
    { 
        limit+=10; 
        $.post("yukle.php",{limit:limit},function(data) { 
            $(".veriler").append(data); 
        }); 
        event.preventDefault(); 
    }); 
}); 
</script> 
?php 
$sorgu=mysql_query("Select * from tablo_adi order by id desc limit 10"); 
while($yazdir=mysql_fetch_array($sorgu)) 
{ 
    echo $yazdir["baslik"]."<br/>"; 
} 
?> 
<div class="veriler"></div> 
<a id="yukle" href="#">Daha Fazla Yükle</a>
