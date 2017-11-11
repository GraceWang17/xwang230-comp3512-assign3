<script src="js/login.js" type="text/JavaScript" language="javascript"></script>
<?php
         //include 'checkState.php';
         //checkSession();
function getLoginForm(){
    echo "<br><form action='login.php' method='post' id = 'loginForm'>
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

function outputUserInfor($id){
    $db = connectDB();
    $user = new UserGateway($db);
    $result = $user ->findById($id);
    echo "<h4>". $result['FirstName'].' '. $result['LastName']. "</h4><br>";
    echo "<span>".$result['Email'] . "</span>";
}

function validationCheck(){
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
            session_start();
            $_SESSION['user'] = $userName;
            $_SESSION['pass'] = $pass;
        }
        }
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
                <?php getLoginForm();?>
                <?php validationCheck()?>
                <br>
                <div id = "errors">
                </div>
                <!--<script type="text/JavaScript"></script>-->
            </div>
        </div>
    </section>
</main>