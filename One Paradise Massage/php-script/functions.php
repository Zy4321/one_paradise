<?php

// ------------- Signup functions ---------------- //

// Validate if the input field is empty or not
function emptySignupInput($name, $email, $pwd){
    $result;
    if(empty($name) || empty($email) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// validate if the input contain valid characters
function invalidName($name){
    $result;
    if(preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $name)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// validate the length of a name
function nameLength($name){
    $result;
    if(strlen($name) < 2){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// validate if the email format is correct
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Check if account exist
// Use prepared statement for database query to prevent SQL injection 
function nameAvailability($conn, $name, $email){
    $sql = "SELECT * FROM customer WHERE cusName = ? OR cusEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../user-signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $dataResult = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($dataResult)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Insert signup information into database
function createAccount($conn, $name, $email, $pwd){
    $sql = "INSERT INTO customer (cusName, cusEmail, cusPwd) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../user-signup.php?error=stmtfailed");
        exit();
    }

    // Use PHP password_hash function to increase password security
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register-successful.php");
}

// ------------- User Login functions ---------------- //

// validate if the login input is empty
function emptyLoginInput($name, $pwd){
    $result;
    if(empty($name) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// validate if the username already exist in the database
function loginAccount($conn, $name, $pwd){
    $nameExist = nameAvailability($conn, $name, $name);

    if($nameExist === false){
        header("location: ../user-login.php?error=loginerror");
        exit();
    }

    $userPwd = $nameExist["cusPwd"];
    $pwdMatch = password_verify($pwd, $userPwd);

    if($pwdMatch === false){
        header("location: ../user-login.php?error=wrongpassword");
        exit();
    }
    else if($pwdMatch === true){
        session_start();
        $_SESSION["cusid"] = $nameExist["cusID"];
        $_SESSION["cusname"] = $nameExist["cusName"];
        header("location: ../navigation.php");
        exit();
    }
}

// ------------- Admin Login functions ---------------- //

// validate login input 
function checkInput($name, $pwd){
    $result;
    if(empty($name) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//// Use prepared statement for security
function checkInfo($conn, $name, $email){
    $sql = "SELECT * FROM admin WHERE adName = ? OR adEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admin-login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $dataResult = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($dataResult)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Login if name and password match
function login($conn, $name, $pwd){
    $nameExist = checkInfo($conn, $name, $name);

    if($nameExist === false){
        header("location: ../admin-login.php?error=loginerror");
        exit();
    }

    $userPwd = $nameExist["adPwd"];
    $pwdMatch = $pwd === $userPwd;

    if($pwdMatch === false){
        header("location: ../admin-login.php?error=wrongpassword");
        exit();
    }
    else if($pwdMatch === true){
        session_id("admin");
        session_start();
        $_SESSION["adId"] = $nameExist["adID"];
        $_SESSION["adname"] = $nameExist["adName"];
        header("location: ../dashboard.php");
        exit();
    }
}

// ------------- Booking functions ---------------- //

// Validate if the input field is empty
function emptyInput($date, $time, $services){
    $result;
    if(empty($date) || empty($time) || empty($services)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function book($conn, $date, $time, $services,$cusid){
    $progress = false;
    $sql = "INSERT INTO booking (b_date, slot_id, m_type, progress, cusID) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../booking.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisbi", $date, $time, $services, $progress, $cusid );
    if(mysqli_stmt_execute($stmt)){
        echo '<script>alert("Booking successful!"); window.location.href="../booking.php"</script>';
    }
    mysqli_stmt_close($stmt);
}

function check_booking($conn, $cusid,$date, $time){
        $sql = "SELECT * FROM booking WHERE cusID = ? and b_date= ? and slot_id=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location:../booking.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "isi", $cusid,$date, $time);
        mysqli_stmt_execute($stmt);
    
        $dataResult = mysqli_stmt_get_result($stmt);
    
        if($row = mysqli_fetch_assoc($dataResult)){
            return $row;
        }
    
        mysqli_stmt_close($stmt);
    }

    // Edit function
    function update_booking($conn,$b_date,$slot_id,$m_type,$id){
        $sql="UPDATE booking SET b_date=?, slot_id=? , m_type=? where b_id =? ;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sisi", $b_date,$slot_id,$m_type,$id);
        if(mysqli_stmt_execute($stmt)){
            echo "<script>alert('booking update successful!! '); window.location.href='../dashboard.php?page=2'</script>" ; 
        }
    
        mysqli_stmt_close($stmt);
    }