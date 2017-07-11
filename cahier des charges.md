# Cahier des charges pour "GPPM" (Gestionnaire de Projets et de Plannings pour Mobile)

## 1) Qu'est ce ?
    - Une application permettant d'afficher/modifier son planning.
    - Réserver des salles au sein de l'entreprise.
    - Affichage des présences.
    - Regarder l'avancée des projets.
    - Contacter avec le personnel.
    
## 2) Pour qui ?
    - Création pour l'IMIE.
    - Tout type d'entreprise.
    - Etablissement scolaire.
    
## 3) Pourquoi ?
    - Le fait d'être mobile fait gagner du temps sur la gestion de son planning qui est lié à l'entreprise.
    - Eviter le problème des salles déjà prise.
    - Afficher la présence des élèves.
    - Meilleur visuel sur l'avancée des projets avec une barre de progression, voir les projets de la TO DO LIST.
    - Contact dans le personnel avec disponibilités "Online ; Offline".

## Limites et problèmes :
    - Adapter Androïd et IOS.
    - Stockage des données.
    - Ergonomie, limiter la charge sur l’interface.
    - Donner des identifiants, pas de création de pseudos.

## Technologie utilisée :
    - PHP (fonctionne avec une base de données), HTML, CSS.
    - SQL (base de données).
    - Pencil Project pour le Design de l'application.

## Accueil

L'interface de l'accueil reprend le code couleur des campus de l'IMIE. Il suffit de toucher l'onglet de son campus pour passer aux identifiants (donnés par l'IMIE).

## To do list

La création de deux To Do List permettra aux formateurs de lister les tâches à faire, en cours 
(avec une barre de pourcentage pour indiquer l'avancée) et terminées.

Cette To Do List ne sera pas visibles par les apprenants.
La même chose sera donc effectuée pour les apprenants, la différence notable est que les formateurs pourront voir les avancées.

## Le Planning

Grâce à l'application, le planning peut être modifié suivant les paramètres suivants : 
    
    - Choix de la salle (liste de salles disponibles)
    - Choix de la date (Entrer une date puis affiche les heures disponible)

## Contact

    - Le profil de la personne visitée sera «online» sinon il sera «offline». 
    - Un apprenant, qui aura un compte utilisateur (donc visible par le formateur), pourra envoyer un message.

## Appel

    - Liste des élèves de la classe
    - Afficher les présences
    - Envoie de la liste