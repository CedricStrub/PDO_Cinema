<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/list/listF.css">

<div id="t_list_F">
<?php
    foreach($requeteFilms->fetchAll() as $film) { ?>
    <table>
        <tbody>
            <tr>       
                <td rowspan="5" colspan="2"> <div class="pos">
                    <a href="<?= "./index.php?action=detailFilm&id=".$film['id_film']?>"><img src="<?= $film["affiche"]?>"></a>
                    <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                <td colspan="2"> <div class="spacer"></div></td>
            <tr>
                <td class="table_txt_bg" colspan="3"> <div class="titre_txt limit_t"> <?= $film["titre"]?></div></td>
                <td rowspan="3" colspan="2"><div class="end"><div class="end_inner1"></div></div></td> 
            <tr>
                
                <td class="table_txt_bg"><div class="film_txt"><?= $film["annee_sortie_france"]?></div></td>
                <td class="table_txt_bg"><div class="film_txt"><?= $film["duree"]?></div></td>
                <td class="table_txt_bg"><div class="film_txt"><?php 
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
                <td class="table_txt_bg" colspan="3"><p class="synopsis_txt limit_s"><?= $film["synopsis"]?></p></td>
            <tr>
                <td colspan="3"> <div class="spacer"> <div class="real">
                <table>
                    <tbody>
                        <tr>
                            <td rowspan="3" colspan="2"> <div class="pos1">
                                <a href="<?= "./index.php?action=detailRealisateur&id=".$film['id_realisateur']?>"><img src="<?= $film["portrait"]?>"></a>
                                <div class="demi_bg1"></div><div class="rhombus1"></div><div class="inner1"></div></div></td> 
                            <td colspan="2"> <div class="spacer1"></div></td>
                        <tr>
                            <td class="table_txt_bg1"> <div class="table_txt1"> <?= $film["prenom"]?></div></td>
                            <td class="table_txt_bg1"><div class="table_txt1"><?= $film["nom"]?></div></td>
                            <td colspan="2"><div class="end1"><div class="end_inner1"></div></div></td> 
                        <tr>
                            <td colspan="2"> <div class="spacer1"></div></td>
                        </tr>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                </div></div></td>
            </tr>
            </tr>
            </tr>
            </tr>
            </tr>
        </tbody>
    </table>
    <div class="spacer_tab"></div>
    <?php } ?>
</div>
<div class="spacer_w"></div>


<?php

$titre = "Liste des films";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";