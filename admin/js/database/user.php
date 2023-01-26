<?php
include "../../../database/conf.php"; 
$output = '';
            if($_POST["action"] == "loadTable"){

            
$output = '
<table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                        </thead>';
                        $q=$conn->query("SELECT r.unique_id , r.Name , r.email,r.image as img ,r.status , rl.role_name as role FROM `register` as r JOIN role as rl on r.role_id = rl.role_id ORDER BY r.status ASC") OR die("sever requested failed");

                                    if(mysqli_num_rows($q) >0){
                                        $sno = 0;
                                        while($row = mysqli_fetch_assoc($q)){
                                            $sno++;
                                            $output.='<tbody>
                                            <td> '.$sno.'</td>
                                            <td><img src="../database/upload/'.$row["img"].'" width="30px" height="30px" alt="" srcset=""></td>
                                            <td>'.$row["Name"].'</td>
                                            <td>'.$row["unique_id"].'</td>
                                            <td>'.$row["role"].'</td>
                                            <td>'.$row["status"].'</td>
                                            <td><button class="btn btn-danger" id="delBtn" data-id="'.$row["unique_id"].'" > <i class="fas fa-times"></i></button>
                                                <button class="btn dpanel-btn" id="EditBtn" data-id="'.$row["unique_id"].'"> <i class="fas fa-edit"></i> </button>
                                            </td>
                                            
                                            </tbody>';
                                        }
                                    }
                        


                       $output.=' <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                        <tbody id="u_tbl_bd">
                        
                        </tbody>
                </table>';
            }
                echo json_encode(["type"=>"success" , "data" =>$output] , true);

?>
