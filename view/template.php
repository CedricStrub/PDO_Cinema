<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/template.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <title><?= $titre ?></title>
</head>
<body>
    <div id="wrapper">
        <main>
            <div id="contenu">
                <table>
                    <tbody>
                        <tr>
                            <td> <div class="shape1_2"><div class="shape1_1"></div></div></td>
                            <td><div class="main_titre_bg_1"><div class="main_titre_bg"><div id="titre" class="main_titre"><h1>Cinémathèque</h1></div></div></div></td>
                            <td> <div class="shape2_2"><div class="shape2_1"></div></div></td>
                        </tr>
                    </tbody>
                </table>
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>