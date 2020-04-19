<?php
    session_start();
    include "../connect.php";
    if(isset($_POST["dangnhap"])){
        $user= $_POST['tk'];
        $pass= $_POST['mk'];
        if($user=="" || $pass==""){
            echo '<p style="color:red;">Không được bỏ trống</p>';
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }else{						
            //$pass=md5($pass);
            $sql="SELECT * FROM `user` WHERE username='$user' and password='$pass' ";
            //$getname="SELECT * FROM `formdemo1` WHERE hvt='$hvt' ";    
            $ketnoi=mysqli_query($connect, $sql);
            $num_rows=mysqli_num_rows($ketnoi);
            $row=mysqli_fetch_array($ketnoi);
            if($num_rows==0){                
                header('location: ../../../index.php?assets=login&login=fail');
               // echo '<p style="color:red;">Đăng Nhập Không Thành Công</p>';
            }else {
                $_SESSION['login'] = 1;
                $_SESSION['idUser'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['sdt'] = $row['sdt'];
                // echo "<pre>";
                // print_r($_SESSION);
                // echo "</pre>";
                header("location: ../../../index.php");            
               // echo '<p style="color:red;">Đăng Nhập Thành Công</p>';			
               // echo '<p style="color:yellow;">Hello '.$row['username'].'!!!</p>';                
            }
        }
            
    }
    mysqli_close($connect);        
?>
