<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/list/listAR.css">

<div id="t_list_AR">
<?php
    foreach($requeteReal->fetchAll() as $real) { ?>
    <table>
        <tbody>
            <tr>       
                <td rowspan="4" colspan="2"> <div class="pos">
                    <a href="<?= "./index.php?action=detailRealisateur&id=".$real['id_realisateur']?>"><img src="<?= $real["portrait"]?>"></a>
                    <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                <td colspan="2"> <div class="spacer"></div></td>
            <tr>
                <td class="table_txt_bg"> <div class="table_txt"> <?= $real["prenom"]?></div></td>
                <td class="table_txt_bg"><div class="table_txt"><?= $real["nom"]?></div></td>
                <td rowspan="2" colspan="2"><div class="end"><div class="end_inner1"></div></div></td> 
            <tr>
                
                <td class="table_txt_bg"><div class="table_txt"><?= $real["sexe"]?></div></td>
                <td class="table_txt_bg"><div class="table_txt"><?= $real["date_naissance"]?></div></td>
            <tr>
                <td colspan="2"> <div class="spacer"></div></td>
            </tr> 
            </tr>
            </tr>
            </tr>
        </tbody>
    </table>
    <div class="spacer_tab"></div>
    <?php } ?>
</div>

<?php

$titre = "Liste des realisateurs";
$titre_secondaire = "liste de realisateurs :";
$contenu = ob_get_clean();
require "view/template.php";