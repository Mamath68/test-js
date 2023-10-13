<?php
namespace Core;

// /**
//  * Classe d'accès aux données de la BDD, abstraite
//  * 
//  * @property static $bdd l'instance de PDO que la classe stockera lorsque connect() sera Coreelé
//  *
//  * @method static connect() connexion à la BDD
//  * @method static insert() requètes d'insertion dans la BDD
//  * @method static select() requètes de sélection
//  */
abstract class DAO
{
    // Nom et n° de port de l'hôte
    private static $host = 'mysql:host=127.0.0.1;port=3306';
    // Nom de la Base de Donnée
    private static $dbname = ' ';
    // Identifiant pour se connecter
    private static $dbuser = 'root';
    // mot de passe, vide car pas de mdp
    private static $dbpass = '';

    private static $bdd;

    /**
     * cette méthode permet de créer l'unique instance de PDO de l'Application
     */
    public static function connect()
    {

        self::$bdd = new \PDO(
            self::$host . ';dbname=' . self::$dbname,
            self::$dbuser,
            self::$dbpass,
            array(
                    // regle les caractère en utf8
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                    // parametre les annonce d'erreurs
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    // regle les methode de recupération des données
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            )
        );
    }
    // début du CRUD
// Create, insert into, sert a ajouter, inserer dans la base de donnée des informations.
    public static function insert($sql)
    {
        try {
            $stmt = self::$bdd->prepare($sql);
            $stmt->execute();
            return self::$bdd->lastInsertId();
            //on renvoie l'id de l'enregistrement qui vient d'être ajouté en base, pour s'en servir aussitôt dans le controleur

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    // /**
    //  * Cette méthode permet les requêtes de type SELECT
    //  * 
    //  * @param string $sql la chaine de caractère contenant la requête elle-même
    //  * @param mixed $params=null les paramètres de la requête
    //  * @param bool $multiple=true vrai si le résultat est composé de plusieurs enregistrements (défaut), false si un seul résultat doit être récupéré
    //  * 
    //  * @return array|null les enregistrements en FETCH_ASSOC ou null si aucun résultat
    //  */
    // Read, select, permet de voir, selectionner ce que l'on veut voir.
    public static function select($sql, $params = null, bool $multiple = true): ?array
    {
        try {
            $stmt = self::$bdd->prepare($sql);
            $stmt->execute($params);

            $results = ($multiple) ? $stmt->fetchAll() : $stmt->fetch();

            $stmt->closeCursor();
            return ($results == false) ? null : $results;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    // Update, update, sert a modifier les informations, ex: je change le sujet pomme, par poire, ou je demenage, je vais du mulhouse a belfort, je fais un update dans la bdd.
    public static function update($sql, $params)
    {
        try {
            $stmt = self::$bdd->prepare($sql);

            //on renvoie l'état du statement après exécution (true ou false)
            return $stmt->execute($params);

        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    
    // delete,destruction, veut dire ce que ça veut dire, ça supprime les données selectionnée, ou la table complete si désirés. 
    public static function delete($sql, $params)
    {
        try {
            $stmt = self::$bdd->prepare($sql);

            //on renvoie l'état du statement après exécution (true ou false)
            return $stmt->execute($params);

        } catch (\Exception $e) {
            echo $sql;
            echo $e->getMessage();
            die();
        }
    }

}