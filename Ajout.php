<?php
$connexion = mysqli_connect("localhost", "root", "", "test");

if ($connexion) {
    echo "<p>Connexion à la base de données effectuée</p>";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $keywords = isset($_POST["mots_cles"]) ? $_POST["mots_cles"] : "";
        $path = "";

        if (isset($_FILES['monfichier']) && $_FILES['monfichier']['error'] == 0) {
            if ($_FILES['monfichier']['size'] <= 1000000) {
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('pdf', 'txt', 'doc', 'docx');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    $destination = 'C:\Program Files (x86)\EasyPHP 2.0b1\www\Tp-Indexation - Copie (21)' . basename($_FILES['monfichier']['name']);
                    if (move_uploaded_file($_FILES['monfichier']['tmp_name'], $destination)) {
                        $requete = "INSERT INTO documen (doc_title, doc_path, doc_keywords) VALUES ('$title', '$destination', '$keywords')";
                        $success = mysqli_query($connexion, $requete);
                        if ($success) {
                            echo "<h1>Document ajouté avec succès.</h1>";
                        } else {
                            echo "<h1>Erreur dans l'insertion des données dans la base de données :</h1> " . mysqli_error($connexion);
                        }
                    } else {
                        echo "<h1>Une erreur est survenue lors du déplacement du fichier vers la destination.</h1>";
                    }
                } else {
                    echo "<h1>Extension de fichier non autorisée. Les extensions autorisées sont : </h1>" . implode(", ", $extensions_autorisees);
                }
            } else {
                echo "<h1>Le fichier est trop volumineux.</h1>";
            }
        } else {
            echo "<h1>Aucun fichier n'a été téléchargé.</h1>";
        }
    }
} else {
    echo "<p>Erreur de connexion à la base de données.</p>";
}

mysqli_close($connexion);
?>



