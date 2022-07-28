<?php
namespace Models;
require_once ('Model.php');

class Session extends Model {
    public  function isLoggedIn()
    {
        $sessionId = $_COOKIE['session'] ?? '';
        $signature = $_COOKIE['signature'] ?? '';
        if ($sessionId && $signature) {
            $hash = hash_hmac('sha256', $sessionId, 'We Love Donkeys !');
            $match = hash_equals($signature, $hash);
            if ($match) {
                $sessionStatement = $this->pdo->prepare('SELECT * FROM session WHERE id=:id');
                $sessionStatement->bindValue(':id', $sessionId);
                $sessionStatement->execute();
                $session = $sessionStatement->fetch();
                if ($session) {
                    $userStatement = $this->pdo->prepare('SELECT * FROM user WHERE id=:id');
                    $userStatement->bindValue(':id', $session['userid']);
                    $userStatement->execute();
                    $user = $userStatement->fetch();
                }
            }
        }
        return $user ?? false;
    }
    public function logoutToDo(): void{
        $sessionId = $_COOKIE['session'] ?? '';
        if ($sessionId) {
            $statement = $this->pdo->prepare('DELETE FROM session WHERE id=:id');
            $statement->bindValue(':id', $sessionId);
            $statement->execute();
            setcookie('session', '', time() - 1);
            header('Location: /index.php');
        } else {
            header('Location: /index.php');
        }
    }
    public function loginCheck() :void
    {
        $input = filter_input_array(INPUT_POST, [
            'email' => FILTER_SANITIZE_EMAIL,
        ]);
        $password = $_POST['password'] ?? '';
        $email = $input['email'] ?? '';
        $_SESSION['login'] = trim($_POST['email']);
        if (!$password || !$email) {
            $error = 'ERROR';
        } else {
            $statementUser = $this->pdo->prepare('SELECT * FROM user WHERE email=:email');
            $statementUser->bindValue(':email', $email);
            $statementUser->execute();
            $user = $statementUser->fetch();
            if (password_verify($password, $user['password'])) {
                $sessionId = bin2hex(random_bytes(32));
                $statementSession = $this->pdo->prepare('INSERT INTO session VALUES (:sessionid, :userid )');
                $statementSession->bindValue(':userid', $user['id']);
                $statementSession->bindValue(':sessionid', $sessionId);
                $statementSession->execute();
                $signature = hash_hmac('sha256', $sessionId, 'We Love Donkeys !');
                setcookie('session', $sessionId, time() + 60 * 60 * 24 * 7, '', '', false, true);
                setcookie('signature', $signature, time() + 60 * 60 * 24 * 7, '', '', false, true);
                header('Location: /index.php');
            } else {
                $error = "MAUVAIS PASSWORD !";
            }
        }
    }
}