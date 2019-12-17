
<?php
class CategoryController
{
    public function __construct($db1)
    {
        $this->db = $db1;
    }

    public function display()
    {
        $page = 'home';
        require('./View/default.php');
    }
}
