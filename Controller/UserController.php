<?php

class UserController
{

    private $userManager;
    private $user;
    private $db;

    public function __construct($db1)
    {
        require_once('./Model/User.php');
        require_once('./Model/Connection.php');
        require_once('./Model/UserManager.php');

        $this->db = $db1;
        $this->userManager = new UserManager($db1);
    }

    public function login()
    {
        $page = 'login';
        require('./View/default.php');
    }

    public function doLogin()
    {

        // Cette action teste l'existence d'un utilisateur de email $_POST['email'] et de password $_POST['password']
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $this->userManager = new UserManager($this->db);
        $users = $this->userManager->findByEmail($email);

        $data = array(
            'email' => $email,
            'password' => $password
        );

        $this->user = new User($data);

        // Le user extrait par le UserManager est renvoyé dans $result

        // A vous d'écrire les 3 lignes correspondantes
        $result = $this->userManager->login($this->user);

        if ($result) {
            $info = "Connexion reussie";
            $_SESSION['user'] = $result;
            $page = 'home';
        } else {
            $info = "Identifiants incorrects.";
        }

        require('./View/default.php');
    }

    public function logout()
    {
        $_SESSION['user'] = null;

        $page = 'home';
        require('./View/default.php');
    }

    public function doCreate()
    {

        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['address']) && isset($_POST['postalCode']) && isset($_POST['city'])) {
            $alreadyExist = $this->userManager->findByEmail($_POST['email']);

            if (empty($alreadyExist)) {

                $data = array(
                    'email' => $_POST['email'],
                    'password' => sha1($_POST['password']),
                    'lastName' => $_POST['lastName'],
                    'firstName' => $_POST['firstName'],
                    'address' => $_POST['address'],
                    'postalCode' => $_POST['postalCode'],
                    'city' => $_POST['city']
                );

                $newUser = new User($data);
                $this->userManager->create($newUser);
                $page = 'login';
            } else {
                $error = "ERROR : This email (" . $_POST['email'] . ") is used by another user";
                $page = 'home';
            }
        }
        require('./View/default.php');
    }

    public function usersList()
    {
        if ($_SESSION['user']['admin'] == "1") {
            $page = "usersList";
        } else {
            $page = "unauthorized";
        }

        require('./View/default.php');
    }

    public function create()
    {
        $page = "createAccount";
        require_once('./View/default.php');
    }

    public function tabUsersList()
    {
        $users = $this->userManager->findAll();
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['password'] . "</td>";
            echo "<td>" . $user['firstName'] . "</td>";
            echo "<td>" . $user['lastName'] . "</td>";
            echo "<td>" . $user['admin'] . "</td>";
            echo "</tr>";
        }
    }
}
