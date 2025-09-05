<?php

//include database connection
include_once("db_conn.php");

//create user user Registration function

function userRegistration($userName,$userEmail,$userpass,$userPhone,$userNic,$userDOB,$courseSelect){
    //create database connection
    $db_conn = Connection();
    //data insert query
    $insertSql = "INSERT INTO user_tbl(user_name,user_email,user_phone,user_nic,user_dob,user_status,courses)
    VALUES('$userName','$userEmail','$userPhone','$userNic','$userDOB',1,'$courseSelect');";

    $sqlResult = mysqli_query($db_conn,$insertSql);

    // check database connection errors
    if(mysqli_connect_error()){
        echo(mysqli_connect_error());
    }
  
    //if registration result is success we can feed data into the login table also
    if ($sqlResult > 0) {
        // Use MD5 method for password encryption
        $newPassword = md5($userpass);
    
        $insertLogin = "INSERT INTO login_tbl(login_email,login_pwd,login_role,login_status)
        VALUES('$userEmail','$newPassword','user',1);";
    
        $loginResult = mysqli_query($db_conn, $insertLogin);
    
        if (mysqli_connect_error()) {
            echo(mysqli_connect_error());
        }
        // Success message and redirection to login section
        echo "<script>
            alert('Your Registration Success..!!!');
            window.location.href = '/final project 251/login.php';
        </script>";
    } else {
        // Failure message
        echo "<script>
            alert('Please Try Again..!!!');
            window.location.href = 'final project 251/index_1.php';
        </script>";
    }
    
    
}


//login function
function Authentication($userName,$userPass){
    //call database connection 
    $db_conn = Connection();
    $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email = '$userName';";
    $sqlResult = mysqli_query($db_conn,$sqlFetchUser);

    // check database connection errors
    if(mysqli_connect_error()){
        echo(mysqli_connect_error());
    }

    //convert user password into a hash value
    $newpass = md5($userPass);

    //check the number of the rows
    $norows = mysqli_num_rows($sqlResult);

    //validating the number of records > 0 or not
    if($norows > 0){
        //fetch the user records
        $rec = mysqli_fetch_assoc($sqlResult);

        //validate the password
        if($rec['login_pwd'] == $newpass){
            //validate the login status
            if($rec['login_status'] == 1){
                if($rec['login_role'] == "admin"){
                    //redirect this user into the admin dashbord
                    header('location:lib/views/dashbords/admin.php');
                }else{
                    //redirect this user into the user dashbord
                    header('location:dashboard.php');
                }
            }else{
                return("Your Account Has Been Diactivated.!");
            }
        }else{
            echo "<script>
            alert('invalid password..!!!');
           
        </script>";
        }
    }else{
        return("No Records Are Found.!");
    }
}

function stdRegistration($stdName,$stdEmail,$stdNic,$stdTel,$stdDob,$courseSelect){
    $db_conn = Connection();

    $insert = "INSERT INTO std_tbls(std_name,std_email,std_nic,std_tel,std_dob,std_course)
        VALUES('$stdName','$stdEmail','$stdNic','$stdTel','$stdDob','$courseSelect');";

    $result = mysqli_query($db_conn,$insert);
    if($result>0){
        return 1;
    }else{
        return 0;
    }
}

function delteUser($id){
    $db_conn = Connection();
    $query = "DELETE FROM user_tbl WHERE id = '$id' ";
    $queryResult = mysqli_query($db_conn,$query);

    if($queryResult>0){
        return 1;
     }else{
        return 0;
    }
}

function updateUser($Id, $userName, $userEmail, $userNic, $userTel, $userDob,$courses) {
    $db_conn = connection();
    // Update the employee information using a prepared statement
    $updateSql = "UPDATE user_tbl SET user_name=?, user_email=?, user_nic=?, user_phone=?, user_dob=?,courses? WHERE id=?";
    $stmt = mysqli_prepare($db_conn, $updateSql);
    if (!$stmt) {
        return 0; // Update failed
    }

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "sssssi",$Id, $userName, $userEmail, $userNic, $userTel, $userDob, $courses);
    $updateResult = mysqli_stmt_execute($stmt);

    if ($updateResult) {
        return 1; // Update successful
    } else {
        return 0; // Update failed
    }

}



?>
