<?php ob_start(); ?>
<div class="space"></div>
<div id="film">
<link rel="stylesheet" href="./public/css/detail/detailF.css">

<?php $film = $requeteFilm->fetch() ?>

<table>
    <tbody>
        <tr>
            <td> <div class="shape1"></div></td>
            <td> <div class="borderW1"></div></td>
            <td colspan="2"> <div class="shape2"></div></td>
        <tr>
            <td rowspan="7"> <div class="borderH1"></div></td>
            <td rowspan="2"> <div class="titre_bg"> <div class="titre"><?= $film["titre"]?></div></div></td>
            <td colspan="2"> <div class="square"></div></td>
            <td> <div class="borderW1"></div></td>
            <td colspan="2"> <div class="shape2"></div></td>
        <tr>
            <td colspan="2"> <div class="square"></div></td>
            <td> <div class="titre_info_bg"><div class="titre_info">Information :</div></div></td>    
            <td colspan="2"> <div class="square"></div></td>
            <td> <div class="borderW1"></div></td>
            <td> <div class="shape2"></div></td>
        <tr>    
            <td colspan="2" rowspan="5"> <div class="affiche"><img src="<?= $film["affiche"]?>"></div></td>
            <td rowspan="2"> <div class="spacerW25"></div></td>
            <td colspan="2" rowspan="2"> <div class="bg"> <div class="cadre_info">
            <table>
                <tbody>
                    <tr>
                        <td> <div class="shape1 colorP"></div></td>
                        <td colspan="2"> <div class="borderW3 colorP"></div></td>
                        <td> <div class="shape2 colorP"></div></td>
                    <tr>
                        <td rowspan="2"> <div class="borderH3 colorP "></div></td>
                        <td class="colorP"> <div class="txt_info_bg colorP txt_info_offset"> <div class="txt_info"><?= $film["annee"]?></div></div></td>
                        <td > <div class="txt_info_bg colorP txt_info_offset"> <div class="txt_info"><?= $film["duree"]?></div></div></td>
                        <td rowspan="2"> <div class="borderH3 colorP"></div></td>
                    <tr>
                        <td colspan="2"> <div class="txt_info_bg colorP"> <div class="txt_info1"><?php 
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
                            };?></div></div></td>
                    <tr>
                        <td> <div class="shape4 colorP"></div></td>
                        <td colspan="2"> <div class="borderW3 colorP"></div></td>
                        <td> <div class="shape3 colorP"></div></td>
                    </tr>
                    </tr>
                    </tr>
                    </tr>
                </tbody>
            </table>
            </div></div></td>
            <td rowspan="5"> <div class="borderH2"></div></td>
            <td><div class="titre_acteur_bg"> <div class="titre_acteur">Casting : </div></div></td>
            <td rowspan="5"> <div class="borderH2"></div></td>
        <tr>
            <td rowspan="4" colspan="2"> <div class="cadre_acteur">
            <table>
                <tbody>
                    <tr>
                        <td> <div class="shape1 colorP"></div></td>
                        <td> <div class="borderW3 colorP"></div></td>
                        <td> <div class="shape2 colorP"></div></td>
                    <tr>
                        <td> <div class="borderH5 colorP "></div></td>
                        <td> <div class="colorP"> <div class="txt_synopsis limit_s1"><?php
                            foreach($requeteCasting->fetchAll() as $role) { 
                            ?>
                            <div class="role">
                            <table>
                                <tbody>
                                    <tr>
                                        <td rowspan="5" colspan="2"> <div class="pos">
                                        <a href="<?= "./index.php?action=detailRole&id=".$role['id_role']?>"><img src="<?= $role["portrait"]?>"></a>
                                        <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                                        <td colspan="2"> <div class="spacer2"></div></td>
                                    <tr>
                                        <td class="table_txt_bg" colspan="2"> <div class="table_txt"> <?= $role["nom_role"]?></div></td>
                                        <td colspan="2" rowspan="3"><div class="end"><div class="end_inner"></div></div></td> 
                                    <tr>
                                        <td class="table_detail_bg"> <div class="table_txt"> <?= $role["prenom"]?></div></td>
                                        <td class="table_detail_bg"> <div class="table_txt"> <?= $role["nom"]?></div></td>
                                    <tr>
                                        <td colspan="2"> <div class="table_txt_bg"></div></td>
                                    <tr>
                                        <td colspan="2"> <div class="spacer2"></div></td>
                                    </tr>
                                    </tr>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <?php } ?></div></div></td>
                        <td> <div class="borderH5 colorP"></div></td>
                    <tr>
                        <td> <div class="shape4 colorP"></div></td>
                        <td> <div class="borderW3 colorP"></div></td>
                        <td> <div class="shape3 colorP"></div></td>
                    </tr>
                    </tr>
                    </tr>
                </tbody>
            </table>
            </div></td>
        <tr>    
            <td colspan="3"> <div class="cadre_real">
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
                </table></div></td>
        <tr>    
            <td rowspan="2"> <div class="spacerW50"></div></td>
            <td rowspan="2" colspan="2"> <div class="bg">  <div class="cadre_synopsis">
            <table>
                <tbody>
                    <tr>
                        <td> <div class="shape1 colorP"></div></td>
                        <td> <div class="borderW3 colorP"></div></td>
                        <td> <div class="shape2 colorP"></div></td>
                    <tr>
                        <td> <div class="borderH4 colorP "></div></td>
                        <td> <div class="colorP"> <div class="txt_synopsis limit_s"><?= $film["synopsis"]?></div></div></td>
                        <td> <div class="borderH4 colorP"></div></td>
                    <tr>
                        <td> <div class="shape4 colorP"></div></td>
                        <td> <div class="borderW3 colorP"></div></td>
                        <td> <div class="shape3 colorP"></div></td>
                    </tr>
                    </tr>
                    </tr>
                </tbody>
            </table>
            </div></div></td>
        <tr>    
        <tr>    
            <td> <div class="shape5"><div class="shape6"></div></div></td>
            <td colspan="7"> <div class="borderW2"></div></td>
            <td> <div class="shape3"></div></td>
        </tr>
    </tbody>
</table>

</div>
<?php

$titre = "Detail film";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";