# skynozz-commerup : exercice-1

### Objectif
Créer sa première feature

### Préparation

- Cloner ce repository
- Créer son repository 
- Modifier l'accès à la base de données dans /functions/db.php
- Exécuter les migrations SQL contenues dans /migrations

***

### Exercice
En t'inspirant du package "User", crée le package suivant :

##### Package Product

Ce package aura pour champs :
- id (INT PRIMARY AUTOINCREMENT)
- name (VARCHAR(191)) : Input-text
- description (TEXT) : Textarea
- picture (VARCHAR(191)) : Input-text
- price (DECIMAL(10,2)) : Input-text
- quantity (INT) : Input-text
- online (TINYINT(1)) : Checkbox
- homepage (TINYINT(1)) : Checkbox

##### Création du package

- Créer la requête SQL de création de la table products dans /migrations/000-create-products.sql
- Exécuter cette requête
- Coder les fonctions présentes dans /packages/product/functions.php 

##### Réaliser l'interface du package sur l'administration

- Les vues de ce package sont disponibles dans /views/admin/pages/product
- Commencer par create.php (le formulaire doit être ergonomique)
- index.php
- update.php
- delete.php
 
##### Réaliser l'interface du package sur le site

- Les vues de ce package sont disponibles dans /views/site/pages
- Page d'accueil (home.php) : Liste les produits pour lesquels homepage === 1 && visible === 1
