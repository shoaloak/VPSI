<?php

class QueryBuilder
{
    protected $pdo;
    protected $salt;

    public function __construct($pdo, $salt)
    {
        $this->pdo = $pdo;
        $this->salt = $salt;
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM Users';
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
        //return $statement->fetchAll(PDO::FETCH_CLASS);
    }


    public function getUser($name, $pass)
    {
        $sql = 'SELECT * FROM Users WHERE username = ? AND password = ?';
        $statement = $this->pdo->prepare($sql);

        $hash = crypt($pass, $this->salt);
        $statement->execute([$name, $hash]);
        //echo $statement->rowCount();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'User');
        //return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function createUser($name, $pass)
    {
        $sql = 'INSERT INTO Users (username,password) VALUES (?,?)';
        $statement = $this->pdo->prepare($sql);

        $hash = crypt($pass, $this->salt);
        $statement->execute([$name, $hash]);

        return ($statement->rowCount() === 1);
    }

    public function destroyUser($id)
    {
        $sql = 'DELETE FROM Users WHERE id='.$id;
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        return ($statement->rowCount() === 1);
    }

    public function authUser($name, $pass)
    {
        $sql = 'SELECT * FROM Users WHERE username = ? AND password = ?';
        $statement = $this->pdo->prepare($sql);

        $hash = crypt($pass, $this->salt);
        $statement->execute([$name, $hash]);

        return $statement->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public function createVPS($userid)
    {
        $sql = 'INSERT INTO VPSs (id) VALUES (0)';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        if ($statement->rowCount() !== 1){
            return False;
        }

        $sql = 'SELECT LAST_INSERT_ID()';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        $id = $statement->fetch()[0];

        $sql = 'INSERT INTO UsersOwn (user_id,vps_id) VALUES (?,?)';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$userid, $id]);
        if ($statement->rowCount() !== 1){
            return False;
        }
        return $id;
    }

    public function fillipv4VPS($vpsid, $ipv4)
    {
        $sql = 'INSERT INTO VPSs (ipv4) VALUES (?) WHERE id=?';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$ipv4, $vpsid]);

        if ($statement->rowCount() !== 1){
            return False;
        }
    }

    public function getVPSs($userid)
    {
        $sql = 'SELECT id,location,ipv4 FROM VPSs INNER JOIN UsersOwn ON user_id=(?) and vps_id=id;';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$userid]);

        return $statement->fetchAll(PDO::FETCH_CLASS, 'VPS');
    }
}


