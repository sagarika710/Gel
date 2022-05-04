<?php

require './../db.php';
$oper = $_REQUEST['oper'];
error_reporting(0);
if($oper == 'about-accordian-fetch'){
    $section = 'about-accordian';
    $sql = "SELECT * FROM about_details where page_section= '$section' order by id";
    $result = mysqli_query($conn, $sql);
    $data = array();
    $slno = 1;
    while($row = mysqli_fetch_array($result)){

        $data[] = array(
            "slno" => $slno,
            "id" => $row['id'],
            "image" => $row['image'],
            "heading" => $row['page_heading'],
            "page_content_small" => $row['page_content_small']
        );
        $slno++;
    }
    echo json_encode($data);

}

else if($oper == 'about-sub-fetch'){
    $section = 'about-sub-head';
    $sql = "SELECT * FROM about_details where page_section= '$section' order by id";
    $result = mysqli_query($conn, $sql);
    $data = array();
    $slno = 1;
    while($row = mysqli_fetch_array($result)){

        $data[] = array(
            "slno" => $slno,
            "id" => $row['id'],
            "image" => $row['image'],
            "heading" => $row['page_heading'],
            "page_content_small" => $row['page_content_small']
        );
        $slno++;
    }
    echo json_encode($data);

}
else if($oper == 'about-head-fetch'){
    $section = 'about-header';
    $sql = "SELECT * FROM about_details where page_section= '$section' order by id";
    $result = mysqli_query($conn, $sql);
    $data = array();
    $slno = 1;
    while($row = mysqli_fetch_array($result)){

        $data[] = array(
            "slno" => $slno,
            "id" => $row['id'],
            "image" => $row['image'],
            "heading" => $row['page_heading'],
            "page_content_small" => $row['page_content_small']
        );
        $slno++;
    }
    echo json_encode($data);

}
//********************************************Heading section super-admin*********************************************************** */ 
else if($oper == 'about-heading'){

    if(isset($_POST["about-head-btn"])){

        if($_POST["h-hidId"] != "" && $_POST["h-hidId"] != null){
            // echo "update";
            $id = $_POST["h-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $updated_by = 'Super Admin';
            $updated_date = date("Y-m-d")." ".date("h:i:s");
            $sql = "UPDATE `about_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_date' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/about.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/about.php';
                </SCRIPT>");
            }

        }
        else{
                // echo "insert";
                $heading =isset( $_POST['heading'])?$_POST['heading']:'';
                $content = isset( $_POST['content'])?$_POST['content']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'about-header';
                    $sql = "INSERT INTO `about_details`(`page_heading`, `page_content_small`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/about.php';
                        </SCRIPT>");
                    } else {
                        echo("Error description: " . mysqli_error($conn));
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..');
                        window.location.href='../Galileolife_Admin/about.php';
                        </SCRIPT>");
                    }
            }

    }

    

}
else if($oper == 'delete-heading'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `about_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/about.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/about.php';
            </SCRIPT>");
        }
    }
}
//***********************************************************about-sub-content*****************************************************************************/
else if($oper == 'about-subcontent'){

    if(isset($_POST["about-sub-btn"])){

        if($_POST["s-hidId"] != "" && $_POST["s-hidId"] != null){
            // echo "update";
            $id = $_POST["s-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['smallContent'])?$_POST['smallContent']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['sub-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `about_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                }    
            }else{
                $sub_images =  $_FILES['sub-image'];
                $sub_image_name = $sub_images['name'];
                $sub_image_error = $sub_images['error'];
                $sub_image_temp = $sub_images['tmp_name'];
                $sub_image_extension = explode('.',$sub_image_name); //sepatare name and extension
                $sub_image_chk = strtolower(end($sub_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($sub_image_chk,$extensionStored)){
                $sub_destination_folder = "../Assets/Images/".$sub_image_name;
                move_uploaded_file($sub_image_temp,$sub_destination_folder);
                $sql="UPDATE `about_details` SET `image`='$sub_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/about.php';
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
                $section= 'about-sub-head';
        
                // image
                if(getimagesize($_FILES['sub-image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `about_details`( `page_heading`, `page_content_small`, `page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/about.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../about.php';
                        </SCRIPT>");
                    }
                }else{
                    $sub_images =  $_FILES['sub-image'];
                    $sub_image_name = $sub_images['name'];
                    $sub_image_error = $sub_images['error'];
                    $sub_image_temp = $sub_images['tmp_name'];
                    $sub_image_extension = explode('.',$sub_image_name); //sepatare name and extension
                    $sub_image_chk = strtolower(end($sub_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($sub_image_chk,$extensionStored)){
                    $sub_destination_folder = "../Assets/Images/".$sub_image_name;
                    move_uploaded_file($sub_image_temp,$sub_destination_folder);
                    $sql = "INSERT INTO `about_details`(`image`, `page_heading`, `page_content_small`, `page_section`, `status`,`created_by`) VALUES ('$sub_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/about.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../about.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'sub-delete'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `about_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/about.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/about.php';
            </SCRIPT>");
        }
    }

}
//***********************************************************about-accordian-content*****************************************************************************/
else if($oper == 'about-accordian'){

    if(isset($_POST["about-accordian-btn"])){

        if($_POST["a-hidId"] != "" && $_POST["a-hidId"] != null){
            // echo "update";
            $id = $_POST["a-hidId"];
            $heading =isset( $_POST['accordian-heading'])?$_POST['accordian-heading']:'';
            $content = isset( $_POST['accordian-smallContent'])?$_POST['accordian-smallContent']:'';
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
    
            // image
            if(getimagesize($_FILES['accordian-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "UPDATE `about_details` SET `page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('Thank you data updated..')
                     window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    // window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                }    
            }else{
                $accordian_images =  $_FILES['accordian-image'];
                $accordian_image_name = $accordian_images['name'];
                $accordian_image_error = $accordian_images['error'];
                $accordian_image_temp = $accordian_images['tmp_name'];
                $accordian_image_extension = explode('.',$accordian_image_name); //sepatare name and extension
                $accordian_image_chk = strtolower(end($accordian_image_extension)); // store the extension
            }
            $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
            if(in_array($accordian_image_chk,$extensionStored)){
                $accordian_destination_folder = "../Assets/Images/".$accordian_image_name;
                move_uploaded_file($accordian_image_temp,$accordian_destination_folder);
                $sql="UPDATE `about_details` SET `image`='$accordian_image_name',`page_heading`='$heading',`page_content_small`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
               
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/about.php';
                    </SCRIPT>");
                }    
            }
        } //insert
        else{
                // echo "insert";
                $heading =isset( $_POST['accordian-heading'])?$_POST['accordian-heading']:'';
                $content = isset( $_POST['accordian-smallContent'])?$_POST['accordian-smallContent']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'about-accordian';
        
                // image
                if(getimagesize($_FILES['accordian-image']['tmp_name']) == FALSE){
                    // echo " Please Select an image";
                    $sql = "INSERT INTO `about_details`( `page_heading`, `page_content_small`, `page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/about.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../about.php';
                        </SCRIPT>");
                    }
                }else{
                    $accordian_images =  $_FILES['accordian-image'];
                    $accordian_image_name = $accordian_images['name'];
                    $accordian_image_error = $accordian_images['error'];
                    $accordian_image_temp = $accordian_images['tmp_name'];
                    $accordian_image_extension = explode('.',$accordian_image_name); //sepatare name and extension
                    $accordian_image_chk = strtolower(end($accordian_image_extension)); // store the extension
                }
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
        
                if(in_array($accordian_image_chk,$extensionStored)){
                    $accordian_destination_folder = "../Assets/Images/".$accordian_image_name;
                    move_uploaded_file($accordian_image_temp,$accordian_destination_folder);
                    $sql = "INSERT INTO `about_details`(`image`, `page_heading`, `page_content_small`, `page_section`, `status`,`created_by`) VALUES ('$accordian_image_name','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/about.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../about.php';
                        </SCRIPT>");
                    }
        
                }
            }
    }
}
else if($oper == 'accordian-delete'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `about_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/about.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/about.php';
            </SCRIPT>");
        }
    }

}

?>