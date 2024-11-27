<?php
function al($msg){
    echo "<script type=\"text/javascript\">alert('$msg') </script>";
}

session_start();
    if(isset($_REQUEST['Username'])){
        //connection
        include("connection.php");
        //รับค่า user & password
        $Username = $_REQUEST['Username'];
        $Password = $_REQUEST['Password'];
        //query
        $sql="SELECT * FROM `user` WHERE `student_id`='".$Username."' and `student_id`='".$Password."' ";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                $user=$row["student_id"];
				//*** Session
                $_SESSION["student_id"] = $row["student_id"];
                session_write_close();
                Header("Location:mainpage.php");
        }
        else{
            //al("username หรือ  password ไม่ถูกต้อง");
            echo "<script>";
            echo "alert(\" username or password incorrect!!!\");";
            echo "window.history.back()";
            echo "</script>";
            //Header("Location:index.php");
        }
    }
    else{
        echo "hi";
        Header("Location:login.php"); //user & password incorrect back to login again
    }
?>