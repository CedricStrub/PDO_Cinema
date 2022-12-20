<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/detail/detailR.css">

<?php

$role = $Role->fetch();
$role = $role["nom_role"];
?>
<div class="t_role"><div class="titleL"> <div class="titleL_inner"></div> </div> <div class="title"><?= $role ?></div> <div class="titleR"><div class="titleR_inner"></div></div></div>

<div id="t_detail_R">
<?php
    foreach($requeteRole->fetchAll() as $role) { 
    ?>
    <div class="role">
    <table>
        <tbody>
            <tr>
                <td rowspan="5" colspan="2"> <div class="pos">
                <a href="<?= "./index.php?action=detailActeur&id=".$role['id_acteur']?>"><img src="<?= $role["portrait"]?>"></a>
                <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
                <td colspan="2"> <div class="spacer"></div></td>
            <tr>
                <td class="table_txt_bg" colspan="3"> <div class="table_txt"> <?= $role["titre"]?></div></td>
                <td colspan="2" rowspan="3"><div class="end"><div class="end_inner"></div></div></td> 
            <tr>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $role["annee"]?></div></td>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $role["prenom"]?></div></td>
                <td class="table_detail_bg"> <div class="table_txt"> <?= $role["nom"]?></div></td>
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

$titre = "Roles incarné par";
$titre_secondaire = "Roles :";
$contenu = ob_get_clean();
require "view/template.php";