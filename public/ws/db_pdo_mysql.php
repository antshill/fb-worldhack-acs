<?php
/**
 * MySQL DB. All data is stored in data_pdo_mysql database
 * Create an empty MySQL database and set the dbname, username
 * and password below
 * 
 * This class will create the table with sample data
 * automatically on first `get` or `get($id)` request
 */
class DB_PDO_MySQL
{
    private $db;
    function __construct ()
    {
        try {
//update the dbname username and password to suit your server
            $this->db = new PDO(
            'mysql:host=localhost;dbname=acs-fbworldhack', 'root', '');
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
            PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }
    function getUser ($id, $installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM user WHERE id = ' . mysql_escape_string(
            $id);
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getAllUsers ($installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM user';
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getItem ($id, $installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM item WHERE id = ' . mysql_escape_string(
            $id);
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getAllItems ($installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM item';
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getSponsorship ($id, $installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM sponsorship WHERE id = ' . mysql_escape_string(
            $id);
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getDonation ($id, $installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM donation WHERE id = ' . mysql_escape_string(
            $id);
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getDonationByUserId ($id, $installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM donation WHERE user_id = ' . mysql_escape_string(
            $id);
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function getSponsorshipsByUserId ($id, $installTableOnFailure = FALSE)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $sql = 'SELECT * FROM sponsorship WHERE user_id = ' . mysql_escape_string(
            $id);
            return $this->id2int($this->db->query($sql)
                ->fetch());
        } catch (PDOException $e) {
            if (! $installTableOnFailure && $e->getCode() == '42S02') {
//SQLSTATE[42S02]: Base table or view not found: 1146 Table 'authors' doesn't exist
                $this->install();
                return $this->get($id, TRUE);
            }
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }
    }

    function insertUser ($rec)
    {
        $fb_id = mysql_escape_string($rec['fb_id']);
        $name = mysql_escape_string($rec['name']);
        $locale = mysql_escape_string($rec['locale']);
        $fb_username = mysql_escape_string($rec['fb_username']);
        $sql = "INSERT INTO user (fb_id, name, locale, fb_username) VALUES ('$fb_id', '$name', '$locale', '$fb_username')";
        if (! $this->db->query($sql))
            return FALSE;
        return $this->get($this->db->lastInsertId());
    }

    function insertDonation ($rec)
    {
        $sponsor_id = mysql_escape_string($rec['sponsor_id']);
        $user_id = mysql_escape_string($rec['user_id']);
        $amount = mysql_escape_string($rec['amount']);
        $sql = "INSERT INTO donation (sponsor_id, user_id, amount) VALUES ('$sponsor_id', '$user_id', '$amount')";
        if (! $this->db->query($sql))
            return FALSE;
        return $this->get($this->db->lastInsertId());
    }

    function insertSponsorship ($rec)
    {
        $user_id = mysql_escape_string($rec['user_id']);
        $item_id = mysql_escape_string($rec['item_id']);
        $amount_remaining = mysql_escape_string($rec['amount_remaining']);
        $expiration = mysql_escape_string($rec['expiration']);
        $sql = "INSERT INTO sponsorship (user_id, item_id, amount_remaining, expiration) VALUES ('$user_id', '$item_id', '$amount_remaining', '$expiration')";
        if (! $this->db->query($sql))
            return FALSE;
        return $this->get($this->db->lastInsertId());
    }

    function insertItem ($rec)
    {
        $name = mysql_escape_string($rec['name']);
        $cost = mysql_escape_string($rec['cost']);
        $status = mysql_escape_string($rec['status']);
        $sql = "INSERT INTO item (name, cost, status) VALUES ('$name', '$cost', '$status')";
        if (! $this->db->query($sql))
            return FALSE;
        return $this->get($this->db->lastInsertId());
    }

    function updateSponsorship ($id, $rec)
    {
        $id = mysql_escape_string($id);
        $user_id = mysql_escape_string($rec['user_id']);
        $item_id = mysql_escape_string($rec['item_id']);
        $amount_remaining = mysql_escape_string($rec['amount_remaining']);
        $expiration = mysql_escape_string($rec['expiration']);

        $sql = "UPDATE sponsorship SET user_id = '$user_id', item_id ='$item_id', amount_remaining ='$amount_remaining', expiration ='$expiration' WHERE id = $id";
        if (! $this->db->query($sql))
            return FALSE;
        return $this->get($id);
    }

    private function id2int ($r)
    {
        if (is_array($r)) {
            if (isset($r['id'])) {
                $r['id'] = intval($r['id']);
            } else {
                foreach ($r as &$r0) {
                    $r0['id'] = intval($r0['id']);
                }
            }
        }
        return $r;
    }
    private function install ()
    {
        $this->db->exec(
        "CREATE DATABASE acs-fbworldhack"
        );


        $this->db->exec(
        "CREATE TABLE `acs-fbworldhack`.achievement (
            id int(11) NOT NULL auto_increment,
            name varchar(255) NOT NULL,
            PRIMARY KEY (id)
        );");
        $this->db->exec(
        "CREATE TABLE `acs-fbworldhack`.donation (
            id int(11) NOT NULL auto_increment,
            sponsor_id int(11),
            user_id int(11) NOT NULL,
            amount decimal(0) NOT NULL,
            PRIMARY KEY (id)
        );");
        $this->db->exec(
        "CREATE TABLE `acs-fbworldhack`.item (
            id int(11) NOT NULL auto_increment,
            name varchar(255) NOT NULL,
            cost decimal(0) DEFAULT 0 NOT NULL,
            status varchar(25) DEFAULT 'ACTIVE',
            PRIMARY KEY (id)
        );");
        $this->db->exec(
        "CREATE TABLE `acs-fbworldhack`.sponsorship (
            id int(11) NOT NULL auto_increment,
            user_id int(11) NOT NULL,
            item_id int(11) NOT NULL,
            amount_remaining decimal(0) NOT NULL,
            expiration timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (id)
        );");
        $this->db->exec(
        "CREATE TABLE `acs-fbworldhack`.user (
            id int(11) NOT NULL auto_increment,
            fb_id bigint(20),
            name varchar(255) NOT NULL,
            locale varchar(255),
            fb_username varchar(255) DEFAULT 'unknown',
            PRIMARY KEY (id)
        );");
        $this->db->exec(
        "CREATE TABLE `acs-fbworldhack`.user_achievement (
            id int(11) NOT NULL auto_increment,
            user_id int(11) NOT NULL,
            achievement_id int(11) NOT NULL,
            PRIMARY KEY (id)
        );");



        $this->db->exec(
        "INSERT INTO user (fb_id, name, locale, fb_username) VALUES ('12345', 'Jac Wright', 'en_US', 'jwright');
         INSERT INTO user (fb_id, name, locale, fb_username) VALUES ('56789', 'Arul Kumaran', 'en_US', 'akumaran');
        ");
    }
}