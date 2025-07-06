# Projet d'Indexation de Documents

Ce projet permet d'uploader des fichiers (PDF, TXT, DOC, DOCX) via un formulaire web, de les enregistrer sur le serveur, puis de stocker les informations associées (titre, chemin, mots-clés) dans une base de données MySQL.

---

## Fonctionnalités

- Upload de fichiers autorisés (pdf, txt, doc, docx) jusqu'à 1 Mo
- Stockage du fichier sur le serveur dans un dossier défini
- Enregistrement dans la base MySQL des métadonnées du document : titre, chemin, mots-clés
- Gestion des erreurs : fichier trop volumineux, extension non autorisée, échec de déplacement ou d'insertion en base

---

## Installation et Configuration

1. Installer un serveur web local (ex : EasyPHP, XAMPP, WAMP)
2. Créer une base de données MySQL nommée `test`
3. Créer la table `documen` avec la structure suivante :

```sql
CREATE TABLE documen (
  id INT AUTO_INCREMENT PRIMARY KEY,
  doc_title VARCHAR(255) NOT NULL,
  doc_path VARCHAR(255) NOT NULL,
  doc_keywords VARCHAR(255) NOT NULL
);
