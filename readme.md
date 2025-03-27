# 🎬🎵 Projet E5 - Bibliothèque de Films et Albums  

## 📖 Présentation  
Le projet **E5** est une application web développée dans le cadre du **BTS SIO**. Il permet à un administrateur de gérer une bibliothèque de **films** et **albums** qu'il a visionnés ou écoutés. L'administrateur peut ajouter des œuvres à la collection et leur attribuer une note afin de garder une trace de ses visionnages et écoutes.  

Ce projet vise à mettre en pratique les compétences acquises en développement web, gestion de base de données et structuration d’une application dynamique.  


## 🛠️ Technologies utilisées  
- **PHP** : Pour la logique serveur et la gestion des requêtes.  
- **MySQL** : Base de données pour stocker les films, albums et leurs notes.  
- **HTML/CSS/JavaScript** : Pour l'affichage et l'interactivité du site.  
- **Composer** : Gestionnaire de dépendances PHP.  

## 📂 Structure du projet  
- **`controllers/`** : Contient les fichiers gérant les requêtes et la logique métier.  
- **`models/`** : Définit les structures de données et les interactions avec la base de données.  
- **`public/`** : Contient les fichiers accessibles publiquement (CSS, JavaScript, images, etc.).  
- **`vues/`** : Regroupe les fichiers d'affichage du site (templates HTML).  
- **`index.php`** : Point d'entrée principal de l'application.  
- **`.htaccess`** : Fichier de configuration Apache.  
- **`composer.json`** : Fichier de gestion des dépendances PHP.  

## 🚀 Fonctionnalités  
- 📌 **Ajout de films et d'albums** : L'administrateur peut ajouter des œuvres avec leur titre, année de sortie et une description.  
- ⭐ **Notation** : Chaque film et album peut être noté selon l'appréciation de l'administrateur.  
- 📋 **Affichage de la collection** : Tous les films et albums ajoutés s'affichent dans une bibliothèque organisée.  
- 🔍 **Recherche et tri** : Possibilité de rechercher une œuvre et de trier par note ou date d'ajout.  

## 📅 Évolutions futures  
- 🔐 **Création d’un système de connexion** : Ajout d’un login pour restreindre l'accès aux fonctionnalités administratives.  
- 📝 **Page dédiée aux suggestions** : Une section où il sera possible de proposer des films à voir ou des albums à écouter via un formulaire.  
- 📜 **Affichage des suggestions** : Liste publique regroupant toutes les propositions soumises.  

---


