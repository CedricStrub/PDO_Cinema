<?php ob_start(); ?>

<link rel="stylesheet" href="./public/css/add/addR.css">
<div class="padding30"></div>
<div id="add_R">
<table>
<form action="./index.php?action=addRole" method="post">
    <tbody>
        <tr>
            <td> <div class="shape1"><div class="shape11"></div></div></td>
            <td colspan="5"> <div class="border3"><div class="border31"></div></div></td>
            <td> <div class="shape2"><div class="shape21"></div></div></td>
        <tr>
            <td rowspan="6"> <div class="border2"><div class="border21"></div></div></td>
            <td colspan="5"> <div class="title">Ajouter un Role :</div></td>
            <td rowspan="6"> <div class="border1"><div class="border11"></div></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="genre" class="cat">Nom :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="text" name="role" placeholder="Nom du role"><br></div></td>
            <td class="bg"> <div class="fieldR"></div></td>
        <tr>
            <td colspan="5" class="bg"><label for="genre" class="cat">Portrait :</label><br></td>
        <tr>
            <td class="bg"> <div class="fieldL"></div></td>
            <td colspan="3" class="bg"> <div class="field"><input type="text" name="portrait" placeholder="URL du portrait (facultatif)"><br></div></td>
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
    </tbody>
</form>
</table>
</div>
<?php


$titre = "Ajouter un Role";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";