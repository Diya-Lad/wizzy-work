<?php
namespace Html;
class Table {
  public $title = "";
  public $numRows = 0;
  public function message() {
    echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
  }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;
?>

<!DOCTYPE>  
<html>  
<body>  
<?php  
echo "<h2>Hello PHP</h2>";  

// 2. Comments
// This is a single-line comment

# This is also a single-line comment

/* This is a
multi-line comment */

//3. Variables
$n = 1;
$name = "Diya";
$num = 23.5;

//4. Data types
# PHP support string, integer, float, boolean, array, object, null datatypes
# To get the data type of the variable, use var_dump() function
$x = 5;
var_dump($x);
echo "<br>";

//5. If Else Conditions
$a = 13;

if ($a > 10) {
  echo "Above 10";
  if ($a > 20) {
    echo " and also above 20";
  } else {
    echo " but not above 20";
  }
}
echo "<br>";

//6. For loops
for ($i = 0; $i <= 10; $i++) {
    echo "The number is: $i <br>";
}

//7. While loop
$i = 1;
while ($i < 4) {
  echo $i." ";
  $i++;
}

//8. Functions
# simple function
function myMessage() {
    echo "<br>Hello world!<br>";
}
myMessage();

function add_five(&$value) {
    $value += 5;
  }
  
  $num = 2;
  add_five($num);
  echo $num;

# Functions: arguments passed by reference
function fun1(&$a){
    $a += 2;
}
$b = 1;
fun1($b);
echo "$b";
echo "<br>";  

#Function with defaults arguments
// function sum($a, $b=2){
//     echo "Sum is: ". ($a + $b)."<br";
// }
// sum(2,3);

// 9. Arrays
$myArr = array("mango", 15, ["apples", "bananas"]);

# Indexed array
$num = [1,2,3];
$num[] = 4; // add array item
array_push($num, 5,6,7);
print_r($num);
array_splice($num , 1, 1); // remove item from an array
echo "<br> After removing an item from an array";
print_r($num);
echo "<br>";

# Associative array
$arr = array("name"=> "diya", "surname"=>"lad");
$arr["age"] = 21; // add item in associative array
echo "<br>";
print_r($arr);
echo "<br>";

// Loop Through an Associative Array
foreach($arr as $x => $y){
    echo "$x : $y <br>";
}

// sort() - sort arrays in ascending order
sort($num);
// rsort() - sort arrays in descending order
// asort() - sort associative arrays in ascending order, according to the value
asort($arr);
print_r($arr);
echo " <br>";
// ksort() - sort associative arrays in ascending order, according to the key
// arsort() - sort associative arrays in descending order, according to the value
// krsort() - sort associative arrays in descending order, according to the key

# Multidimentional array
$cars = array (
    array(1,2,3),
    array("BMW","Verna"),
    array(1.2,2.3),
  );

// 10. Cookies
# A cookie is created with the setcookie() function.
// setcookie(name, value, expire, path, domain, secure, httponly);
// only name parameter is required

// set coockie
$cookie_name = "diya";
$cookie_value = "d";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
// cookie set for 30 days
// "/" means cookie is available for entire website

// To check cookie is set or not
// if(!isset($_COOKIE[$cookie_name])) {
//     echo "Cookie named '" . $cookie_name . "' is not set!";
// }
// else {
//     echo "Cookie '" . $cookie_name . "' is set!<br>";
//     echo "Value is: " . $_COOKIE[$cookie_name];
// }

// To delete a cookie: set time to an hour ago
setcookie("diya", "", time() - 3600);

// To check is any cookie is set or not
if(count($_COOKIE) > 0){
    echo "Cookies are enable<br>";
}

//11. Sessions
// A session is a way to store information (in variables) to be used across multiple pages.
// Start the session
session_start();
// Set session variables
$_SESSION["color"] = "green";
$_SESSION["animal"] = "cat";
echo "Session variables are set.";

// Access session variable
echo $_SESSION["animal"];
echo "<br>";
print_r($_SESSION);
echo "<br>";

// remove all session variables
session_unset();

// destroy the session
session_destroy();

//12. JSON
// Encode in json
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
echo json_encode($age);
echo "<br>";

$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
$obj = json_decode($jsonobj);  // Accessing a decoding values

echo $obj->Peter;
echo $obj->Ben;
echo $obj->Joe;
echo "<br>";
// json_decode if we pass 2nd argument as true, then the decoded object is returned in array format

// 13. Classes / Interfaces/ OOP concepts

// Class
class Person {
    // Properties
    public $name;
    
