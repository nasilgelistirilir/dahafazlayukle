# dahafazlayukle
jQuery ve PHP kullanarak sayfayı yenilemeden daha eski verileri yükleme.

https://www.nasilgelistirilir.com/blog-12--Jquery-ve-Php-ile-Daha-Fazla-Veri-Yukle-Yapimi.html

Bu projede jQuery ve php kullanarak sayfayı yenilemeden daha eski verileri yüklemeyi yapacağız. Infinite scrolling (sonsuz kaydırma) özelliği ile aynı tek fark kullanıcı daha fazla veri yüklemek isterse yükleme butonuna kendisi basıyor. Bu örneği olabildiğince sade bir biçimde yapacağım jQuery kütüphanesi dışında ek hiçbir şey kullanmanıza gerek yok o yüzden yazıyı da jQuery kategorisine ekliyorum. 

Öncelikle sayfamıza belli bir miktar veriyi çekmeliyiz çünkü sayfa ilk yüklendiğinde son eklenen veriler gözükmeli aksi takdirde boş bir sayfa olacak bu yüzden aşağıdaki php kodlarıyla sayfa 10 adet veri çekiyoruz.

index.php
<?php 
$sorgu=mysql_query("Select * from tablo_adi order by id desc limit 10"); 
while($yazdir=mysql_fetch_array($sorgu)) 
{ 
    echo $yazdir["baslik"]."<br/>"; 
} 
?> 
<div class="veriler"></div> 
<a id="yukle" href="#">Daha Fazla Yükle</a>

Yukarıda çektirdiğimiz bu 10 kadar verinin altına üzerinde "Daha Fazla Yükle" yazan bir link koyduk. Bu linke tıklandığında aşağıdaki javascript kodu yukle.php dosyasına limit değerini göndericek ve geri daha eski verileri getirp yukarıdaki veriler adlı dive yazdırıcak. Index.php dosyamıza devam ediyoruz.

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


yukle.php
<?php 
$limit=$_POST["limit"]; 
$sorgu=mysql_query("Select * from tablo_adi order by id desc limit $limit,$limit"); 
while($yazdir=mysql_fetch_array($sorgu)) 
{ 
    echo $yazdir["baslik"]."<br/>"; 
} 
?> 

Bizim sitemizde de blog yazılarının artmasıyla yakın zamanda bu şekilde bir güncelleme yapmayı düşünüyorum. Oldukça kullanışlı bir kod.
