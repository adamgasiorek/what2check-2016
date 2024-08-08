$.post("php/wstaw/wadeizalete.php",
	{
		mojeID : JA_ID,
		dzieloID: STRONA_ID,
		idwstawianego: valuedata.id
	});


include('php/pobierz/mojeTagi.php');

// $rows = $operacja -> rowCount();



// <div class="card gridzik" style="background-color:black;" >
// 	<div class="image">'+
// 	<img class="gridzikimg img-responsive" src="'+obrazekAdres(true,obiekt.id_dziela)+'">
// 	</div>
//
// 	<div class="tytulik" style="font-size: 200%;">
//
//
// 	<a style="color:inherit;" href="'+intnakat(obiekt.kategoria)+".php?id="+obiekt.id_dziela+'">
// 	<div class="ui header grey inverted tytulikheader" style="cursor:pointer">
// 	tlumaczenie(obiekt.id_dziela,2)
// 	<div style="font-size: 50%;">2016</div>
// 	</div>
// 	</a>
// 	</div>
// 	<div class="Buttoniki ui fluid buttons compact grey" style="position: absolute;bottom: 0;">
// 	<div class="ui icon button" >
// 	<i class="icon star yellow"></i><span class="ocenadopor">7.1</span>
// 	</div>
// 	<div class="ui icon button">
// 	<i class="icon unhide black"></i><span class="wysdopor"> <span class="ocenadopor">50</span>K
// 	</div>
// 	<div class="ui button">
// 	<i class="icon signal"></i><span class="jakoscdopor">70</span>%
// 	</div>
// 	</div>
// 	</div>


// <?php
// //TYPOWY PRZYCISK PLUS CZY MINUS
// $rodzaj = 2;
// $idek = $wynik['id_oceny'];
//                 $ilosc = include('php/pobierz/plusczyminusSUM.php');
//                 $mojareakcja = include('php/pobierz/plusczyminusREAKCJA.php');;
//                 ?>
//                 <button class="likq ui <?php echo $mojareakcja; ?> basic button" style="position: relative;bottom: 5px;" >
//                     <span class="ilosc" ><?php echo $ilosc['sumka'] ?? 0; ?></span >
//                     <span class="rodzaj" style="display:none" ><?php echo $rodzaj; ?></span >
//                     <span class="idek" style="display:none" ><?php echo $idek; ?></span >
//                 </button >







// <?php
// $operacja = $polaczenie->prepare("SELECT id_dziela,kategoria FROM dzielo_dane LIMIT 100");
// $operacja->execute();
// $wyniki = $operacja->fetchAll(PDO::FETCH_ASSOC);
//
// for($i=0;$i<10;$i++)
// {
// 	foreach ($wyniki as $wynik) {
//
// 	?>
// 	<div class="gridzik grid-item data-<?php echo $wynik["kategoria"];?> " style="background-color:black;" >
// 	<div  class="image">
// 	<img class="gridzikimg img-responsive" src="<?php echo obrazekAdres(true,$wynik['id_dziela']); ?>">
// 	</div>
//
// 	<div class="tytulik" style="font-size: 200%;">
//
//
// 	<a style="color:inherit;" href="<?php echo intToKategoria(idToKategoria($wynik['id_dziela'])).'.php?id='.$wynik['id_dziela']; ?>">
// 	<div class="ui header grey inverted tytulikheader" style="cursor:pointer">
// 	<?php echo tlumaczenie($wynik['id_dziela'],2); ?>
// 	<div style="font-size: 50%;">2016</div>
// 	</div>
// 	</a>
// 	</div>
// 	<div class="Buttoniki ui fluid buttons compact grey" style="position: absolute;bottom: 0;">
// 	<div class="ui icon button" >
// 	<i class="icon star yellow"></i><span class="ocenadopor"><?php echo rand(0, 100)/ 10; ?></span>
// 	</div>
// 	<div class="ui icon button">
// 	<i class="icon unhide black"></i><span class="wysdopor"> <span class="ocenadopor"><?php echo rand(0, 100); ?></span>K
// 	</div>
// 	<div class="ui button">
// 	<i class="icon signal"></i><span class="jakoscdopor"><?php echo rand(0, 100); ?></span>%
// 	</div>
// 	</div>
// 	</div>
//
// 	<?php
//
// 	}
//
// 	}
//
// ?>