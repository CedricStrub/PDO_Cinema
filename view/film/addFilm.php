<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/add/addF.css">
<div class="padding30"></div>
<div id="add_F">
<div class="borderF">
<table>
<form action="./index.php?action=addFilm" method="post">
    <tbody>
        <tr>
            <td> <div class="shape1"><div class="shape11"></div></div></td>
            <td colspan="5"> <div class="border3"><div class="border31"></div></div></td>
            <td> <div class="shape2"><div class="shape21"></div></div></td>
        <tr>
            <td rowspan="16"> <div class="border2"><div class="border21"></div></div></td>
            <td colspan="5"> <div class="title">Ajouter un Film :</div></td>
            <td rowspan="16"> <div class="border1"><div class="border11"></div></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="titre" class="cat">Titre :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="text" name="titre" placeholder="Titre du Film"><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="sortie" class="cat">Année de sortie FR :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="number" name="sortie" placeholder="yyyy"><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="duree" class="cat">Durée en minute :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="text" name="duree" placeholder="Durée"><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="note" class="cat">note :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><select name="note">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="affiche" class="cat">Affiche :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="text" name="affiche" placeholder="URL de l'affiche"><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="synopsis" class="cat">Synopsis :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="text" name="synopsis" placeholder="text"><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="real" class="cat">Realisateur :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><select name="real">
                <?php
                    foreach($requeteReal->fetchAll() as $real) { 
                    ?><option value=<?=$real["id_realisateur"]?>><?=$real["prenom"]." ".$real["nom"]?></option>
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
        </tr>
        </tr>
        </tr>
        </tr>
    </tbody>
</form>
</table>
</div>
</div>

<?php

$titre = "Ajouter un Film";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
