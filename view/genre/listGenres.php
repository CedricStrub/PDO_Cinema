<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/list/listG.css">


<div id="t_list_G">

<?php
$last = array();
    foreach($requeteGenres->fetchAll() as $genre) { 
        if(in_array($genre["nom_genre"],$last)){
        }else{
            array_push($last, $genre["nom_genre"]); ?>
            <div class="genre">
            <table>
                <tbody>
                    <tr>
                        <td rowspan="4" colspan="2"> <div class="pos">
                        <a href="<?= "./index.php?action=detailGenre&id=".$genre['id_genre']?>"><img src="<?= $genre["affiche"]?>"></a>
                            <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                        <td colspan="2"> <div class="spacer"></div></td>
                    <tr>
                        <td class="table_txt_bg"> <div class="table_txt"> <?= $genre["nom_genre"]?></div></td>
                        <td colspan="2" rowspan="2"><div class="end"><div class="end_inner"></div></div></td> 
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
    <?php }} ?>
</div>
<?php

$titre = "Liste des genres";
$titre_secondaire = "liste de genre :";
$contenu = ob_get_clean();
require "view/template.php";