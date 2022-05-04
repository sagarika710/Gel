<?php 
require './../db.php';
$oper = $_REQUEST['oper'];
error_reporting(0);
// Doctor on call
//***********************************************************doctor-on-call*****************************************************************************/
if($oper == 'doctor-on-call'){

    if(isset($_POST["doctor-on-call-btn"])){

        if($_POST["h-hidId"] != "" && $_POST["h-hidId"] != null){
            // echo "update";
            $id = $_POST["h-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $link = isset( $_POST['link'])?$_POST['link']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`links`='$link',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/doctor-on-call.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/doctor-on-call.php';
                    </SCRIPT>");
                }    
            }else{
                $doc_images =  $_FILES['image'];
                $doc_image_name = $doc_images['name'];
                $doc_image_error = $doc_images['error'];
                $doc_image_temp = $doc_images['tmp_name'];
                $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($doc_image_chk,$extensionStored)){
                $doc_destination_folder = "../Assets/Images/".$doc_image_name;
                move_uploaded_file($doc_image_temp,$doc_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$doc_image_name',`page_heading`='$heading',`page_content_small`='$content',`links`='$link',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/doctor-on-call.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/doctor-on-call.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $link = isset( $_POST['link'])?$_POST['link']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'service-doctor-on-call';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`,`links`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$link','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/doctor-on-call.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../doctor-on-call.php';
                        </SCRIPT>");
                    }
                }else{
                    $doc_images =  $_FILES['image'];
                    $doc_image_name = $doc_images['name'];
                    $doc_image_error = $doc_images['error'];
                    $doc_image_temp = $doc_images['tmp_name'];
                    $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                    $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($doc_image_chk,$extensionStored)){
                    $doc_destination_folder = "../Assets/Images/".$doc_image_name;
                    move_uploaded_file($doc_image_temp,$doc_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_content_small`,`links` ,`page_section`, `status`,`created_by`) VALUES ('$doc_image_name','$heading','$content','$link','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/doctor-on-call.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../doctor-on-call.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'delete-doctor-on-call'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/doctor-on-call.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/doctor-on-call.php';
            </SCRIPT>");
        }
    }

}
//***********************************************************primary care*****************************************************************************/
else if($oper == 'service-primary-care'){

    if(isset($_POST["service-primary-care-btn"])){

        if($_POST["s-hidId"] != "" && $_POST["s-hidId"] != null){
            // echo "update";
            $id = $_POST["s-hidId"];
            $heading =isset( $_POST['pc-heading'])?$_POST['pc-heading']:'';
            $content = isset( $_POST['pc-content'])?$_POST['pc-content']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['pc-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    // window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                }    
            }else{
                $pc_images =  $_FILES['pc-image'];
                $pc_image_name = $pc_images['name'];
                $pc_image_error = $pc_images['error'];
                $pc_image_temp = $pc_images['tmp_name'];
                $pc_image_extension = explode('.',$pc_image_name); //sepatare name and extension
                $pc_image_chk = strtolower(end($pc_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($pc_image_chk,$extensionStored)){
                $pc_destination_folder = "../Assets/Images/".$pc_image_name;
                move_uploaded_file($pc_image_temp,$pc_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$pc_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    // window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['pc-heading'])?$_POST['pc-heading']:'';
                $content = isset( $_POST['pc-content'])?$_POST['pc-content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'primary-care';
        
                // image
                if(getimagesize($_FILES['pc-image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/service.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../service.php';
                        </SCRIPT>");
                    }
                }else{
                    $pc_images =  $_FILES['pc-image'];
                    $pc_image_name = $pc_images['name'];
                    $pc_image_error = $pc_images['error'];
                    $pc_image_temp = $pc_images['tmp_name'];
                    $pc_image_extension = explode('.',$pc_image_name); //sepatare name and extension
                    $pc_image_chk = strtolower(end($pc_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($pc_image_chk,$extensionStored)){
                    $pc_destination_folder = "../Assets/Images/".$pc_image_name;
                    move_uploaded_file($pc_image_temp,$pc_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$pc_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/service.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../service.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'delete-pc'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/service.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/service.php';
            </SCRIPT>");
        }
    }
}
// 2nd section disease
else if($oper == 'service-primary-care-disease'){

    if(isset($_POST["service-disease-btn"])){

        if($_POST["d-hidId"] != "" && $_POST["d-hidId"] != null){
            // echo "update";
            $id = $_POST["d-hidId"];
            $disease =isset( $_POST['disease-name'])?$_POST['disease-name']:'';
            $link = isset( $_POST['link-id'])?$_POST['link-id']:'';
            $long_desc = isset( $_POST['long_desc'])?$_POST['long_desc']:'';
            $desc = mysqli_real_escape_string($conn,$long_desc);
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
                $sql = "UPDATE `primary_disease` SET `disease_name`='$disease',`link_id`='$link',`long_desc`='$desc',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    // window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                }    

        } //insert
        else{
                // echo "insert";
                $disease =isset( $_POST['disease-name'])?$_POST['disease-name']:'';
                $link = isset( $_POST['link-id'])?$_POST['link-id']:'';
                $long_desc = isset( $_POST['long_desc'])?$_POST['long_desc']:'';
                $desc = mysqli_real_escape_string($conn,$long_desc);
            
                $status=1;
                $created_by = 'Super Admin';
                $section= 'primary-care';
                $sql = "INSERT INTO `primary_disease`( `disease_name`, `link_id`,`long_desc`,`status`,`created_by`) VALUES ('$disease','$link','$desc','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data stored..')
                    // window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..')
                    // window.location.href='../Galileolife_Admin/service.php';
                    </SCRIPT>");
                }
            }
    }
}
else if($oper == 'delete-disease'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `primary_disease` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/service.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/service.php';
            </SCRIPT>");
        }
    }
}
// // 3rd section disease-details
// else if($oper == 'service-primary-care-disease-details'){

//     if(isset($_POST["service-disease-content-btn"])){

//         if($_POST["dt-hidId"] != "" && $_POST["dt-hidId"] != null){
//             // echo "update";
//             $id = $_POST["dt-hidId"];
//             $disease =isset( $_POST['disease'])?$_POST['disease']:'';
//             $short_desc = isset( $_POST['short_desc'])?$_POST['short_desc']:'';
//             $long_desc = isset( $_POST['long_desc'])?$_POST['long_desc']:'';
//             $updated_by = 'Super Admin';
//             $updated_on = date("Y-m-d")." ".date("h:i:s");
    
//             // article_title	article_small_desc	article_long_desc
//                 $sql = "UPDATE `disease_blog` SET `article_title`='$disease',`article_small_desc`='$short_desc',`article_long_desc`='$long_desc',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
//                 $result = mysqli_query($conn, $sql);
//                 if ($result) {
//                     echo ("<SCRIPT LANGUAGE='JavaScript'>
//                     window.alert('Thank you data updated..')
//                     window.location.href='../Galileolife_Admin/service.php';
//                     </SCRIPT>");
//                 } else {
//                     echo("Error description: " . mysqli_error($conn));
//                     echo ("<SCRIPT LANGUAGE='JavaScript'>
//                     window.alert('Server error..');
//                     // window.location.href='../Galileolife_Admin/service.php';
//                     </SCRIPT>");
//                 }    

//         } //insert
//         else{
//                 // echo "insert";
//                 $disease =isset( $_POST['disease'])?$_POST['disease']:'';
//                 $short_desc = isset( $_POST['short_desc'])?$_POST['short_desc']:'';
//                 $long_desc = isset( $_POST['long_desc'])?$_POST['long_desc']:'';
//                 $status=1;
//                 $created_by = 'Super Admin';
//                 $section= 'primary-care';
        
//                 // image
            
//                     $sql = "INSERT INTO `disease_blog`( `article_title`,`article_small_desc`,`article_long_desc`,`status`,`created_by`) VALUES ('$disease','$short_desc','$long_desc','$status','$created_by')";
//                     $result = mysqli_query($conn, $sql);
//                     if ($result) {
//                         echo ("<SCRIPT LANGUAGE='JavaScript'>
//                         window.alert('Thank you data stored..')
//                         window.location.href='../Galileolife_Admin/service.php';
//                         </SCRIPT>");
//                     } else {
//                         echo ("<SCRIPT LANGUAGE='JavaScript'>
//                         window.alert('Server error..')
//                         window.location.href='../service.php';
//                         </SCRIPT>");
//                     }
//             }
//     }
// }
// else if($oper == 'delete-disease-content'){
//     if(isset($_GET['id'])){
//         $pid = isset( $_GET['id'])?$_GET['id']:'';
//         $sql = "DELETE FROM `disease_blog` where id = '$pid'";
//         $result = mysqli_query($conn, $sql);
//         if ($result) {
//             echo ("<SCRIPT LANGUAGE='JavaScript'>
//             window.alert('Data deleted sucessfully..')
//             window.location.href='../Galileolife_Admin/service.php';
//             </SCRIPT>");
//         } else {
//             echo("Error description: " . mysqli_error($conn));
//             echo ("<SCRIPT LANGUAGE='JavaScript'>
//             window.alert('Server error..');
//             window.location.href='../Galileolife_Admin/service.php';
//             </SCRIPT>");
//         }
//     }
// }

// ***************************************************************DOCTOR AT HOME ***************************************************************//
// 1st header section
else if($oper == 'doctor-at-home-header'){

    if(isset($_POST["doctor-at-home-header-btn"])){

        if($_POST["h-hidId"] != "" && $_POST["h-hidId"] != null){
            // echo "update";
            $id = $_POST["h-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                }    
            }else{
                $doc_images =  $_FILES['image'];
                $doc_image_name = $doc_images['name'];
                $doc_image_error = $doc_images['error'];
                $doc_image_temp = $doc_images['tmp_name'];
                $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($doc_image_chk,$extensionStored)){
                $doc_destination_folder = "../Assets/Images/".$doc_image_name;
                move_uploaded_file($doc_image_temp,$doc_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$doc_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'doctor-at-home-header';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    }
                }else{
                    $doc_images =  $_FILES['image'];
                    $doc_image_name = $doc_images['name'];
                    $doc_image_error = $doc_images['error'];
                    $doc_image_temp = $doc_images['tmp_name'];
                    $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                    $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($doc_image_chk,$extensionStored)){
                    $doc_destination_folder = "../Assets/Images/".$doc_image_name;
                    move_uploaded_file($doc_image_temp,$doc_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$doc_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'delete-doctor-at-home-header'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        }
    }
}
// 2nd modal section
else if($oper == 'doctor-at-home-modal'){

    if(isset($_POST["doctor-at-home-modal-btn"])){
        
        $phone =isset( $_POST['phone'])?$_POST['phone']:'';
        $email = isset( $_POST['email'])?$_POST['email']:'';
        if($_POST["m-hidId"] != "" && $_POST["m-hidId"] != null){
            // echo "update";
            $id = $_POST["m-hidId"];
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
            $sql = "UPDATE `smart_clinic_pharmacy` SET `phone`='$phone',`mail`='$email',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            }    
        }
        else{
            // echo "insert";
            $status=1;
            $created_by = 'Super Admin';
            $section= 'doctor-at-home';   
            
            $sql = "INSERT INTO `smart_clinic_pharmacy`( `phone`, `mail`,`section`, `status`,`created_by`) VALUES ('$phone','$email','$section','$status','$created_by')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data stored..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            }
        }
    }
}
else if($oper == 'delete-doctor-at-home-modal'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `smart_clinic_pharmacy` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        }
    }
}
// 3rd sub content section
else if($oper == 'doctor-at-home-subcontent'){

    if(isset($_POST["doctor-at-home-subcontent-btn"])){
        
        $heading =isset( $_POST['heading'])?$_POST['heading']:'';
        $content = isset( $_POST['content'])?$_POST['content']:'';
        $more_content = isset( $_POST['more-content'])?$_POST['more-content']:'';

        if($_POST["sc-hidId"] != "" && $_POST["sc-hidId"] != null){
            // echo "update";
            $id = $_POST["sc-hidId"];
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
            $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content', `page_content_more`='$more_content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            }    
        }
        else{
            // echo "insert";
            $status=1;
            $created_by = 'Super Admin';
            $section= 'doctor-at-home-subcontent';   
            
            $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`,`page_content_more`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$more_content','$section','$status','$created_by')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data stored..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            }
        }
    }
}
else if($oper == 'delete-doctor-at-home-content'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        }
    }
}
// 4th accordian section
else if($oper == 'doctor-at-home-accordian'){

    if(isset($_POST["doctor-at-home-accordian-btn"])){

        if($_POST["a-hidId"] != "" && $_POST["a-hidId"] != null){
            // echo "update";
            $id = $_POST["a-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                }    
            }else{
                $doc_images =  $_FILES['image'];
                $doc_image_name = $doc_images['name'];
                $doc_image_error = $doc_images['error'];
                $doc_image_temp = $doc_images['tmp_name'];
                $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($doc_image_chk,$extensionStored)){
                $doc_destination_folder = "../Assets/Images/".$doc_image_name;
                move_uploaded_file($doc_image_temp,$doc_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$doc_image_name',`page_heading`='$heading',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/doctor-at-home.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'doctor-at-home-accordian';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`, `page_section`, `status`,`created_by`) VALUES ('$heading','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    }
                }else{
                    $doc_images =  $_FILES['image'];
                    $doc_image_name = $doc_images['name'];
                    $doc_image_error = $doc_images['error'];
                    $doc_image_temp = $doc_images['tmp_name'];
                    $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                    $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($doc_image_chk,$extensionStored)){
                    $doc_destination_folder = "../Assets/Images/".$doc_image_name;
                    move_uploaded_file($doc_image_temp,$doc_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`,`page_section`, `status`,`created_by`) VALUES ('$doc_image_name','$heading','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/doctor-at-home.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'delete-doctor-at-home-accordian'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        }
    }
}
// 5th paragraph section
else if($oper == 'doctor-at-home-paragraph'){

    if(isset($_POST["doctor-at-home-paragraph-btn"])){
        
        $content = isset( $_POST['content'])?$_POST['content']:'';

        if($_POST["pa-hidId"] != "" && $_POST["pa-hidId"] != null){
            // echo "update";
            $id = $_POST["pa-hidId"];
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
            $sql = "UPDATE `service_details` SET `page_content_small`='$content', `updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            }    
        }
        else{
            // echo "insert";
            $status=1;
            $created_by = 'Super Admin';
            $section= 'doctor-at-home-paragraph';   
            
            $sql = "INSERT INTO `service_details`( `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$content','$section','$status','$created_by')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data stored..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..')
                window.location.href='../Galileolife_Admin/doctor-at-home.php';
                </SCRIPT>");
            }
        }
    }
}
else if($oper == 'delete-doctor-at-home-paragraph'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/doctor-at-home.php';
            </SCRIPT>");
        }
    }
}

