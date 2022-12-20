<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/add/addC.css">
<div class="padding30"></div>
<div id="add_C">
<table>
<form action="./index.php?action=addCasting" method="post">
    <tbody>
        <tr>
            <td> <div class="shape1"><div class="shape11"></div></div></td>
            <td colspan="5"> <div class="border3"><div class="border31"></div></div></td>
            <td> <div class="shape2"><div class="shape21"></div></div></td>
        <tr>
            <td rowspan="8"> <div class="border2"><div class="border21"></div></div></td>
            <td colspan="5"> <div class="title">Ajouter un Casting :</div></td>
            <td rowspan="8"> <div class="border1"><div class="border11"></div></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="affiche" class="cat">Films :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><select name="film">
                <?php
                    foreach($requeteFilms->fetchAll() as $film) { 
                    ?><option value=<?=$film["id_film"]?>><?=$film["titre"]." ".$film["annee"]?></option>
                    <?php }?>
                </select><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="synopsis" class="cat">Roles :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><select name="role">
                <?php
                    foreach($requeteRoles->fetchAll() as $role) { 
                    ?><option value=<?=$role["id_role"]?>><?=$role["nom_role"]?></option>
                    <?php }?>
                </select><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="real" class="cat">Acteurs :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><select name="acteur">
                <?php
                    foreach($requeteActeurs->fetchAll() as $acteur) { 
                    ?><option value=<?=$acteur["id_acteur"]?>><?=$acteur["prenom"]." ".$acteur["nom"]?></option>
                    <?php }?>
                </select><br>
            </div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="1" class="bg"> <div class="empty"></div></td>
            <td colspan="1" class="bg padding30"> <div class="fieldL"></div></td>
            <td colspan="1" class="bg padding30"> <div class="submit"> <input type="submit" value="Submit"></div></td>
            <td colspan="1" class="bg padding30"> <div class="fieldR"></div></td>
            <td colspan="1" class="bg"> <div class="empty"></div></td>
        <tr>
            <td> <div class="shape3"><div class="shape31"></div></div></td>
            <td colspan="5"> <div class="border4"><div class="border41"></div></div></td>
            <td> <div class="shape4"><div class="shape41"></div></div></td>
        </tr>
        </tr>
        </tr>
        </tr>
        </tr>
        </tr>
        </tr>
        </tr>
        </tr>
        </tr>
    </tbody>
</form>
</table>
</div>

<?php

$titre = "Ajouter un Casting";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
