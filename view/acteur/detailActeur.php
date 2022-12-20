<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/detail/detailAR.css">

<?php
$acteur = $requeteActeur->fetch();
?>
<div class="t_ar"><div class="titleL"> <div class="titleL_inner"></div> </div> <div class="title"><?= $acteur ["prenom"]." ".$acteur ["nom"]  ?></div> <div class="titleR"><div class="titleR_inner"></div></div></div>

<h2><?= "Est ";
    if($acteur ["sexe"] == 'homme'){
        echo "un Homme de ".$acteur ["age"]."ans, Il a joué dans les films :";
    }else{
        echo "une Femme de ".$acteur ["age"]."ans, elle a joué dans les films :";
    }?></h2>

<div id="t_detail_AR">
<?php
    foreach($requeteFilm->fetchAll() as $film) { 
    ?>
    <div class="ar">
    <table>
        <tbody>
            <tr>
                <td rowspan="5" colspan="2"> <div class="pos">
                <a href="<?= "./index.php?action=detailFilm&id=".$film['id_film']?>"><img src="<?= $film["affiche"]?>"></a>
                <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                <td colspan="2"> <div class="spacer"></div></td>
            <tr>
                <td class="table_txt_bg" colspan="3"> <div class="table_txt"> <?= $film["titre"]?></div></td>
                <td colspan="2" rowspan="3"><div class="end"><div class="end_inner"></div></div></td> 
            <tr>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $film["annee"]?></div></td>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $film["duree"]?></div></td>
                <td class="table_detail_bg"> <div class="table_txt"> <?php 
                    $n = intval($film["note"]);
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

$titre = "Detail Acteur";
$titre_secondaire = "Detail Acteur";
$contenu = ob_get_clean();
require "view/template.php";