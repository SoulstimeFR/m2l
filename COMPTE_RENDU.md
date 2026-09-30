# Compte rendu — PHP Crime Scene

## Bugs corrigés

| N° | Problème constaté | Correction apportée | Commit |
|---|---|---|---|
| 1 | | | |
| 2 | | | |
| 3 | | | |
| 4 | | | |
| 5 | | | |
| 6 | | | |
| 7 | | | |
| 8 | | | |
| 9 | | | |
| 10 | | | |

## Ce que j'avais oublié

...

## Ce qui m'a posé le plus de difficulté

...

## Ce que je dois revoir

...

# Ticket 3 — Consultation des salles

## 1. Incident reproduit

### Manipulation réalisée

- Lancement du site sur un serveur PHP sur localhost
- Accès à la page Salle

### Résultat observé
- La page Salle est vide
- Il y a une erreur dans le terminal

### Résultat attendu
- Elle devrait contenir un tableau avec les 4 salles présentes

## 2. Diagnostic

### Parcours des données
Fichiers concernés :
- /public/salles.php
- /src/Repository/SalleRepository.php
- /src/Model/Salle.php

### Hypothèse
L'accès aux valeurs de la table est fait de la mauvaise mannière
La classe Salle a des paramètres mal définis

### Vérification avec le débogueur
`Uncaught Error: Cannot use object of type Salle as array` (l.17 dans /public/salles.php)

### Cause identifiée
On essaye de prendre des valeurs avec `$salle['clé']`, ce qui ne fonctionne pas avec un array
La valeur renvoyée par nom dans la classe Salle est capacite (pas la bonne valeur)

## 3. Correction

### Fichiers modifiés
- /public/salles.php
- /src/Model/Salle.php

### Explication
- Dans /public/salles.php, on essayait d'accéder aux valeurs avec une clé, ce qui est impossible pour un array
- Dans /src/Model/Salle.php, nom retournait capacite

## 4. Tests

| Test | Résultat attendu | Résultat obtenu |
|---|---|---|
| Ouverture de la page Salles | Aucun message d’erreur | Aucun message d'erreur |
| Affichage des noms | Noms conformes à la BDD | Noms conformes à la BDD |
| Affichage des capacités | Capacités conformes à la BDD | Capacités conformes à la BDD |
| Vérification syntaxique | Aucune erreur PHP | Aucune erreur PHP |
| Test des autres pages | Pas de régression visible | Pas de régression visible |