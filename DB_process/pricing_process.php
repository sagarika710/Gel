<?php

require './../db.php';
$oper = $_REQUEST['oper'];
error_reporting(0);
if($oper == 'price-fetch'){
    $section = 'pricing';
    $sql = "SELECT * FROM pricing_details where page_section= '$section' order by id";
    $result = mysqli_query($conn, $sql);
    $data = array();
    $slno = 1;
    while($row = mysqli_fetch_array($result)){

        $data[] = array(
            "slno" => $slno,
            "id" => $row['id'],
            "heading" => $row['page_heading'],
            "page_content_small" => $row['page_content_small'],
            "page_content_more" => $row['page_content_more']
        );
        $slno++;
    }
    echo json_encode($data);

}
// price section

else if($oper == 'insert-price'){

    if(isset($_POST["price-btn"])){

        if($_POST["hidId"] != "" && $_POST["hidId"] != null){
            // echo "update";
            $id = $_POST["hidId"];
            $heading =isset( $_POST['treatment'])?$_POST['treatment']:'';
            $content = isset( $_POST['desc'])?$_POST['desc']:'';
            $price = isset( $_POST['price'])?$_POST['price']:'';
            $status=1;
            $updated_by = 'Super Admin';
            $updated_date = date("Y-m-d")." ".date("h:i:s");
            $sql = "UPDATE `pricing_details` SET `page_heading`='$heading',`page_content_small`='$content',`page_content_more`='$price',`updated_by`='$updated_by',`updated_on`='$updated_date' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Thank you data updated..')
                window.location.href='../Galileolife_Admin/pricing.php';
                </SCRIPT>");
            } else {
                echo("Error description: " . mysqli_error($conn));
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Server error..');
                window.location.href='../Galileolife_Admin/pricing.php';
                </SCRIPT>");
            }

        }
        else{
                // echo "insert";
                $heading =isset( $_POST['treatment'])?$_POST['treatment']:'';
                $content = isset( $_POST['desc'])?$_POST['desc']:'';
                $price = isset( $_POST['price'])?$_POST['price']:'';
                $status=1;
                $created_by = 'Super Admin';
                $section= 'pricing';
                    $sql = "INSERT INTO `pricing_details`(`page_heading`, `page_content_small`, `page_content_more`,`page_section`, `status`,`created_by`) VALUES ('$heading','$content','$price','$section','$status','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Thank you data stored..')
                        window.location.href='../Galileolife_Admin/pricing.php';
                        </SCRIPT>");
                    } else {
                        echo("Error description: " . mysqli_error($conn));
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Server error..');
                        window.location.href='../Galileolife_Admin/pricing.php';
                        </SCRIPT>");
                    }
            }

    }

}
else if($oper == 'delete-price'){

    if(isset($_GET['id'])){
        $pid = isset( $_GET['id'])?$_GET['id']:'';
        $sql = "DELETE FROM `pricing_details` where id = '$pid'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data deleted sucessfully..')
            window.location.href='../Galileolife_Admin/pricing.php';
            </SCRIPT>");
        } else {
            echo("Error description: " . mysqli_error($conn));
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Server error..');
            window.location.href='../Galileolife_Admin/pricing.php';
            </SCRIPT>");
        }
    }

}

?>