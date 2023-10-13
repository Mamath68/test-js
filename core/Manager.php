<?php

namespace Core;

abstract class Manager
{

    protected function connect()
    {
        DAO::connect();
    }

    // /**
    //  * Recupère toutes les colonnes des tables, ordonnée par champs et ordre selon envie
    //  * 
    //  * @param array $order an array with field and order option
    //  * @return Collection a collection of objects hydrated by DAO, which are results of the request sent
    //  */
    public function findAll($order = null)
    {

        $orderQuery = ($order) ?
            "ORDER BY " . $order[0] . " " . $order[1] :
            "";
        // $sql obtient la fonction : Selectionne tout de la table renseigné dans la valeurs tablename, trié par la fonction $orderQuery.
        $sql = "SELECT *
                    FROM " . $this->tableName . " a
                    " . $orderQuery;
        // obtient plusieurs résultats, en théories. 
        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }
    // Fonction pour trouver les données par l'id renseigné.
    public function findOneById($id)
    {

        // Selectionne tout de la table renseigné dans la valeurs tablename, où l'id est égale a l'id renseigné.
        $sql = "SELECT *
                    FROM " . $this->tableName . " a
                    WHERE a.id_" . $this->tableName . " = :id
                    ";
        // Retourne soit un soit aucun résultat, toujours, selon l'id renseigné.
        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id], false),
            $this->className
        );
    }

    //$data = ['username' => 'Squalli', 'password' => 'dfsyfshfbzeifbqefbq', 'email' => 'sql@gmail.com'];

    public function add($data)
    {
        //$keys = ['username' , 'password', 'email']
        $keys = array_keys($data);
        //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com']
        $values = array_values($data);
        //"username,password,email"
        $sql = "INSERT INTO " . $this->tableName . "
                    (" . implode(',', $keys) . ") 
                    VALUES
                    ('" . implode("','", $values) . "')";
        //"'Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'"
        /* INSERT INTO user (username,password,email) VALUES ('Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com') 
         */
        try {
            return DAO::insert($sql);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    // $sql obtient la fonction : Détruire(selon ce qui sera remplis par la suite) de la table (remplis dans la valeurs de tablemame) ou l'id est égale a l'id renseigné.
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id
                    ";

        return DAO::delete($sql, ['id' => $id]);
    }
    // Fonction générant autant de valeurs que necessaire, enfin que disponible.
    private function generate($rows, $class)
    {
        foreach ($rows as $row) {
            yield new $class($row);
        }
    }

    public function edit($data, $id = null)
    {
        //$keys = ['username' , 'password', 'email']
        $keys = array_keys($data);
        //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com']
        $values = array_values($data);
        //"username,password,email"
        $sql = "UPDATE " . $this->tableName . "
                SET  " . implode(',', $keys) . "
                =
                '" . implode("','", $values) . "'
                WHERE id" . $this->tableName . "= :id ";
        try {
            return DAO::update($sql, ["id" => $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    // Fonction obtenant plusieurs résultats.
    protected function getMultipleResults($rows, $class)
    {

        if (is_iterable($rows)) {
            return $this->generate($rows, $class);
        } else
            return null;
    }
    // fonction obtenant un ou Zeros résultats
    protected function getOneOrNullResult($row, $class)
    {

        if ($row != null) {
            return new $class($row);
        }
        return false;
    }
    // j'avoue ne pas comprendre celle-ci, a voir avec un prof un jours.
    protected function getSingleScalarResult($row)
    {

        if ($row != null) {
            $value = array_values($row);
            return $value[0];
        }
        return false;
    }
}
