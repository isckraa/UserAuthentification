<?php
class UserManager
{

    private $db;

    // BUILDER
    public function __construct($db)
    {
        $this->db = $db;
    }

    // ACTION LOGIN
    public function login(User $user)
    {
        $req = $this->db->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
        $req->execute(
            array(
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            )
        );
        return $req->fetch();
    }

    // CREATE USER
    public function create(User $user)
    {

        $req = $this->db->prepare(
            'INSERT INTO users (email, password, firstName, lastName, address, postalCode, city, admin) VALUES ( :email, :password, :firstName, :lastName, :address, :postalCode, :city, 0 )'
        );


        $req->execute(

            array(
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'address' => $user->getAddress(),
                'postalCode' => $user->getPostalCode(),
                'city' => $user->getCity()
            )
        );

        echo "Include ok";
    }

    // GET ALL USERS
    public function findAll()
    {
        $req = $this->db->prepare('SELECT * FROM users');
        $req->execute();
        return $req->fetchAll();
    }


    // GET USER BY ID
    public final function findOne($id)
    {
        $req = $this->db->prepare('SELECT * FROM users WHERE id=:id');
        $req->execute();
        return $req->fetchAll();
    }

    // GET USER BY EMAIL
    public final function findByEmail($email)
    {
        $req = $this->db->prepare('SELECT * FROM users WHERE email=:email');
        $req->execute(
            array(
                'email' => $email
            )
        );
        return $req->fetchAll();
    }

    // UPDATE USER
    public final function update(User $user)
    {

        $req = $this->db->prepare(
            'UPDATE users SET lastName=:lastName, firstName=:firstName, email=:email, address=:address, postalCode=:postalCode, city=:city, password=:password WHERE id=:id;'
        );

        $req->execute(

            array(
                'id' => $user->getId(),
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'email' => $user->getEmail(),
                'address' => $user->getAddress(),
                'postalCode' => $user->getPostalCode(),
                'city' => $user->getCity(),
                'password' => $user->getPassword()
            )
        );
    }


    // DELETE USER
    public final function delete(User $user)
    {
        $req = $this->db->prepare(
            'DELETE FROM users WHERE id=' . $user->getId() . ';'
        );
        $req->execute();
    }
}
