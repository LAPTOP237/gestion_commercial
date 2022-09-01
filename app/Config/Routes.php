<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Index 
$routes->get('/', 'Home::index');
$routes->post('login', 'AuthController::login');

// Calender
$routes->get('calendar', 'Home::show_calendar');

//Gestion des Clients
$routes->get('client', 'ClientController::index');
$routes->post('action_client', 'ClientController::action');
$routes->post('fetch_single_client', 'ClientController::fetch_single_data');
$routes->post('fetch_all_client', 'ClientController::fetch_all');
$routes->post('delete_client', 'ClientController::delete');

//Gestion des Travaux
$routes->get('travaux', 'TravailController::index');
$routes->post('action_travail', 'TravailController::action');
$routes->post('fetch_single_travail', 'TravailController::fetch_single_data');
$routes->post('fetch_all_travail', 'TravailController::fetch_all');
$routes->post('delete_travail', 'TravailController::delete');
$routes->post('etat-travail', 'TravailController::changeEtat');

//Gestion Proformas
$routes->get('list-proforma', 'ProformaController::index');
$routes->get('add-proforma', 'ProformaController::show_add_proforma');
$routes->post('save-proforma', 'ProformaController::add_proforma');
$routes->post('action_ligne_proforma', 'ProformaController::action_ligne');
$routes->post('fetch_single_ligne_proforma', 'ProformaController::fetch_single_data_ligne');
$routes->post('fetch_all_ligne_proforma', 'ProformaController::fetch_all_ligne');
$routes->post('delete_ligne_proforma', 'ProformaController::delete_ligne');
$routes->post('update-proforma(:num)', 'ProformaController::update_proforma/$1');
$routes->get('pdf-proforma(:num)', 'ProformaController::GenProforma/$1');
$routes->get('delete-proforma(:num)', 'ProformaController::destroy_proforma/$1');
$routes->post('etat-proforma', 'ProformaController::changeEtat');


//Gestion Facture
$routes->get('list-facture', 'FactureController::index');
$routes->get('add-facture', 'FactureController::show_add_facture');
$routes->post('save-facture', 'FactureController::add_facture');
$routes->post('action_ligne_facture', 'FactureController::action_ligne');
$routes->post('fetch_single_ligne_facture', 'FactureController::fetch_single_data_ligne');
$routes->post('fetch_all_ligne_facture', 'FactureController::fetch_all_ligne');
$routes->post('delete_ligne_facture', 'FactureController::delete_ligne');
$routes->post('update-facture(:num)', 'FactureController::update_facture/$1');
$routes->get('pdf-facture(:num)', 'FactureController::GenFacture/$1');
$routes->get('delete-facture(:num)', 'FactureController::destroy_facture/$1');
$routes->post('etat-facture', 'FactureController::changeEtat');

//Reglement
$routes->get('add-recu', 'FactureController::index2');
$routes->post('action_recu', 'FactureController::action_recu');
$routes->post('fetch_single_recu', 'FactureController::fetch_single_data_recu');
$routes->post('fetch_all_recu', 'FactureController::fetch_all_recu');
$routes->post('delete_recu', 'FactureController::delete_recu');
$routes->get('pdf-recu(:num)', 'FactureController::GenRecu/$1');


//Gestion Commande
$routes->get('list-commande', 'CommandeController::index');
$routes->get('add-commande', 'CommandeController::show_add_commande');
$routes->post('save-commande', 'CommandeController::add_commande');
$routes->post('action_ligne_commande', 'CommandeController::action_ligne');
$routes->post('fetch_single_ligne_commande', 'CommandeController::fetch_single_data_ligne');
$routes->post('fetch_all_ligne_commande', 'CommandeController::fetch_all_ligne');
$routes->post('delete_ligne_commande', 'CommandeController::delete_ligne');
$routes->post('update-commande(:num)', 'CommandeController::update_commande/$1');
$routes->get('pdf-commande(:num)', 'CommandeController::GenCommande/$1');
$routes->get('delete-commande(:num)', 'CommandeController::destroy_commande/$1');
$routes->post('etat-commande', 'CommandeController::changeEtat');

//Gestion Livraison
$routes->get('list-livraison', 'LivraisonController::index');
$routes->get('add-livraison', 'LivraisonController::show_add_livraison');
$routes->post('save-livraison', 'LivraisonController::add_livraison');
$routes->post('action_ligne_livraison', 'LivraisonController::action_ligne');
$routes->post('fetch_single_ligne_livraison', 'LivraisonController::fetch_single_data_ligne');
$routes->post('fetch_all_ligne_livraison', 'LivraisonController::fetch_all_ligne');
$routes->post('delete_ligne_livraison', 'LivraisonController::delete_ligne');
$routes->post('update-livraison(:num)', 'LivraisonController::update_livraison/$1');
$routes->get('pdf-livraison(:num)', 'LivraisonController::GenLivraison/$1');
$routes->get('delete-livraison(:num)', 'LivraisonController::destroy_livraison/$1');
$routes->post('etat-livraison', 'LivraisonController::changeEtat');


// Pages
$routes->get('pages-login', 'AuthController::index');
$routes->get('pages-register', 'Home::show_pages_register');
$routes->get('pages-recoverpw', 'Home::show_pages_recoverpw');
$routes->get('pages-lock-screen', 'Home::show_pages_lock_screen');
$routes->get('pages-profile', 'Home::show_pages_profile');
$routes->get('pages-maintenance', 'Home::show_pages_maintenance');
$routes->get('pages-comingsoon', 'Home::show_pages_comingsoon');
$routes->get('pages-404', 'Home::show_pages_404');
$routes->get('pages-500', 'Home::show_pages_500');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
