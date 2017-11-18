<script src="js/login.js" type="text/JavaScript" language="javascript"></script>
<?php 
/*
* Create a login form
*/
function getLoginForm(){
    return "<br><form action='login.php' method='post' id = 'loginForm'>
    <div class = 'userLog'>
    <label>Username</label>
    <input type = 'text' name='username' action='login.php' placeholder='Enter your username'>
    </div>
    <br>
    <div class='pwdLog'>
    <label> Password</label>
    <input type='password' name='password' action='login.php' placeholder='Enter your password'>
    </div>
    <br>
    <button type='submit' form='loginForm'>Log in </button>
    </form>";
}
/*
check entered information is valid or not
*/
function validLogin(){
    $db = connectDB();
    $user = new UserGateway($db);
    $userName = $_POST['username'];
    $pass = $_POST['password'];
    if($userName!="" && $pass !=""){
        $result = $user->findUserByEmail($userName);
        //var_dump($result);
        if($result!=null && count($result) == 1){
            $hashedPass = MD5($pass.$result[0]['Salt']);
            if($result[0]['Password'] == $hashedPass){
                 $_SESSION['session_user'] = md5($userName + $pass);
                 $_SESSION['user_id'] = $result[0]['UserID'];
                 $_SESSION['email'] = $result[0]['UserName'];
                 $_SESSION['first'] = $result[0]['FirstName'];
                 $_SESSION['add'] = $result[0]['Address'];
                 $_SESSION['city'] = $result[0]['City'];
                 $_SESSION['country'] = $result[0]['Country'];
                 $_SESSION['post'] = $result[0]['Postal'];
                 $_SESSION['phone'] = $result[0]['Phone'];
                 //var_dump($_SESSION);
                 echo "<b>Log in Succeful.</b>";
                 checkIndrection();
            }
        }
        
    }
}

function checkIndrection(){
    echo"111";
     if(isset($_GET['pre']) && $_GET['pre']!=null){
         echo "222";
         header('location:' .$SERVER["SCRIPT_NAME"].'../'. $_GET['pre'] . '.php');
}
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
                <?php 
                      //print login form
                      echo getLoginForm();
                      if(isset($_POST['username']) && isset($_POST['password']) 
                        && !empty($_POST['password']) && !empty($_POST['username'])){
                          validLogin();
                      }
                ?>
                <br>
                <span id = "errors"></span>
            </div>
        </div>
    </section>
</main>