<?php
                        session_start();
                        $taikhoan=$_POST['data_username'];
                        $matkhau=$_POST['data_password'];
                            // Sau khi dang nhap
                                require ("../connect.php");
                                // mysqli_set_charset($connSanPham,"utf8");
                                $sql = "SELECT * FROM user WHERE username = '$taikhoan' AND password='$matkhau' AND role!='Q3' AND TrangThai=1";
                                mysqli_set_charset($connSanPham,"utf8");
                                $result = mysqli_query($connSanPham,$sql);
                                $num=$result->num_rows;
                                if($num>0){
                                    $_SESSION['username']=$taikhoan;
                                    $_SESSION['password']=$matkhau;
                                    while ($row = $result->fetch_assoc()) 
                                         {
                                // var_dump($row);
                                                $_SESSION['user']=$row;
                                         }   
                             // header('Location: http://localhost/myweb/themplate/admin.php');
                                 echo "yes";
                                       }
                            else 
                               echo "no";
                            
                         mysqli_close($connSanPham);   


                        

                        ?>