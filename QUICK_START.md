# 🚀 Guide de démarrage rapide

## Installation et configuration

### 1. Prérequis
- PHP 8.1+
- Composer
- Node.js & NPM
- Base de données (SQLite/MySQL/PostgreSQL)

### 2. Installation
```bash
# Cloner le projet
git clone https://github.com/Aby342/ProjetMemoire.git
cd ProjetMemoire/backend

# Installer les dépendances PHP
composer install

# Installer les dépendances Node.js
npm install

# Configuration
cp .env.example .env
php artisan key:generate
```

### 3. Base de données
```bash
# Migrations
php artisan migrate

# Seeders (données de test)
php artisan db:seed
```

### 4. Tests
```bash
# Lancer tous les tests
php artisan test

# Tests spécifiques
php artisan test --filter AuthTest
php artisan test --filter AppointmentTest
```

### 5. Démarrage du serveur
```bash
# Serveur de développement
php artisan serve

# L'API sera disponible sur http://localhost:8000
```

## 🔧 Configuration rapide

### Variables d'environnement importantes
```env
APP_ENV=local
APP_DEBUG=true
LOG_CHANNEL=stack
LOG_LEVEL=debug

# Base de données
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# Sanctum (tokens API)
SANCTUM_STATEFUL_DOMAINS=localhost:3000
```

### Scripts utiles
```bash
# Nettoyer le cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Régénérer l'autoload
composer dump-autoload

# Voir les routes
php artisan route:list
```

## 🧪 Tests rapides

### Test d'authentification
```bash
# Test d'inscription
curl -X POST http://localhost:8000/api/v1/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "patient"
  }'

# Test de connexion
curl -X POST http://localhost:8000/api/v1/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "test@example.com",
    "password": "password123"
  }'
```

### Test de création de rendez-vous
```bash
# Utiliser le token obtenu lors de la connexion
curl -X POST http://localhost:8000/api/v1/appointments \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -d '{
    "doctor_id": 1,
    "date": "2024-12-25 10:00:00",
    "motif": "Consultation générale",
    "status": "pending"
  }'
```

## 📊 Monitoring

### Logs API
Les logs API sont disponibles dans `storage/logs/api.log` :
```bash
# Voir les logs en temps réel
tail -f storage/logs/api.log

# Filtrer les logs API
grep "API Access" storage/logs/api.log
```

### Structure des logs
```json
{
  "method": "POST",
  "url": "http://localhost:8000/api/v1/appointments",
  "ip": "127.0.0.1",
  "user_agent": "curl/7.68.0",
  "user_id": 1,
  "status_code": 201,
  "duration_ms": 45.67,
  "timestamp": "2024-10-21T18:03:45.000000Z"
}
```

## 🛡️ Sécurité

### Headers de sécurité
Les headers suivants sont automatiquement ajoutés :
- Protection XSS
- Protection contre le clickjacking
- Politique de référent
- Configuration CORS

### Authentification
- Tokens Sanctum pour l'API
- Middleware d'authentification
- Gestion des rôles (patient, doctor, admin)

## 🚨 Dépannage

### Erreurs communes
1. **Erreur de base de données** : Vérifier que le fichier `database/database.sqlite` existe
2. **Erreur de permissions** : Vérifier les permissions sur `storage/` et `bootstrap/cache/`
3. **Erreur de token** : Vérifier la configuration Sanctum dans `.env`

### Commandes de diagnostic
```bash
# Vérifier la configuration
php artisan config:show

# Vérifier les routes
php artisan route:list --path=api

# Vérifier les middlewares
php artisan route:list --middleware=auth

# Tester la connexion DB
php artisan tinker
>>> DB::connection()->getPdo();
```

## 📚 Ressources

- [Documentation Laravel](https://laravel.com/docs)
- [Laravel Sanctum](https://laravel.com/docs/sanctum)
- [Collection Postman](postman/API_Medical_Management.postman_collection.json)
- [Tests](tests/README.md)

## 🤝 Support

Pour toute question ou problème :
1. Vérifier les logs dans `storage/logs/`
2. Consulter la documentation
3. Créer une issue sur GitHub