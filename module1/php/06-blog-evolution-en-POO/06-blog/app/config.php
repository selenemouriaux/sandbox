<?php 

/**
 * Définition de constantes de configuration
 */

/**
 * Chemin absolu vers le dossier du projet 
 * On s'aide de la constate magique __DIR__ qui contient le chemin absolu vers le 
 * répertoire dans lequel on se trouve
 */ 
const PROJECT_DIR = __DIR__ . '/..';

/**
 * Chemin absolu vers le répertoire des templates
 */
const TEMPLATE_DIR = PROJECT_DIR .'/templates';

/**
 * Identifiants de connexion à la base de données
 */
const DB_HOST = 'localhost'; // Hôte (domaine du serveur de BDD)
const DB_NAME = 'blog'; // Nom de la base de données
const DB_USER = 'root'; // Utilisateur de la base de données
const DB_PASSWORD = 'root'; // Mot de passe

/**
 * Url de base pour le chargement du javascript depuis le public
 */
const BASE_URL = "http://localhost/sandbox/module1/php/06-blog-%C3%A9volution-en-POO/06-blog/";