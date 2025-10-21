# Projet Mémoire - Backend API

## 🚀 Améliorations API REST

Ce projet inclut plusieurs améliorations importantes pour l'API REST du système de gestion médicale.

### ✨ Nouvelles fonctionnalités

#### 🔒 Middleware de sécurité
- **SecurityHeaders** : Headers de sécurité renforcés
  - Protection XSS
  - Protection contre le clickjacking
  - Politique de référent
  - Configuration CORS pour l'API

#### 📊 Middleware de logging
- **ApiLogging** : Traçage complet des requêtes API
  - Logging des méthodes HTTP
  - Temps de réponse
  - Adresses IP
  - User agents
  - Codes de statut
  - Logs séparés dans `storage/logs/api.log`

### 🧪 Tests améliorés

#### Tests d'authentification
- Inscription utilisateur
- Connexion/déconnexion
- Gestion des profils
- Validation des tokens

#### Tests de rendez-vous
- Création de rendez-vous par les patients
- Consultation des rendez-vous
- Mise à jour par les médecins
- Contrôle des permissions

#### Tests de gestion des utilisateurs
- Création et gestion des rôles
- Permissions par rôle
- Validation des données

### 🛠️ Configuration

#### Middleware
Les middlewares sont automatiquement configurés dans `app/Http/kernel.php` :
- `SecurityHeaders` : Appliqué globalement
- `ApiLogging` : Appliqué aux routes API

#### Logging
Le canal API est configuré dans `config/logging.php` :
```php
'api' => [
    'driver' => 'daily',
    'path' => storage_path('logs/api.log'),
    'level' => env('LOG_LEVEL', 'info'),
    'days' => env('LOG_DAILY_DAYS', 30),
],
```

### 🚀 Installation

1. **Cloner le projet**
```bash
git clone https://github.com/Aby342/ProjetMemoire.git
cd ProjetMemoire/backend
```

2. **Installer les dépendances**
```bash
composer install
npm install
```

3. **Configuration**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Base de données**
```bash
php artisan migrate
php artisan db:seed
```

5. **Tests**
```bash
php artisan test
```

### 📝 API Endpoints

#### Authentification
- `POST /api/v1/register` - Inscription
- `POST /api/v1/login` - Connexion
- `POST /api/v1/logout` - Déconnexion
- `GET /api/v1/user` - Profil utilisateur

#### Rendez-vous
- `GET /api/v1/appointments` - Liste des rendez-vous
- `POST /api/v1/appointments` - Créer un rendez-vous
- `PUT /api/v1/appointments/{id}` - Modifier un rendez-vous
- `DELETE /api/v1/appointments/{id}` - Supprimer un rendez-vous

### 🔧 Développement

#### Structure des tests
```
tests/
├── Feature/
│   ├── AuthTest.php
│   ├── AppointmentTest.php
│   └── UserManagementTest.php
└── TestCase.php (avec helpers)
```

#### Helpers de test
- `createTestUser()` - Créer un utilisateur patient
- `createTestDoctor()` - Créer un utilisateur médecin
- `createTestAdmin()` - Créer un utilisateur admin

### 📊 Monitoring

Les logs API sont disponibles dans `storage/logs/api.log` avec les informations suivantes :
- Méthode HTTP
- URL complète
- Adresse IP
- User agent
- ID utilisateur (si authentifié)
- Code de statut
- Temps de réponse en millisecondes
- Timestamp ISO

### 🛡️ Sécurité

#### Headers de sécurité appliqués
- `X-Content-Type-Options: nosniff`
- `X-Frame-Options: DENY`
- `X-XSS-Protection: 1; mode=block`
- `Referrer-Policy: strict-origin-when-cross-origin`
- `Permissions-Policy: geolocation=(), microphone=(), camera=()`

#### CORS
Configuration automatique pour les routes API :
- `Access-Control-Allow-Origin: *`
- `Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS`
- `Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With`

### 📈 Performance

Le middleware de logging mesure et enregistre le temps de réponse de chaque requête API pour le monitoring des performances.

### 🤝 Contribution

1. Créer une branche feature
2. Implémenter les modifications
3. Ajouter des tests
4. Créer une pull request

### 📄 Licence

Ce projet est sous licence MIT."# backend-memoire" 
