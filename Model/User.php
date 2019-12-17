<?php

class User
{

    //! Attributs 
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $address;
    private $postalCode;
    private $city;

    //! Construct
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    //! Getters and Setters

    public final function setId($id)
    {
        $this->id = $id;
    }
    public final function getId()
    {
        return $this->id;
    }


    public final function setEmail($email)
    {
        $this->email = $email;
    }
    public final function getEmail()
    {
        return $this->email;
    }

    public final function setPassword($password)
    {
        $this->password = $password;
    }
    public final function getPassword()
    {
        return $this->password;
    }


    public final function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public final function getFirstName()
    {
        return $this->firstName;
    }


    public final function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public final function getLastName()
    {
        return $this->lastName;
    }


    public final function setAddress($address)
    {
        $this->address = $address;
    }
    public final function getAddress()
    {
        return $this->address;
    }


    public final function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
    public final function getPostalCode()
    {
        return $this->postalCode;
    }


    public final function setCity($city)
    {
        $this->city = $city;
    }
    public final function getCity()
    {
        return $this->city;
    }


    //! Methods
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
