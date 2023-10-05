COMPTE RENDUS 

Objectif n°1 : Respecter la maquette fournie
  Temps passé : 2h
  Réalisation : 95% remplis
              : il manque la partie affichage des informations qui n'est pas terminé correctement et les icônes dans les boutons.
        

Objectif n°2 : Récupération/Update des données via API, ce périmètre est à coder en PHP
(librairie native CURL)
  Temps passé : 2h
  Réalisation : 66% remplies car la route update ne marche pas
  Problèmes rencontrés bloquants : 
      - cors
      - les données ne transistent pas du fetch vers le backend php ( id, nom, adresse, email, tel ) 

Objectif n°3 : Faire fonctionner l’appli
  Temps passé : 3h
  Réalisation : 50% car la route update et la recherche de client par nom et dénomination ne marchent pas
  Problèmes rencontrés bloquants : 
      - cors
      - les données ne transistent pas du fetch > backend php

Objectif n°4 : Utiliser Vue.js ou à défaut HTML/CSS/JS

  Temps passé : 1h 
  Réalisation : à 100% je n'ai utilisé que JQUERY / HTML / CSS 

////////////////////////////////////////////////////////////////////////

Note : ma tutrice voudrait appuyer sur le fait que je n'ai jamais fait de php et que durant la formation les éducateurs s'appuient sur la demande des entreprises afin de nous procurer des cours personnalisés.

PS : Merci au technicien Alexandre de chez Lundi qui m'a aiguillé au matin.

///////////////////////////// COMPTE RENDU ANNEXE //////////////////////

# lundimatin-test-final
9h15 
	- Compréhension de la consigne de l’épreuve
9h20

	- Compréhension du fonctionnement de l’api 
	- Créer du repo git
	- Premier commit

10h02 - Demande a l’administration de chez LM pour contacter un technicien
	
	- Commencement du squelette de la maquette

10h23  - Appel d’un technicien de chez Lundi matin 

	- Problème rencontré : 
		Sur POSTMAN : ROUTE POST/auth renvoie > erreur 401 Login/Mot de passe 				incorrects 
	- Solution sur POSTMAN : envoyer le body en raw
10h35
	
	- Récupération du token + accès aux autres routes /clients etc

10h40
	- Rédaction du compte rendu
10h51
	- Continuer la maquette squelette
11h20 
	- Initialisation du backend en php
12h00 
	- Première route initialisé avec curl 
	- Succès de la requête 

13h04 
	- Affichage avec succès des noms des clients
13h07
	- Reprise de la maquette 

13h46 
	- terminer la premiere page de listing 
13h47 
	- ajout de la feature recherche par nom ou dénomination
15h44 
	- affichage de la page 1 seul client terminer
15h45
	- update 
	- condition sur les boutons et les fonctionnalité d’edit
16h48	
	- problème cors la route update n’est pas effective.
	+ probleme 500 l’id et les autres informations clients ne circulent pas vers le back.

	- finalisation de la rédaction du compte rendu et revus du code.
