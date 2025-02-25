# MoneyMind - Gestion Budgétaire Intelligente

## Description

**MoneyMind** est une application web de gestion budgétaire personnelle qui aide les utilisateurs à suivre leurs revenus, leurs dépenses, leurs objectifs d'épargne et leurs souhaits. La plateforme intègre une intelligence artificielle via l'API Gemini pour fournir des suggestions personnalisées et optimiser la gestion financière.

L'application automatise l'ajout des salaires, la gestion des dépenses récurrentes et envoie des alertes lorsque des seuils budgétaires sont dépassés. Elle permet également aux administrateurs de personnaliser les catégories de dépenses et de gérer les comptes inactifs.

## Fonctionnalités

### Front Office

#### Visiteur :

- Accès à une page d'accueil publique présentant l'application.
- Inscription avec saisie du salaire mensuel et date de crédit.
- Système de récupération de mot de passe.

#### Utilisateur Authentifié :

- Saisie et modification du salaire mensuel avec crédit automatique.
- Ajout de dépenses avec nom, prix et catégorie.
- Gestion des dépenses récurrentes (ajout, modification, suppression).
- Configuration d'alertes budgétaires globales et par catégorie.
- Consultation d'un tableau de bord interactif avec :
  - Revenu restant et total des dépenses.
  - Répartition des dépenses par catégorie.
  - Progression des objectifs d'épargne et des listes de souhaits.
  - Suggestions d'optimisation des dépenses via l'IA.
- Définition d'objectifs d'épargne mensuels.
- Ajout et suivi d'une liste de souhaits.
- Réception de notifications par email pour les alertes et mises à jour.

### Back Office (Administrateur)

- Accès à un tableau de bord avec statistiques :
  - Nombre total d'utilisateurs.
  - Revenu mensuel moyen des utilisateurs.
- Suppression des comptes inactifs (aucune action en 2 mois).
- Gestion des catégories de dépenses (ajout, modification, suppression).

### Fonctionnalités Transversales

- Système d'authentification et d'autorisation (utilisateur/admin).
- Gestion automatique des salaires et dépenses récurrentes.
- Intégration de l'IA via l'API Gemini pour suggestions budgétaires.
- Notifications par email.
- Statistiques simples pour les utilisateurs et administrateurs.
- Filtrage des dépenses par catégorie ou période.

### Fonctionnalités Bonus

- Historique des dépenses et comparaison des tendances mensuelles.
- Suggestions contextuelles adaptées à la période.
- Exportation des données en PDF/CSV.
- Personnalisation de l'interface (thème sombre/clair, ton des suggestions IA).

## Technologies Utilisées

- **Backend** : Laravel (PHP)
- **Base de données** : MySQL 
- **Frontend** : Blade (Laravel), Tailwind CSS
- **IA** : Intégration de l'API Gemini
- **Notifications** : Mailtrap/SMTP
- **Hébergement** : Serveur Linux sur AWS EC2, Azure VM ou DigitalOcean Droplet

## Déploiement

L'application est hébergée sur un serveur Linux et déployée avec :

- **Serveur Web** : Nginx / Apache
- **Gestionnaire de processus** : Supervisor pour exécution des tâches planifiées
- **Certificat SSL** : Let's Encrypt pour connexion sécurisée

## Sécurité

- Validation des entrées côté serveur.
- Protection contre les attaques XSS et CSRF.
- Hachage des mots de passe (Bcrypt/Argon2).
- Contrôle d'accès basé sur les rôles.
- Requêtes SQL sécurisées (ORM Eloquent).

## Installation et Exécution

1. **Cloner le répertoire** :
   ```sh
   git clone https://github.com/votre-utilisateur/moneymind.git
   cd moneymind
   ```
2. **Installer les dépendances** :
   ```sh
   composer install
   npm install && npm run dev
   ```
3. **Configurer l'environnement** :
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
   Modifier les valeurs dans `.env` (connexion à la base de données, SMTP...)
4. **Exécuter les migrations et les seeders** :
   ```sh
   php artisan migrate --seed
   ```
5. **Démarrer le serveur Laravel** :
   ```sh
   php artisan serve
   ```
   L'application sera accessible sur `http://127.0.0.1:8000`

