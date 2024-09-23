<?php // Connexion à la base de données
$connexion = mysqli_connect("localhost", "root", "", "test");

if ($connexion) {
    // Connexion au serveur effectuée
    echo "Connexion réussie<br>";

    // Vérifier si le formulaire a été soumis
    if (isset($_GET['mots_cles']) && !empty($_GET['mots_cles'])) {
        $mots_cles = '%' . $_GET['mots_cles'] . '%';
        
        // Requête SQL pour rechercher les documents basés sur les mots-clés
        $requete = "SELECT doc_title, doc_path FROM documen WHERE doc_keywords LIKE '$mots_cles'";
        $resultat = mysqli_query($connexion, $requete);

        if ($resultat) {
            // Requête exécutée avec succès
            $count = mysqli_num_rows($resultat);
            if ($count > 0) {
                echo "<h2>Résultats de la recherche pour les mots-clés : $mots_cles</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Numéro</th><th>Titre</th><th>Chemin</th></tr>";
                $index = 0;
                while ($row = mysqli_fetch_assoc($resultat)) {
                    $index++;
                    echo "<tr><td>$index</td><td>{$row['doc_title']}</td><td>{$row['doc_path']}</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>Aucun document correspondant aux mots-clés n'a été trouvé.</h2>";
            }
        } else {
            // Erreur lors de l'exécution de la requête
            echo "<h2>Erreur lors de l'exécution de la requête : " . mysqli_error($connexion) . "</h2>";
        }
    } else {
        // Aucun mot-clé spécifié
        echo "<h2>Veuillez spécifier des mots-clés pour la recherche.</h2>";
    }
} else {
    // Erreur de connexion à la base de données
    echo "<h2>Erreur de connexion à la base de données : " . mysqli_connect_error() . "</h2>";
}
?>