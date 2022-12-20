<?php ob_start(); ?>


<link rel="stylesheet" href="./public/css/detail/detailG.css">

<?php

$genre = $Genre->fetch();
$genre = $genre["nom_genre"];
?>
<div class="t_genre"><div class="titleL"> <div class="titleL_inner"></div> </div> <div class="title"><?= $genre ?></div> <div class="titleR"><div class="titleR_inner"></div></div></div>



<div id="t_detail_G">
<?php
    foreach($requeteGenre->fetchAll() as $genre) { 
    ?>
    <div class="genre">
    <table>
        <tbody>
            <tr>
                <td rowspan="5" colspan="2"> <div class="pos">
                <a href="<?= "./index.php?action=detailFilm&id=".$genre['id_film']?>"><img src="<?= $genre["affiche"]?>"></a>
                <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                <td colspan="2"> <div class="spacer"></div></td>
            <tr>
                <td class="table_txt_bg" colspan="3"> <div class="table_txt"> <?= $genre["titre"]?></div></td>
                <td colspan="2" rowspan="3"><div class="end"><div class="end_inner"></div></div></td> 
            <tr>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $genre["annee"]?></div></td>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $genre["duree"]?></div></td>
                <td class="table_detail_bg"> <div class="table_txt"> <?php 
                    $n = intval($genre["note"]);
                    $i = 5; 
                    while($i > 0){
                        if($n > 0){
                            echo "★";
                        }else{
                            echo "☆";
                        }
                        $i--;
                        $n--;
                    };?></div></td>
            <tr>
                <td colspan="2"> <div class="table_txt_bg"></div></td>
            <tr>
                <td colspan="2"> <div class="spacer"></div></td>
            </tr>
            </tr>
            </tr>
            </tr>
        </tbody>
    </table>
    </div>
    <?php } ?>
</div>
<?php

$titre = "Film par genre";
$titre_secondaire = "Genre :";
$contenu = ob_get_clean();
require "view/template.php";