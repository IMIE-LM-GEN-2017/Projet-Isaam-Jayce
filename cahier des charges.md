# Cahier des charges pour "GPPM" (Gestionnaire de Projets et de Plannings pour Mobile)

## 1) Qu'est ce ?
    - Une application permettant d'afficher/modifier son planning.
    - R�server des salles au sein de l'entreprise.
    - Affichage des pr�sences.
    - Regarder l'avanc�e des projets.
    - Contacter avec le personnel.
    
## 2) Pour qui ?
    - Cr�ation pour l'IMIE.
    - Tout type d'entreprise.
    - Etablissement scolaire.
    
## 3) Pourquoi ?
    - Le fait d'�tre mobile fait gagner du temps sur la gestion de son planning qui est li� � l'entreprise.
    - Eviter le probl�me des salles d�j� prise.
    - Afficher la pr�sence des �l�ves.
    - Meilleur visuel sur l'avanc�e des projets avec une barre de progression, voir les projets de la TO DO LIST.
    - Contact dans le personnel avec disponibilit�s "Online ; Offline".

## Limites et probl�mes :
    - Adapter Andro�d et IOS.
    - Stockage des donn�es.
    - Ergonomie, limiter la charge sur l�interface.
    - Donner des identifiants, pas de cr�ation de pseudos.

## Technologie utilis�e :
    - PHP (fonctionne avec une base de donn�es), HTML, CSS.
    - SQL (base de donn�es).
    - Pencil Project pour le Design de l'application.

## Accueil

L'interface de l'accueil reprend le code couleur des campus de l'IMIE. Il suffit de toucher l'onglet de son campus pour passer aux identifiants (donn�s par l'IMIE).

## To do list

La cr�ation de deux To Do List permettra aux formateurs de lister les t�ches � faire, en cours 
(avec une barre de pourcentage pour indiquer l'avanc�e) et termin�es.

Cette To Do List ne sera pas visibles par les apprenants.
La m�me chose sera donc effectu�e pour les apprenants, la diff�rence notable est que les formateurs pourront voir les avanc�es.

## Le Planning

Gr�ce � l'application, le planning peut �tre modifi� suivant les param�tres suivants : 
    
    - Choix de la salle (liste de salles disponibles)
    - Choix de la date (Entrer une date puis affiche les heures disponible)

## Contact

    - Le profil de la personne visit�e sera �online� sinon il sera �offline�. 
    - Un apprenant, qui aura un compte utilisateur (donc visible par le formateur), pourra envoyer un message.

## Appel

    - Liste des �l�ves de la classe
    - Afficher les pr�sences
    - Envoie de la liste