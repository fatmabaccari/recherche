# Projet d’Indexation et de Recherche de Documents

Ce projet PHP permet de gérer des documents via un système simple d’upload, d’indexation et de recherche par mots-clés. Les fichiers uploadés sont stockés sur le serveur et leurs métadonnées (titre, chemin, mots-clés) sont enregistrées dans une base de données MySQL. Ensuite, une interface de recherche permet de retrouver les documents indexés en fonction des mots-clés saisis.

---

## Fonctionnalités

- **Upload de documents** (PDF, TXT, DOC, DOCX) jusqu’à 1 Mo
- Stockage des fichiers dans un dossier serveur dédié
- Enregistrement des métadonnées : titre, chemin, mots-clés dans la base MySQL
- Recherche par mots-clés dans la base, avec affichage des documents correspondants
- Gestion des erreurs (taille de fichier, extensions autorisées, erreurs de déplacement, erreurs SQL)
  
---

## Installation et Configuration

1. Installer un serveur web local (ex. EasyPHP, XAMPP, WAMP) avec PHP et MySQL.

2. Créer la base de données `test` :

```sql
CREATE DATABASE test;
USE test;
