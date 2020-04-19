<?php
            require '../connect.php';

            require 'connect.php';

                $hvt = $_GET["name"];
                $tk = $_GET["tk"];
                $pass = $_GET["mk"]; 
                $eml = $_GET["email"];
                $phone= $_GET["phone"];
                $rs=mysqli_query($connect,"SELECT * FROM dsuser");
                $id="USER0".(mysqli_num_rows($rs)+1);
                if($hvt==""||$tk==""||$pass==""||$eml==""||$phone="")
                {   
                    echo '<p class="connect" style="color:red;">Không được bỏ trống !</p>';
                    
                }//ifchecktontai
                else{
                    $pass=md5($pass);//Mã hóa mk
                    $sql="INSERT INTO dsuser (id,username, password,name,email,sdt,role,TrangThai) VALUES ('$id','$tk','$pass','$hvt','$eml','$phone','Q3',1)";
                    $pass=md5($pass);           
                    $ketnoi=mysqli_query($connect, $sql);           
                    if(!$ketnoi)
                    {
                        echo '<p class="connect" style="color:red;">Đăng ký không thành công</p>';
                    }else 
                        {
                            echo '<p class="connect" style="color:red;">Đăng ký thành công</p>';
                        }//else
                }   
            
           
            //ifdangky
                
?>