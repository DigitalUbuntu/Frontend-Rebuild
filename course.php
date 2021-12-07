<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REDIGER UN COURS</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
</head>
<body>
    <div class="page">
        <div class="course" style="position: absolute;">
            <div class="course-title-container">
                <input type="text" class="course-title" placeholder="Donner un titre à votre cours" required>
            </div>
            <div class="chapter-container">
                <div class="chapter">
                    <div class="chaper-title-container">
                        <input type="text" class="chapter-title" placeholder="Donner un titre à votre chapitre" required>
                    </div>
                    <div class="add-element">
                        <div class="action-add">
                            <button class="btn-add-element">ajouter un élément</button>
                        </div>
                    </div>
                </div>
            </div>

            <button class="save-course">Enregistrer le cours</button>
        </div>

        <div class="elements absolute">
            <div class="element" id="add-subtitle">
                <div class="add-subtitle">Sous titre</div>
            </div>
            <div class="element" id="add-text">
                <div class="add-text">Text</div>
            </div>
            <div class="element" id="add-file">
                <div class="add-file">Fichier</div>
            </div>
        </div>
    </div>
</body>
</html>
