<?php
function pdo_create_database(){

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
      $conn = new PDO("mysql:host=$servername", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE DrugDispensary";
      // use exec() because no results are returned
     $conn->exec($sql);
      //echo "Database created successfully<br>";
    } catch(PDOException $e) {
      //echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function pdo_create_accounts_table(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DrugDispensary";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // sql to create table
      $sql = "
      CREATE TABLE IF NOT EXISTS `accounts` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(50) NOT NULL,
          `password` varchar(255) NOT NULL,
          `email` varchar(100) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
      ";
    
      // use exec() because no results are returned
      $conn->exec($sql);
      //echo "Table MyGuests created successfully";
    } catch(PDOException $e) {
      //echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;

}


function pdo_create_products_table() {


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DrugDispensary";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // sql to create table
      $sql = "
      CREATE TABLE IF NOT EXISTS `products` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(200) NOT NULL,
        `desc` text NOT NULL,
        `price` decimal(7,2) NOT NULL,
        `rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
        `quantity` int(11) NOT NULL,
        `img` text NOT NULL,
        `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
      ";
    
      // use exec() because no results are returned
      $conn->exec($sql);
      //echo "Table MyGuests created successfully";
    } catch(PDOException $e) {
      //echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;

}

function pdo_insert_products(){
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "DrugDispensary";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "
  INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Apetamine', '<p>Apetamin is a vitamin syrup that is marketed as a weight gain supplement. It was developed by TIL Healthcare PVT, a pharmaceutical company based in India. </p>', '29.99', '0.00', 10, 'apetamine.jpg', '2019-03-13 17:55:22'),
(2, 'Photoblock', '<p>Photoblock gel provides a high sun protection SPF 50 in a water base gel formula that is non-comedogenic and suitable to use for oily and acne-prone skin.</p>', '14.99', '19.99', 34, 'photoblock.jpg', '2019-03-13 18:52:49'),
(3, 'Cera cream', '<p>CeraVe Moisturizing Cream includes 3 essential ceramides that work together to lock in your skin moisture and help restore your skin protective barrier. MVE technology encapsulates ceramides to ensure efficient delivery within the skin barrier and slow release over time. Supporting your protective skin barrier, long after you have finish applying.</p>', '19.99', '0.00', 23, 'ceracream.jpg', '2019-03-13 18:47:56'),
(4, 'UV Mune', '<p>Very high UVA/UVB facial sun protection. Our ultimate protection with Ultra Long UVA protection. Ultra resistant formula specifically developed for sensitive skin.</p>', '69.99', '0.00', 7, 'uvmune.jpg', '2019-03-13 17:42:04');
  
  ";
  // use exec() because no results are returned
  $conn->exec($sql);
  //echo "New record created successfully";
} catch(PDOException $e) {
  //echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}

function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'DrugDispensary';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>DawaDispensary</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, DawaDispensary</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>