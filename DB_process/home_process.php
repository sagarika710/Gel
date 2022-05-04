<?php

require './../db.php';
$oper = $_REQUEST['oper'];
error_reporting(0);
if($oper == 'slider-store'){
    if(isset($_POST["home-slider-btn"])){


        if($_POST["h-hidId"] != "" && $_POST["h-hidId"] != null){
            // echo "update";
            $id = $_POST["h-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['smallContent'])?$_POST['smallContent']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['home-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `home_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                }    
            }else{
                $slider_images =  $_FILES['home-image'];
                $slider_image_name = $slider_images['name'];
                $slider_image_error = $slider_images['error'];
                $slider_image_temp = $slider_images['tmp_name'];
                $slider_image_extension = explode('.',$slider_image_name); //sepatare name and extension
                $slider_image_chk = strtolower(end($slider_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($slider_image_chk,$extensionStored)){
                $slider_destination_folder = "../Assets/Images/".$slider_image_name;
                move_uploaded_file($slider_image_temp,$slider_destination_folder);
                $sql="UPDATE `home_details` SET `image`='$slider_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['smallContent'])?$_POST['smallContent']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'home_slider';
        
                // image
                if(getimagesize($_FILES['home-image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `home_details`( `page_heading`, `page_content_small`, `page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../index.php';
                        </SCRIPT>");
                    }
                }else{
                    $slider_images =  $_FILES['home-image'];
                    $slider_image_name = $slider_images['name'];
                    $slider_image_error = $slider_images['error'];
                    $slider_image_temp = $slider_images['tmp_name'];
                    $slider_image_extension = explode('.',$slider_image_name); //sepatare name and extension
                    $slider_image_chk = strtolower(end($slider_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($slider_image_chk,$extensionStored)){
                    $slider_destination_folder = "../Assets/Images/".$slider_image_name;
                    move_uploaded_file($slider_image_temp,$slider_destination_folder);
                    $sql = "INSERT INTO `home_details`(`image`, `page_heading`, `page_content_small`, `page_section`, `status`,`created_by`) VALUES ('$slider_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../index.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'delete-slider'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `home_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
        }
    }

}
//*************************************************************** */ Service section*********************************************************************

else if($oper == 'service-store'){

    if(isset($_POST["home-service-btn"])){

        if($_POST["s-hidId"] != "" && $_POST["s-hidId"] != null){
            // echo "update";
            $id = $_POST["s-hidId"];
            $heading =isset( $_POST['service-heading'])?$_POST['service-heading']:'';
            $content = isset( $_POST['smallContent-service'])?$_POST['smallContent-service']:'';
            $more_content = isset( $_POST['moreContent-service'])?$_POST['moreContent-service']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['home-service-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `home_details` SET `page_heading`='$heading',`page_content_small`='$content',`page_content_more` = '$more_content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                }    
            }else{
                $service_images =  $_FILES['home-service-image'];
                $service_image_name = $service_images['name'];
                $service_image_error = $service_images['error'];
                $service_image_temp = $service_images['tmp_name'];
                $service_image_extension = explode('.',$service_image_name); //sepatare name and extension
                $service_image_chk = strtolower(end($service_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($service_image_chk,$extensionStored)){
                $service_destination_folder = "../Assets/Images/".$service_image_name;
                move_uploaded_file($service_image_temp,$service_destination_folder);
                $sql="UPDATE `home_details` SET `image`='$service_image_name',`page_heading`='$heading',`page_content_small`='$content',`page_content_more` = '$more_content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['service-heading'])?$_POST['service-heading']:'';
                $content = isset( $_POST['smallContent-service'])?$_POST['smallContent-service']:'';
                $more_content = isset( $_POST['moreContent-service'])?$_POST['moreContent-service']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'home_service';
        
                // image
                if(getimagesize($_FILES['home-service-image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `home_details`( `page_heading`, `page_content_small`,`page_content_more`, `page_section`, `status`,`created_by`) VALUES ('$heading','$content',$more_content,'$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    }
                }else{
                    $service_images =  $_FILES['home-service-image'];
                    $service_image_name = $service_images['name'];
                    $service_image_error = $service_images['error'];
                    $service_image_temp = $service_images['tmp_name'];
                    $service_image_extension = explode('.',$service_image_name); //sepatare name and extension
                    $service_image_chk = strtolower(end($service_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($service_image_chk,$extensionStored)){
                    $service_destination_folder = "../Assets/Images/".$service_image_name;
                    move_uploaded_file($service_image_temp,$service_destination_folder);
                    $sql = "INSERT INTO `home_details`(`image`, `page_heading`, `page_content_small`, `page_content_more`,`page_section`, `status`,`created_by`) VALUES ('$service_image_name','$heading','$content',$more_content,'$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    }
        
                }
            }

    }

}
else if($oper == 'delete-service'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `home_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
        }
    }

}

// ********************************************************************Benefits section*********************************************************************

else if($oper == 'benefits-store'){

    if(isset($_POST["home-benefits-btn"])){

        if($_POST["b-hidId"] != "" && $_POST["b-hidId"] != null){
            // echo "update";
            $id = $_POST["b-hidId"];
            $heading =isset( $_POST['heading-benefits'])?$_POST['heading-benefits']:'';
            $content = isset( $_POST['smallContent-benefits'])?$_POST['smallContent-benefits']:'';
            $more_content = isset( $_POST['moreContent-benefits'])?$_POST['moreContent-benefits']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
        
            // image
            if(getimagesize($_FILES['home-benefits-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `home_details` SET `page_heading`='$heading',`page_content_small`='$content',`page_content_more` = '$more_content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                }    
            }else{
                $benefits_images =  $_FILES['home-benefits-image'];
                $benefits_image_name = $benefits_images['name'];
                $benefits_image_error = $benefits_images['error'];
                $benefits_image_temp = $benefits_images['tmp_name'];
                $benefits_image_extension = explode('.',$benefits_image_name); //sepatare name and extension
                $benefits_image_chk = strtolower(end($benefits_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
            if(in_array($benefits_image_chk,$extensionStored)){
                $benefits_destination_folder = "../Assets/Images/".$benefits_image_name;
                move_uploaded_file($benefits_image_temp,$benefits_destination_folder);
                $sql="UPDATE `home_details` SET `image`='$benefits_image_name',`page_heading`='$heading',`page_content_small`='$content',`page_content_more` = '$more_content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/index.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['heading-benefits'])?$_POST['heading-benefits']:'';
                $content = isset( $_POST['smallContent-benefits'])?$_POST['smallContent-benefits']:'';
                $more_content = isset( $_POST['moreContent-benefits'])?$_POST['moreContent-benefits']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'home_service';
        
                // image
                if(getimagesize($_FILES['home-benefits-image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `home_details`( `page_heading`, `page_content_small`,`page_content_more`, `page_section`, `status`,`created_by`) VALUES ('$heading','$content',$more_content,'$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    }
                }else{
                    $benefits_images =  $_FILES['home-benefits-image'];
                    $benefits_image_name = $benefits_images['name'];
                    $benefits_image_error = $benefits_images['error'];
                    $benefits_image_temp = $benefits_images['tmp_name'];
                    $benefits_image_extension = explode('.',$benefits_image_name); //sepatare name and extension
                    $benefits_image_chk = strtolower(end($benefits_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($benefits_image_chk,$extensionStored)){
                    $benefits_destination_folder = "../Assets/Images/".$benefits_image_name;
                    move_uploaded_file($benefits_image_temp,$benefits_destination_folder);
                    $sql = "INSERT INTO `home_details`(`image`, `page_heading`, `page_content_small`, `page_content_more`,`page_section`, `status`,`created_by`) VALUES ('$benefits_image_name','$heading','$content',$more_content,'$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/index.php';
                        </SCRIPT>");
                    }
        
                }
        }
        
    }
}
else if($oper == 'delete-benefits'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `home_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/index.php';
            </SCRIPT>");
        }
    }

}

?>