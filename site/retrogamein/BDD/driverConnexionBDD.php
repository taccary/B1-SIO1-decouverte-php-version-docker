<?php
include_once 'infosConnexionBDD.inc.php'; // inclusion du fichier de paramètres de connexion à la BDD
try
        {
                $connexion = new PDO($_ENV["dsn"], $_ENV["username"], $_ENV["password"], $_ENV["options"]);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connexion->exec('SET NAMES utf8');
        }
catch(Exception $e)
        {
                echo 'Une erreur de connexion à la BDD est survenue !';
                die();
        }


// Configuration de la locale pour le formatage des dates en français avec strftime dans la page calendrier.php
setlocale(LC_TIME, 'fr_FR.UTF-8');