    // Constructor
    function __construct($name) {
        $this->name = $name;
    }

    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    public function get_name() {  // added access modifier
      return $this->name;
    }

    function __destruct() {
        echo "Destructor called";
    }
  }
  
  $person = new Person('Pal');

  $person->set_name('Diya');
 
  echo $person->get_name();
  echo "<br>";

// A destructor is called when the object is destructed or the script is stopped or exited.

// Inheritance + overriding
class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
      $this->name = $name;
      $this->color = $color;
    }
    public function intro() {
      echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}
  
class Strawberry extends Fruit {
    public $weight;
    const MSG = "Hello";
    public function __construct($name, $color, $weight) {
      $this->name = $name;
      $this->color = $color;
      $this->weight = $weight;
    }
    public function intro() {
      echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.<br>";
    }
}
  
$strawberry = new Strawberry("Strawberry", "red", 50);
$strawberry->intro();

// The final keyword can be used to prevent class inheritance or to prevent method overriding.

// A constant cannot be changed once it is declared.
// We can access a constant from outside the class by using the class name followed by the scope resolution operator (::) followed by the constant name
echo Strawberry::MSG;
echo "<br>";

// abstract class
abstract class ParentClass {
    abstract protected function prefixName($name);
  }
  
  class ChildClass extends ParentClass {
    public function prefixName($name, $separator = ".", $greet = "Dear") {
      if ($name == "John Doe") {
        $prefix = "Mr";
      } elseif ($name == "Jane Doe") {
        $prefix = "Mrs";
      } else {
        $prefix = "";
      }
      return "{$greet} {$prefix}{$separator} {$name}";
    }
  }
  
  $class = new ChildClass;
  echo $class->prefixName("John Doe");
  echo "<br>";

// Interface
interface Animal {
    public function makeSound();
  }
  
  class Cat implements Animal {
    public function makeSound() {
      echo "Meow";
    }
  }
  
  $animal = new Cat();
  $animal->makeSound();

// Traits
trait message1 {
    public function msg1() {
        echo "OOP is fun! ";
      }
    }
    
    class Welcome {
      use message1;
    }
    
    $obj = new Welcome();
    $obj->msg1();
// Here, we declare one trait: message1. Then, we create a class: Welcome. The class uses the trait, and all the methods in the trait will be available in the class.
// If other classes need to use the msg1() function, simply use the message1 trait in those classes. This reduces code duplication, because there is no need to redeclare the same method over and over again.

// Static method
class domain {
    protected static function getWebsiteName() {
      return "W3Schools.com";
    }
  }
  
  class domainW3 extends domain {
    public $websiteName;
    public function __construct() {
      $this->websiteName = parent::getWebsiteName();
    }
  }
  
  $domainW3 = new domainW3;
  echo $domainW3 -> websiteName;
// notice parent keyword
// otherwise to access a static method: ClassName::MethodName
// Static properties can be called directly - without creating an instance of a class.

//  PHP Namespaces:
// Namespaces are qualifiers that solve two different problems:

//   1.  They allow for better organization by grouping classes that work together to perform a task
//   2.  They allow the same name to be used for more than one class

// A namespace declaration must be the first thing in the PHP file

$table->message();

// Iterable
// The iterable keyword can be used as a data type of a function argument or as the return type of a function:

?>  
</body>  
</html>  