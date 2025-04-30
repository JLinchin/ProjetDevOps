# PHP Task Application

## Description
Cette application PHP permet aux utilisateurs de créer, afficher et gérer des tâches. Elle utilise une base de données MySQL pour stocker les tâches et propose une interface simple et intuitive.

---

## Structure
- Le projet comprend 3 dossiers clés :
   - Un dossier **.github** qui contient le nécessaire pour gérer la CI/CD
   - Un dossier **src** qui comprend tout le code de l'application
   - Un dossier **database** qui gère contient le script SQL qui crée la base de données
   - Un fichier **tests** qui gère tous les tests unitaires

---

## Conteneurisation
- Le projet possède une version de php **php:8.1-apache** et une version de mysql **mysql:8.0**

- De plus, la conteneurisation comprend 3 conteneurs : 
   - Un conteneur pour **php**
   - Un conteneur pour **mysql**
   - Un conteneur pour **phpmyadmin**

---

## Requirements
- **Docker** et **Docker Compose** (pour un déploiement avec conteneurs)
- **Kubernetes** (pour un déploiement dans un cluster)
- **PHP 7.4 ou supérieur** et **MySQL** (pour un déploiement local)

---

## Deployment Instructions

### 1. **Déploiement avec Docker Compose**
1. **Clonez le dépôt** :
   ```bash
   git clone https://github.com/JLinchin/ProjetDevOps.git
   cd php-task-app
   ```

2. **Lancez les conteneurs** :
   ```bash
   docker-compose up -d
   ```

3. **Accédez à l'application** :
   - Application : `http://localhost:8000`
   - PhpMyAdmin : `http://localhost:8080` (utilisateur : `root`, mot de passe : `root`)

---

### 2. **Déploiement avec Kubernetes**
1. **Assurez-vous que Kubernetes est configuré** :
   - Installez `kubectl` et configurez un cluster Kubernetes fonctionnel.

2. **Appliquez la configuration Kubernetes** :
   ```bash
   kubectl apply -f application.yaml
   ```

3. **Vérifiez les ressources déployées** :
   ```bash
   kubectl get pods
   kubectl get services
   ```

4. **Accédez à l'application** :
   - Récupérez l'adresse IP publique du service LoadBalancer :
     ```bash
     kubectl get service app-service
     ```
   - Accédez à l'application via l'adresse IP et le port 8000.

---

### 3. **Déploiement local**
1. **Clonez le dépôt** :
   ```bash
   git clone <repository-url>
   cd php-task-app
   ```

2. **Configurez la base de données** :
   - Créez une base de données MySQL.
   - Exécutez le fichier `database/schema.sql` pour créer les tables nécessaires.

3. **Configurez la connexion à la base de données** :
   - Modifiez `src/db/connection.php` pour inclure vos identifiants de base de données.

4. **Lancez le serveur PHP** :
   ```bash
   php -S localhost:8000 -t src
   ```

5. **Accédez à l'application** :
   - Ouvrez votre navigateur et accédez à `http://localhost:8000/index.php`.

---

## Edition

En cas d'édition du projet, il suffit de push les modifications sur git. La CI/CD permet de faire des tests sur le nouveau code et de mettre la dernière version du projet sur Docker

---

## Features
- Ajouter de nouvelles tâches à la base de données.
- Afficher toutes les tâches dans un format liste.
- Interface utilisateur simple et épurée.
- Déploiement facile avec Docker ou Kubernetes.

---

## License
Ce projet est sous licence MIT.