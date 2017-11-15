<script src="js/login.js" type="text/JavaScript" language="javascript"></script>
<?php 
include "function.inc.php";

/*
*A session is a way to store information (in variables) to be used across multiple pages.
*Start the section
*/
//session_start();
/*if(isset($_SESSION['session_user'])){
    header("location: index.php");
}*/
                
    
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

// function getProfile(){
//     $db = connectDB();
//     $user = new UserGateway($db);
//     $result = $user ->findUserByEmail($_POST['username']);
//     var_dump($result);
//     foreach($result as $key =>$value){
//         outputUserInfor($result[$key]);
//         var_dump($result[$key]);
//         echo "<h4>". $result[$key]['FirstName']. " ". $result[$key]['LastName']. "</h4><br>";
//         echo "<span>".$result[$key]['Username'] . "</span>";
//     }
//     outputUserInfor($result);
// }

// function outputUserInfor($result){
//     echo "<h4>". $result['FirstName'].' '. $result['LastName']. "</h4><br>";
//     echo "<span>".$result['Email'] . "</span>";
//     //var_dump($result['FirstName']);
// }

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
            // var_dump($result[0]['Password']);
            // var_dump($hashedPass);
            if($result[0]['Password'] == $hashedPass){
             $_SESSION['session_user'] = md5($userName + $pass);
             $_SESSION['user_id'] = $result[0]['UserID'];
             $_SESSION['email'] = $result[0]['UserName'];
             $_SESSION['first'] = $result[0]['FirstName'];
             $_SESSION['last'] = $result[0]['LastName'];
             //var_dump($_SESSION);
             echo "Log in Succeful.";
            }
}}}

?> 
<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <!-- mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--3-col ">
                <div class = "mdl-card__title mdl-color--orange">
                    <h2 class="mdl-card__title-text">Log In</h2>
                </div>
                <?php echo getLoginForm();
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