/*****************************************************************SMART CLINIC********************************************************/ 
else if($oper == 'smartclinic-header'){

    if(isset($_POST["smartclinic-header-btn"])){

        if($_POST["h-hidId"] != "" && $_POST["h-hidId"] != null){
            // echo "update";
            $id = $_POST["h-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }else{
                $sch_images =  $_FILES['image'];
                $sch_image_name = $sch_images['name'];
                $sch_image_error = $sch_images['error'];
                $sch_image_temp = $sch_images['tmp_name'];
                $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($sch_image_chk,$extensionStored)){
                $sch_destination_folder = "../Assets/Images/".$sch_image_name;
                move_uploaded_file($sch_image_temp,$sch_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$sch_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-header';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }else{
                    $sch_images =  $_FILES['image'];
                    $sch_image_name = $sch_images['name'];
                    $sch_image_error = $sch_images['error'];
                    $sch_image_temp = $sch_images['tmp_name'];
                    $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                    $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($sch_image_chk,$extensionStored)){
                    $sch_destination_folder = "../Assets/Images/".$sch_image_name;
                    move_uploaded_file($sch_image_temp,$sch_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$sch_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }
            }
    }
}
else if($oper == 'delete-smartclinic-heading'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}
// 2nd modal
else if($oper == 'smartclinic-modal'){

    if(isset($_POST["smartclinic-modal-btn"])){
        $pharmacy_name =isset( $_POST['pharmacy_name'])?$_POST['pharmacy_name']:'';
        $address =isset( $_POST['address'])?$_POST['address']:'';
        $address_link =isset( $_POST['address_link'])?$_POST['address_link']:'';
        $phone =isset( $_POST['phone'])?$_POST['phone']:'';
        $fax =isset( $_POST['fax'])?$_POST['fax']:'';
        $email =isset( $_POST['email'])?$_POST['email']:'';

        if($_POST["m-hidId"] != "" && $_POST["m-hidId"] != null){
            // echo "update";
            $id = $_POST["m-hidId"];
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s"); 
            $sql = "UPDATE `smart_clinic_pharmacy` SET `pharmacy_name`='$pharmacy_name',`address`='$address',`address_link`='$address_link',`phone`='$phone',`fax`='$fax',`mail`='$email',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/smart-clinic.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/smart-clinic.php';
                </SCRIPT>");
            }    
        } 
        else{
                // echo "insert";
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-pharmacy';
        
                $sql = "INSERT INTO `smart_clinic_pharmacy`( `pharmacy_name`, `address`, `address_link`, `phone`, `fax`, `mail`, `section`, `status`, `created_by`) VALUES ('$pharmacy_name','$address','$address_link','$phone','$fax','$email','$section','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data stored..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }
            
            }
    }
}
else if($oper == 'delete-smartclinic-modal'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `smart_clinic_pharmacy` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}
// 3.subcontent
else if($oper == 'smartclinic-subsection-head'){

    if(isset($_POST["smartclinic-subsection-head-btn"])){

        $heading =isset( $_POST['heading'])?$_POST['heading']:'';
        $content =isset( $_POST['content'])?$_POST['content']:'';

        if($_POST["sh-hidId"] != "" && $_POST["sh-hidId"] != null){
            // echo "update";
            $id = $_POST["sh-hidId"];
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s"); 
            $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/smart-clinic.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/smart-clinic.php';
                </SCRIPT>");
            }    
        } 
        else{
                // echo "insert";
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-sub-header';        
                $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`, `page_section`, `status`, `created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data stored..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }
            
            }
    }
}
else if($oper == 'delete-smartclinic-subcont'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}
// 4.card
else if($oper == 'smartclinic-card'){

    if(isset($_POST["smartclinic-card-btn"])){

        if($_POST["c-hidId"] != "" && $_POST["c-hidId"] != null){
            // echo "update";
            $id = $_POST["c-hidId"];
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                $sql = "UPDATE `service_details` SET `page_heading`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }else{
                $sch_images =  $_FILES['image'];
                $sch_image_name = $sch_images['name'];
                $sch_image_error = $sch_images['error'];
                $sch_image_temp = $sch_images['tmp_name'];
                $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($sch_image_chk,$extensionStored)){
                $sch_destination_folder = "../Assets/Icons/".$sch_image_name;
                move_uploaded_file($sch_image_temp,$sch_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$sch_image_name',`page_heading`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
             
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-card';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`,`page_section`, `status`,`created_by`) VALUES ('$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }else{
                    $sch_images =  $_FILES['image'];
                    $sch_image_name = $sch_images['name'];
                    $sch_image_error = $sch_images['error'];
                    $sch_image_temp = $sch_images['tmp_name'];
                    $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                    $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($sch_image_chk,$extensionStored)){
                    $sch_destination_folder = "../Assets/Icons/".$sch_image_name;
                    move_uploaded_file($sch_image_temp,$sch_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_section`, `status`,`created_by`) VALUES ('$sch_image_name','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }
            }
    }
}
else if($oper == 'delete-smartclinic-card'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}
// 5.lists
else if($oper == 'smartclinic-lists'){

    if(isset($_POST["smartclinic-lists-btn"])){

        if($_POST["ls-hidId"] != "" && $_POST["ls-hidId"] != null){
            // echo "update";
            $id = $_POST["ls-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }else{
                $sch_images =  $_FILES['image'];
                $sch_image_name = $sch_images['name'];
                $sch_image_error = $sch_images['error'];
                $sch_image_temp = $sch_images['tmp_name'];
                $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($sch_image_chk,$extensionStored)){
                $sch_destination_folder = "../Assets/Images/".$sch_image_name;
                move_uploaded_file($sch_image_temp,$sch_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$sch_image_name',`page_heading`=`$heading`,`page_content_small`=`$content`,`updated_by`=`$updated_by`,`updated_on`=`$updated_on` WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-lists-section';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`(`page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }else{
                    $sch_images =  $_FILES['image'];
                    $sch_image_name = $sch_images['name'];
                    $sch_image_error = $sch_images['error'];
                    $sch_image_temp = $sch_images['tmp_name'];
                    $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                    $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($sch_image_chk,$extensionStored)){
                    $sch_destination_folder = "../Assets/Images/".$sch_image_name;
                    move_uploaded_file($sch_image_temp,$sch_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$sch_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }
            }
    }
}
else if($oper == 'delete-smartclinic-lists-desc'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}
// 6.list
else if($oper == 'smartclinic-list'){

    if(isset($_POST["smartclinic-list-btn"])){
        $content =isset( $_POST['content'])?$_POST['content']:'';

        if($_POST["l-hidId"] != "" && $_POST["l-hidId"] != null){
            // echo "update";
            $id = $_POST["l-hidId"];
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s"); 
            $sql = "UPDATE `service_details` SET `page_heading`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/smart-clinic.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/smart-clinic.php';
                </SCRIPT>");
            }    
        } 
        else{
                // echo "insert";
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-list';        
                $sql = "INSERT INTO `service_details`( `page_heading`,`page_section`, `status`, `created_by`) VALUES ('$content','$section','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data stored..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }
            
            }
    }
}
else if($oper == 'delete-smartclinic-list-segment'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}

// 7.footer
else if($oper == 'smartclinic-footer'){

    if(isset($_POST["smartclinic-footer-btn"])){

        if($_POST["f-hidId"] != "" && $_POST["f-hidId"] != null){
            // echo "update";
            $id = $_POST["f-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `service_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }else{
                $sch_images =  $_FILES['image'];
                $sch_image_name = $sch_images['name'];
                $sch_image_error = $sch_images['error'];
                $sch_image_temp = $sch_images['tmp_name'];
                $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($sch_image_chk,$extensionStored)){
                $sch_destination_folder = "../Assets/Images/".$sch_image_name;
                move_uploaded_file($sch_image_temp,$sch_destination_folder);
                $sql="UPDATE `service_details` SET `image`='$sch_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/smart-clinic.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'smart-clinic-footer';
        
                // image
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `service_details`( `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }else{
                    $sch_images =  $_FILES['image'];
                    $sch_image_name = $sch_images['name'];
                    $sch_image_error = $sch_images['error'];
                    $sch_image_temp = $sch_images['tmp_name'];
                    $sch_image_extension = explode('.',$sch_image_name); //sepatare name and extension
                    $sch_image_chk = strtolower(end($sch_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($sch_image_chk,$extensionStored)){
                    $sch_destination_folder = "../Assets/Images/".$sch_image_name;
                    move_uploaded_file($sch_image_temp,$sch_destination_folder);
                    $sql = "INSERT INTO `service_details`(`image`, `page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$sch_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/smart-clinic.php';
                        </SCRIPT>");
                    }
                }
            }
    }
}
else if($oper == 'delete-smartclinic-footer'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `service_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/smart-clinic.php';
            </SCRIPT>");
        }
    }
}


?>