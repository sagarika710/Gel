<?php 
require './../db.php';
$oper = $_REQUEST['oper'];
// error_reporting(0);
$admin_name = 'Super Admin';

if($oper == 'blog-about'){
    if(isset($_POST["blog-about-btn"])){
        if($_POST["b-hidId"] != "" && $_POST["b-hidId"] != null){

            $id = $_POST["b-hidId"];
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $content=mysqli_real_escape_string($conn,$content);
            $updated_by = $admin_name;
            $updated_on = date("Y-m-d")." ".date("h:i:s");
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                $sql = "UPDATE `blog_details` SET `title`='$heading',`short_desc`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                }    
            }
            else{
                $doc_images =  $_FILES['image'];
                $doc_image_name = $doc_images['name'];
                $doc_image_error = $doc_images['error'];
                $doc_image_temp = $doc_images['tmp_name'];
                $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
                $extensionStored = array('png','jpg','jpeg');
                if(in_array($doc_image_chk,$extensionStored)){
                    $finalImg = time().$doc_image_name;
                    $doc_destination_folder = "../Assets/BlogImages/".$finalImg;
                    move_uploaded_file($doc_image_temp,$doc_destination_folder);
                    
                    $sql="UPDATE `blog_details` SET `blog_banner`='$finalImg',`title`='$heading',`short_desc`='$content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data updated..')
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    } else {
                        echo("Error description: " . mysqli_error($conn));
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..');
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    }    
                }
            }
        }
        else{
            $heading =isset( $_POST['heading'])?$_POST['heading']:'';
            $content = isset( $_POST['content'])?$_POST['content']:'';
            $content= mysqli_real_escape_string($conn,$content);
            $status=1;
            $created_by = $admin_name;
            $section= 'blog-content';
            if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
                $sql = "INSERT INTO `blog_details`( `title`, `short_desc`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$section','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data stored..')
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                } else {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..')
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                }
            }
            else{
                $doc_images =  $_FILES['image'];
                $doc_image_name = $doc_images['name'];
                $doc_image_error = $doc_images['error'];
                $doc_image_temp = $doc_images['tmp_name'];
                $doc_image_extension = explode('.',$doc_image_name); //sepatare name and extension
                $doc_image_chk = strtolower(end($doc_image_extension)); // store the extension
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');    
                if(in_array($doc_image_chk,$extensionStored)){
                    $finalImg = time().$doc_image_name;
                    $doc_destination_folder = "../Assets/BlogImages/".$finalImg;
                    move_uploaded_file($doc_image_temp,$doc_destination_folder);                   
                    $sql = "INSERT INTO `blog_details`(`blog_banner`, `title`, `short_desc`,`page_section`, `status`,`created_by`) VALUES ('$finalImg','$heading','$content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    } else {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    }
        
                }
            }
        }
    }
}
else if($oper == 'delete-blogabout'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `blog_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/blog.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/blog.php';
            </SCRIPT>");
        }
    }
}
else if($oper == 'full-blog-content'){
    if(isset($_POST["blog-content-btn"])){
        if($_POST["c-hidId"] != "" && $_POST["c-hidId"] != null){
            $id = $_POST["c-hidId"];
            $heading =isset( $_POST['blog-heading'])?$_POST['blog-heading']:'';
            $small_content = isset( $_POST['blog-small-content'])?$_POST['blog-small-content']:'';
            $more_content = isset( $_POST['blog-more-content'])?$_POST['blog-more-content']:'';
            $more= mysqli_real_escape_string($conn,$more_content);
            $small= mysqli_real_escape_string($conn,$small_content);
            $heading= mysqli_real_escape_string($conn,$heading);
            $updated_by = 'Super Admin';
            $updated_on = date("Y-m-d")." ".date("h:i:s");
            if(getimagesize($_FILES['blog-image']['tmp_name']) == FALSE){
                $sql = "UPDATE `blog_details` SET `title`='$heading',`short_desc`='$small',`long_desc`='$more',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data updated..')
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                } else {
                    echo("Error description: " . mysqli_error($conn));
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..');
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                    echo("Error description: " . mysqli_error($conn));
                }    
            }
            else{
                $blog_images =  $_FILES['blog-image'];
                $blog_image_name = $blog_images['name'];
                $blog_image_error = $blog_images['error'];
                $blog_image_temp = $blog_images['tmp_name'];
                $blog_image_extension = explode('.',$blog_image_name); //sepatare name and extension
                $blog_image_chk = strtolower(end($blog_image_extension)); // store the extension
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
                if(in_array($blog_image_chk,$extensionStored)){
                    $finalImg = time().$doc_image_name;
                    $blog_destination_folder = "../Assets/BlogImages/".$finalImg;
                    move_uploaded_file($blog_image_temp,$blog_destination_folder);
                    $sql="UPDATE `blog_details` SET `blog_banner`='$finalImg',`title`='$heading',`short_desc`='$small_content',`long_desc`='$more_content',`updated_by`='$updated_by',`updated_on`='$updated_on' WHERE id = $id";
                   
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data updated..')
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    } else {
                        echo("Error description: " . mysqli_error($conn));
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..');
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    }    
                }
            }
        }
        else{
            $heading =isset( $_POST['blog-heading'])?$_POST['blog-heading']:'';
            $small_content = isset( $_POST['blog-small-content'])?$_POST['blog-small-content']:'';
            $more_content = isset( $_POST['blog-more-content'])?$_POST['blog-more-content']:'';

            $more= mysqli_real_escape_string($conn,$more_content);
            $small= mysqli_real_escape_string($conn,$small_content);
            $heading= mysqli_real_escape_string($conn,$heading);

            $datetime = date("Y-m-d")." ".date("h:i:s");
            $status=1;
            $created_by = $admin_name;
            $section= 'blogs';
            if(getimagesize($_FILES['blog-image']['tmp_name']) == FALSE){
                // echo " Please Select an image";
                $sql = "INSERT INTO `blog_details`( `title`, `short_desc`,`long_desc`,`page_section`, `status`,`created_by`) VALUES ('$heading','$small','$more','$section','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Thank you data stored..')
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                } else {
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Server error..')
                    window.location.href='../Galileolife_Admin/blog.php';
                    </SCRIPT>");
                    echo("Error description: " . mysqli_error($conn));
                }
            }
            else{
                $blog_images =  $_FILES['blog-image'];
                $blog_image_name = $blog_images['name'];
                $blog_image_error = $blog_images['error'];
                $blog_image_temp = $blog_images['tmp_name'];
                $blog_image_extension = explode('.',$blog_image_name); //sepatare name and extension
                $blog_image_chk = strtolower(end($blog_image_extension)); // store the extension
                $extensionStored = array('png','jpg','jpeg','doc','docx','pdf');
    
                if(in_array($blog_image_chk,$extensionStored)){
                    $finalImg = time().$doc_image_name;
                    $blog_destination_folder = "../Assets/BlogImages/".$finalImg;
                    move_uploaded_file($blog_image_temp,$blog_destination_folder);
                    $sql = "INSERT INTO `blog_details`( `blog_banner`,`title`, `short_desc`,`long_desc`,`page_section`, `status`,`created_by`) VALUES ('$finalImg','$heading','$small_content','$more_content','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    } else {
                        echo("Error description: " . mysqli_error($conn));
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..')
                       window.location.href='../Galileolife_Admin/blog.php';
                        </SCRIPT>");
                    }
        
                }
            }
        }
    }
}
else if($oper == 'delete-blog'){
    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `blog_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/blog.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/blog.php';
            </SCRIPT>");
        }
    }
}