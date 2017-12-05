<?php
include_once 'UserGateway.class.php';
require_once 'function.inc.php';
require_once 'DatabaseHelper.class.php';
$email = $fname = $lname = $pw = $ad = $city = $region = $ctry = $pc = $ph = null;
header('Content-Type: application/json');
if(has($_POST['email'])){
    $email = $_POST['email'];
        if(has($_POST['fname'])){
            $fname = $_POST['fname'];
            if(has($_POST['lname'])){
                $lname = $_POST['lname'];
                if(has($_POST['lname'])){
                    $lname = $_POST['lname'];
                }
            }
        }
}

if(has($_POST['pw'])){
    $pw = $_POST['pw'];
}

if(has($_POST['address'])){
    $ad = $_POST['address'];
}

if(has($_POST['city'])){
    $city = $_POST['city'];
}

if(has($_POST['region'])){
    $region= $_POST['region'];
}

if(has($_POST['country'])){
    $ctry = $_POST['country'];
}

if(has($_POST['postcode'])){
    $pc = $_POST['postcode'];
}
if(has($_POST['phone'])){
    $ph = $_POST['phone'];
}

if(isset($lname)){
    $con = connectDB();
    //1. insert user into userlogin get id if you need id to insert into users table
    //2. insert rest of infomation into users table
    //3. if all succeed, send ok, and login in session = MD5($email)
    //4. else send err
    $user = new UserGateway($con);
    $user->setInsert("Users", array('FirstName' => $fname, 'LastName'=>$lname, 'Address'=>$ad,
                                    'City'=>$city, 'Region'=>$region, 'Country'=>$ctry,
                                    'Postal'=>$pc, 'Phone'=>$ph,'Email'=> $email,'Privacy'=>1 ));
    // $i = $user->insert();
    $user = null;
    $salt = md5(microtime());
    $user = new UserGateway($con);
    $user->setInsert("UsersLogin", array('UserName' => $email, 'Password'=>md5($pw . $salt), 'Salt'=> $salt,
                                    'State'=>$ctry, 'DateJoined'=> ((new DateTime())->format('Y-m-d H:i:s')), 'DateLastModified'=>((new DateTime())->format('Y-m-d H:i:s'))
                                    ));
    echo json_encode(array("status" => 1));
}
else echo json_encode(array("status" => 0));



function has($val){
    return isset($val) && !empty($val);    
}

?>