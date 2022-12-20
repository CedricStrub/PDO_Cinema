<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/list/listR.css">

<div id="t_list_F">
<?php
    foreach($requeteRoles->fetchAll() as $role) { ?>
<table>
    <tbody>
        <tr>
            <td rowspan="3" colspan="2"> <div class="pos">
                <a href="<?= "./index.php?action=detailRole&id=".$role['id_role']?>"><img src="<?= $role["portrait"]?>"></a>
                <div class="demi_bg"></div><div class="rhombus"></div><div class="inner"></div></div></td> 
            <td colspan="2"> <div class="spacer"></div></td>
        <tr>
            <td class="table_txt_bg" colspan="2"> <div class="table_txt"> <?= $role["nom_role"]?></div></td>
            <td colspan="2"><div class="end"><div class="end_inner"></div></div></td> 
        <tr>
            <td colspan="2"> <div class="spacer"></div></td>
        </tr>
        </tr>
        </tr>
    </tbody>
</table>
<?php } ?>
</div>

<?php

$titre = "Liste des roles";
$titre_secondaire = "liste de role :";
$contenu = ob_get_clean();
require "view/template.php";