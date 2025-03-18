# Translation : 
- entity translation functionality : NO!
	https://dzhebrak.com/blog/translating-entities-easyadmin-doctrinebehaviors

- Standard : YES!
	https://lokalise.com/blog/symfony-translation-a-step-by-step-guide-with-examples/
	symfony console translation:extract --force fr --domain messages --format yaml


- Gestion publicité multilingue en BO
	Pas de solution native pour easyadmin
		https://github.com/EasyCorp/EasyAdminBundle/issues/4982#issuecomment-1015786229
	D'où :
		https://dzhebrak.com/blog/translating-entities-easyadmin-doctrinebehaviors
		https://www.phpfixing.com/2022/05/fixed-how-to-configure-translatable.html
		
	Fix versions :
		https://github.com/KnpLabs/DoctrineBehaviors/issues/757#issuecomment-2317309508
			
		

# Drag n drop components

- Modification manuelle des poules et tournois : 
	https://github.com/SortableJS/Sortable?tab=readme-ov-file
	* SortableJs https://sortablejs.github.io/Sortable/
	* JS Bin https://jsbin.com/nacoyah/edit?html,js,output
	
	
# 2 ways Authentification

- Authentification de deux entités différentes : Admin (BO) et client (FO)
	https://tech-en.netlify.app/articles/en508936/index.html

- Make a reset-password :  reset-password-bundle
	https://github.com/SymfonyCasts/reset-password-bundle
	
	
	
## 	Enregistrement des scores des matchs avec une obligation des deux validations (capitaines des 2 équipes)
Deux tables de BDD : 
	- Match (team1, team2, resultats, status, matchDate...) et 
	- MatchResult (match, team, winScore, loseScore, approvedByCaptain)
	

---
# Sponsoring : 
	- Diamant : Partenaire National et Dobaï (12 mois, phases départementales et régionales et Dobaï)
	- Platine : Partenaire National et Dobaï (12 mois, phases départementales et régionales et Dobaï)
	- Or : Partenaire National et Dobaï (12 mois, phases départementales et régionales et Dobaï)
	- Argent : Partenaire National (12 mois, phases départementales et régionales)
	- Bronze : Partenaire Régional (6 mois, phases départementales et régionales)
	
	
* Gestion de sponsors et publicités, avec les tables 
	Sponsor (logo - nom - société - url - Classification)
	Advertisement (publicité composé de id_sponsor, page, emplacement, image, date, ordre...)
	TournamentPhase (phases départementales et régionales et Dubaï)
	SponsorPhase (jointure entre sponsors et phases du tournoi)
	

# Mes mini tournoi : arbre de tournois