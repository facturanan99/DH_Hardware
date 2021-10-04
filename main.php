<?php
Class DHStore{
    private $server =  "mysql:host=localhost;dbname=dh";
    private $user = "root";
    private $password = "";
    protected $con;

    // Set the default mode to Fetch ASSOC
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    // Start Connection
    public function openConnection(){
        try{
            $this->con = new PDO($this->server, $this->user, $this->password, $this->options);
            return $this->con;
        } catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }

    // Close Connection
    public function closeConnection(){
        $this->con = null;
    }

    // Check if the email is already taken
    public function checkEmail($email){
        $connection = $this->openConnection();
        $query = $connection->prepare("SELECT * FROM employee WHERE email = ?");
        $query->execute([$email]);

        $total = $query->rowCount();
        return $total;
    }

    // Add new employee
    public function addEmployee(){
        if(isset($_POST['submit'])){

            // Store the data inputted into these variables
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $age = $_POST["age"];
            $address = $_POST["address"];
            $position = $_POST["position"];

            // Check if the email is available
            if($this->checkEmail($email) == 0){
                // Start connection
                $con = $this->openConnection();
                $query = $con->prepare("INSERT INTO employee(`name`, `lastname`, `email`, `password`, `age`, `address`, `position`) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $query->execute([$fname, $lname, $email, $password, $age, $address, $position]);
                echo "<script>alert('Employee successfully added to the database'); </script>";
            } else {
                echo "<script>alert('Email Already Taken');</script>";
            }
        }
    }

    // Check if the email is already taken USER Side
    public function checkUserEmail($email){
        $connection = $this->openConnection();
        $query = $connection->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);

        $total = $query->rowCount();
        return $total;
    }

    // Add new user
    public function addUser(){
        if(isset($_POST['submit'])){

            // Store the data inputted into these variables
            $fname = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $pass_ver = md5($_POST['pass-confirmation']);
            $age = $_POST["age"];
            $address = $_POST["address"];
            $contact_no = $_POST["contact-no"];
            $b_date = $_POST["b_date"];

            // Check if all the input are sign and the check password verification
            if($password != $pass_ver){
                echo "<script>alert('The password is not the same as the previews one');</script>";
            } else {
                // Check if the email is available
                if($this->checkUserEmail($email) == 0){
                    // Start connection
                    $con = $this->openConnection();
                    $query = $con->prepare("INSERT INTO user(`full_name`, `email`, `password`, `pass_verification`, `address`, `age`, `contact_number`, `birth_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $query->execute([$fname, $email, $password, $pass_ver, $address, $age, $contact_no, $b_date ]);
                    echo "<script>alert('User successfully added to the database'); </script>";
                } else {
                    echo "<script>alert('Email Already Taken');</script>";
                }
            }
        }
    }

    // User login
    public function userLogin(){
        if(isset($_POST['login'])){
            $email = $_POST["email"];
            $password = md5($_POST["password-login"]);

            $con = $this->openConnection();
            $query = $con->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
            $query->execute([$email, $password]);
            $users = $query->fetchAll();
            $userCount = $query->rowCount();
            if($userCount > 0){
                echo("<script> location.replace('index.php')</script>");
            } else {
                echo "No Records";
            }
            
        }
    }


    // Show Employees
    public function showEmployees(){
        $con = $this->openConnection();
        $query = $con->prepare("SELECT * FROM employee");
        $query->execute();
        $employees = $query->fetchAll();
        $employeeCount = $query->rowCount();

        if($employeeCount > 0){
            return $employees;
        } else {
            echo "THE DATABASE IS EMPTY";
        }

    }

    // Show Products
    public function displayProducts(){
        $con = $this->openConnection();
        $query = $con->prepare("SELECT * FROM products");
        $query->execute();
        $items = $query->fetchAll();
        $itemsCount = $query->rowCount();

        if($itemsCount > 0){
            return $items;
        } else {
            echo "No items in the database";
        }
    }

}

// INSTANCIATE THE CLASS
$store = new DHStore();

?>