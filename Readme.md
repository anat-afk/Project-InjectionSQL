# Projet d'injection SQL - Application vulnérable
fait par Terence AMBA, Mehdi BAKRI, Anatole MAGRAUD, Estéban De Olivera et Amadis TALAVERA.

# 📌 Objectif
Ce projet a pour but de démontrer les risques liés à l'injection SQL via une application web volontairement vulnérable. Il permet de comparer deux versions d'un formulaire de connexion :

login.php : vulnérable aux injections SQL.

login_secure.php : version sécurisée avec requêtes préparées.

# 🛠️ Technologies utilisées

PHP
MariaDB / MySQL
HTML / CSS / Bootstrap 5
Serveur local : XAMPP, APACHE


# 📁 Structure du projet
```bash
vulnerable_app/
│
├── login.php               # Formulaire vulnérable
└── create_db.sql            # Script de création de la base de données

secure_app/
│
└── login_secure.php        # Formulaire sécurisé (requêtes préparées)

└── README.md               # Ce fichier
```

# 🧪 Reproduire le test d'injection

Version vulnérable : login.php

Forme 1 : Bypass simple
- Username : ' OR '1'='1
- Password : ' OR '1'='1

Forme 2 : Ciblage d’un utilisateur
- Username : ' OR username = 'admin' --
- Password : toto (n'importe quoi)

Ces injections contournent la vérification des identifiants et permettent d'accéder à l'interface sans authentification réelle.

# 🔐 Recommandations de sécurité
Toujours utiliser des requêtes préparées ou des ORM.

Ne jamais afficher d'informations sensibles sans authentification sécurisée.

Filtrer et valider les entrées utilisateur côté serveur.

Éviter d’afficher les erreurs SQL en production.