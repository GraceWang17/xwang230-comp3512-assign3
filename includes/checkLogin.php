<script src="js/login.js" type="text/JavaScript" language="javascript"></script>
<?php 
include "function.inc.php";

function getLoginForm(){
    return "<br><form action='login.php' method='post' id = 'loginForm'>
    <div class = 'userLog'>
    <label>Username</label>
    <input type = 'text' name='username' action='login.php' placeholder='Enter your username'>
    </div>
    <br>
    <div class='pwdLog'>
    <label> Password</label>
    <input type='password' name='password'action='login.php' placeholder='Enter your password'>
    </div>
    <br>
    <button type='submit'>Log in </button>
    </form>";
}

/*function outputUserInfor($id){
    $db = connectDB();
    $user = new UserGateway($db);
    $result = $user ->findById($id);
    echo "<h4>". $result['FirstName'].' '. $result['LastName']. "</h4><br>";
    echo "<span>".$result['Email'] . "</span>";
}*/

function validLogin(){
    $userName = $_POST['username'];
    $pass = $_POST['password'];
    if($userName!=null && $pass !=""){
        echo $userName, $pass;
         $db = connectDB();
    $user = new UserGateway($db);
    $result = $user ->findUserByEmail($userName);
 
    if($result!=null){
        if($result['password']==$pass){
            //save session
            $_SESSION['user'] = $userName;
            $_SESSION['pass'] = $pass;
            outputUserInfor($userName);
        }
        }
   /* $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $sql = "SELECT * FROM Credentials WHERE Username =:user and Password=:pass";
    $statement = $pdo->prepare($sql);
    $statement ->bindValue(':user', $_POST['username']);
    $statement ->bindValue(':pass', $_POST['pword']);
    $statement = execute();
    if($statement->rowCount()>0){
        return true;
    }else{
    return false;
    }*/
    }
   /*    require_once("config.php");
   $loggedIn = false;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if(validLogin()){
           echo "Welcome ".$_POST['username'];
           $expiryTime = time()+60*60*24;
          // setcookie("Username", $_POST['username'], $expiryTime);
          $_SESSION['Username']=$_POST['username'];
           $loggedIn = true;
       }
       else{
           echo "login unsuccessful";
       }
   }
   else{
     echo "No Post detected";
   }*/
}

?> 
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <!-- mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--3-col ">
                <div class = "mdl-card__title mdl-color--orange">
                    <h2 class="mdl-card__title-text">Log In</h2>
                </div>
                <?php echo getLoginForm();?>
                <?php validLogin()?>
                <br>
                <div id = "errors">
                </div>
                <!--<script type="text/JavaScript"></script>-->
            </div>
        </div>
    </section>
</main>