<script src="js/register.js" type="text/JavaScript" language="javascript"></script>

<?php
function getRegisterForm(){
    
    return "<br><form id= 'registerForm' action='register.php' method='post' >
    <div>
    <label>Email </label>
    <input type='text' name='email' class = 'email' id='email'>
    </div>
    <br>
    <div>
    <label>First Name </labe>
    <input type = 'text' name='fname' class = 'userRegi' id='fname>
    </div>
    <br>
    <div>
    <label>Last Name </label>
    <input type = 'text' name='lname'class = 'userRegi'id='lname' >
    </div>
    <br>
    <div>
    <label>Password </label>
    <input type='password' name='password' class='pwdLog'id='pw'>
    </div>
    <br>
    <div>
    <label>Retype Password </label>
    <input type='password' name='secondPassword' class='pwdLog'>
    </div>
    <br>
    <div class='userinfo'>
    <label>Address</label>
    <input type='text' name='address'>
    </div><br>
    <div class='userinfo'>
    <label>City</label>
    <input type='text' name='city'>
    </div><br>
    <div class='userinfo'>
    <label>Region</label>
    <input type='text' name='region'>
    </div><br>
    <div class = 'userRegi'>
    <label>Country </label>
    <input type = 'text' name='country' >
    </div>
    <br>
    <div class='userinfo'>
    <label>Postal Code</label>
    <input type='text' name='postcode'>
    </div><br>
    <div class='userinfo'>
    <label>Phone </label>
    <input type='text' name='phone'>
    </div><br>
    <button type='submit' id='registerbutton'>Sign Up</button>
    </form><br>";
    
}

function insertUser(){
   $con = connectDB();
   $userinfo = array('');
   $user = new UserGateway($con);
   $user->setInsert("States", array('FirstName' => $_POST['fname'], 'LastName'=>$_POST['lname'], 'Address'=>$_POST['address'],
                                    'City'=>$_POST['city'], 'Region'=>$_POST['region'], 'Country'=>$_POST['country'],
                                    'Postal'=>$_POST['postcode'], 'Phone'=>$_POST['phone'],'Email'=> $_POST['email'],
                                    'UserName' => $_POST['email'], 'Password'=>md5($_POST['pw'] . $salt), 'Salt'=> $salt,
                                    'State'=>$_POST[''], 'DateJoined'=> ((new DateTime())->format('Y-m-d H:i:s')),
                                    'DateLastModified'=>((new DateTime())->format('Y-m-d H:i:s'))
                                    ));
   //$i = $user->insert();
}
?>

<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <!-- mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--5-col ">
                <div class = "mdl-card__title mdl-color--blue">
                    <h2 class="mdl-card__title-text">Sign Up</h2>
                </div>
                <?php
                echo getRegisterForm();
                ?>
                <br>
                <span id = "errors"></span>
            </div>
        </div>
    </section>
</main>