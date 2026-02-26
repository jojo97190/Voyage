# Karukera Travel

Site web de réservation de voyages permettant aux utilisateurs de consulter des destinations, réserver un voyage et contacter l'agence.

## Technologies utilisées

- **Frontend** : HTML, CSS, JavaScript
- **Backend** : PHP
- **Base de données** : MySQL (via MySQLi)
- **Serveur local** : WAMP

## Structure du projet

```
├── index.php          # Page d'accueil avec carrousel et avis clients
├── voyage.php         # Liste des destinations avec filtres (prix, nom, date)
├── Reservation.html   # Formulaire de réservation
├── reservation.php    # Traitement de la réservation (insertion en BDD)
├── contact.html       # Formulaire de contact
├── contact.php        # Traitement du message de contact (insertion en BDD)
├── Accueil.css        # Styles de la page d'accueil
├── voyage.css         # Styles de la page des voyages
├── reservation.css    # Styles du formulaire de réservation
├── contact.css        # Styles du formulaire de contact
└── voyage.js          # Script JS pour l'affichage des blocs de destination
```

## Fonctionnalités

- **Page d'accueil** : présentation de l'agence, carrousel d'images des destinations, tableau des avis clients
- **Nos Voyages** : affichage des destinations disponibles avec filtres par nom, prix et date de départ ; fiches descriptives dépliables pour chaque ville
- **Réservation** : formulaire de réservation avec choix de la destination et des dates
- **Contact** : formulaire de contact enregistré en base de données

## Destinations disponibles

Paris, Tokyo, Londres, Sydney, Rome, Barcelone, New York, Berlin, Moscou, Pékin, Rio de Janeiro, Le Caire, Bangkok, Istanbul, Los Angeles