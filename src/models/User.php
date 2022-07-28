<?php
namespace Models;
require_once ('Model.php');

class User extends Model
{
    public function finUsersById(string $userProfile) : array
    {
        $query = $this->pdo->query("SELECT * FROM user WHERE username = '$userProfile'");
        $username = $query->fetchAll();
        return $username;
    }
    public function upDateProfil(array $currentUser): void
    {
        try {
            if (isset($_POST['username'], $_POST['email'], $_POST['lastname'], $_POST['firstname'], $_POST['adress'], $_POST['zipcode'], $_POST['city'], $_POST['phone'])) {

                $query = $this->pdo->prepare("UPDATE user SET username = :username, email = :email, lastname = :lastname, firstname = :firstname, adress = :adress, zipcode = :zipcode, city = :city, phone = :phone WHERE id = :id");
                $query->bindValue(':username', $_POST['username']);
                $query->bindValue(':email', $_POST['email']);
                $query->bindValue(':lastname', $_POST['lastname']);
                $query->bindValue(':firstname', $_POST['firstname']);
                $query->bindValue(':adress', $_POST['adress']);
                $query->bindValue(':city', $_POST['city']);
                $query->bindValue(':zipcode', $_POST['zipcode']);
                $query->bindValue(':phone', $_POST['phone']);
                $query->bindValue(':id', $_POST['id']);
                $query->execute();
            }
            $query = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
            $query->execute([
                'id' => $currentUser['id']
            ]);
            $user = $query->fetch();
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }
    public function registerToDo(): void
    {
        $input = filter_input_array(INPUT_POST, [
            'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
            'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'zipcode' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ]);
        $username = $input['username'] ?? '';
        $email = $input['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $lastname = $input['lastname'] ?? '';
        $firstname = $input['firstname'] ?? '';
        $adress = $_POST['adress'] ?? '';
        $zipcode = $input['zipcode'] ?? '';
        $city = $_POST['city'] ?? '';
        $phone = $_POST['phone'] ?? '';
        if (!$username || !$password || !$email || !$lastname || !$firstname || !$adress || !$zipcode || !$city || !$phone) {
            $error = 'ERROR';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
            $statement = $this->pdo->prepare('INSERT INTO user VALUES (
            DEFAULT,
            :email,
            :username,
            :password,
            :lastname,
            :firstname,
            :adress,
            :city,
            :zipcode, 
            :phone
        )');
            $statement->bindValue(':email', $email);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $hashedPassword);
            $statement->bindValue(':lastname', $lastname);
            $statement->bindValue(':firstname', $firstname);
            $statement->bindValue(':adress', $adress);
            $statement->bindValue(':zipcode', $zipcode);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':phone', $phone);
            $statement->execute();
            header('location : index.php?controller=session&task=login');
        }
    }
}