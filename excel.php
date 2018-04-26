<?php
//excel.php
include 'db_conn_test.php';

$conn =Opencon();

$table = $_GET['table'];
echo $table;
$userID = $_GET['ID'];

if($table == 'curr'){
    $filename = 'Current_posts'.$userID.'.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('S.no', 'Name', 'Author', 'Price', 'Type'));


    $sql = "SELECT * FROM BOOK WHERE UserID='$userID' AND Availability='YES'";
    $result = $conn->query($sql) or die($conn->error);

    $count=1;

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){

            $bid=$row['ID'];
            $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
            $result2 = $conn->query($sql2)  or die($conn->error);
            $row2 = $result2->fetch_assoc();

            $final_row = array($count,$row2['Name'], $row2['Author'], $row2['Price'], $row['Type']);
            fputcsv($output, $final_row);

            $count = $count+1;

        }

    } else{
        //echo "0 results";
    }
}
else if($table == 'sold'){
    $filename = 'sold'.$userID.'.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('S.no', 'Name', 'Author', 'Price', 'Buyer'));


    $sql = "SELECT * FROM TRANS WHERE PREV='$userID' AND STATUS=0";
    //echo $sql;
    $result = $conn->query($sql);

    $count=1;

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){

            $bid=$row['BOOKID'];
            $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
            $result2 = $conn->query($sql2)  or die($conn->error);
            $row2 = $result2->fetch_assoc();
            $buyerid = $row['NEXT'];
            $sql3 = "SELECT * FROM USER WHERE ID = '$buyerid' ";
            $result3 = $conn->query($sql3)  or die($conn->error);
            $row3 = $result3->fetch_assoc();
            $buyer = $row3['Name'];

            $final_row = array($count,$row2['Name'], $row2['Author'], $row2['Price'], $buyer);
            fputcsv($output, $final_row);

            $count = $count+1;

        }

    } else{
        //echo "0 results";
    }
}
else if($table == 'bought'){
    $filename = 'bought'.$userID.'.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('S.no', 'Name', 'Author', 'Price', 'Seller'));

    $sql = "SELECT * FROM TRANS WHERE NEXT='$userID' AND STATUS=0";
    $result = $conn->query($sql);

    $count=1;

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){

            $bid=$row['BOOKID'];
            $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
            $result2 = $conn->query($sql2)  or die($conn->error);
            $row2 = $result2->fetch_assoc();
            $sellerid = $row['PREV'];
            $sql3 = "SELECT * FROM USER WHERE ID = '$sellerid' ";
            $result3 = $conn->query($sql3)  or die($conn->error);
            $row3 = $result3->fetch_assoc();
            $seller = $row3['Name'];

            $final_row = array($count,$row2['Name'], $row2['Author'], $row2['Price'], $seller);
            fputcsv($output, $final_row);
            $count = $count+1;
        }

    } else{
        //echo "0 results";
    }


}else if($table == 'borrowed'){

    $filename = 'borrowed'.$userID.'.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('S.no', 'Name', 'Author', 'Price', 'Borrowed from'));

    $sql = "SELECT * FROM TRANS WHERE NEXT='$userID' AND STATUS=1";
    $result = $conn->query($sql);

    $count=1;

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){

            $bid=$row['BOOKID'];
            $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
            $result2 = $conn->query($sql2)  or die($conn->error);
            $row2 = $result2->fetch_assoc();
            $sellerid = $row['PREV'];
            $sql3 = "SELECT * FROM USER WHERE ID = '$sellerid' ";
            $result3 = $conn->query($sql3)  or die($conn->error);
            $row3 = $result3->fetch_assoc();
            $seller = $row3['Name'];

            $final_row = array($count,$row2['Name'], $row2['Author'], $row2['Price'], $seller);
            fputcsv($output, $final_row);

            $count = $count+1;

        }

    } else{
        // "0 results";
    }



}
else if($table == 'lent'){

    $filename = 'lent'.$userID.'.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('S.no', 'Name', 'Author', 'Price', 'Lent to'));

    $sql = "SELECT * FROM TRANS WHERE PREV='$userID' AND STATUS=1";
    $result = $conn->query($sql);

    $count=1;

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){

            $bid=$row['BOOKID'];
            $sql2 = "SELECT * FROM BOOK WHERE ID = '$bid' ";
            $result2 = $conn->query($sql2)  or die($conn->error);
            $row2 = $result2->fetch_assoc();
            $buyerid = $row['NEXT'];
            $sql3 = "SELECT * FROM USER WHERE ID = '$buyerid' ";
            $result3 = $conn->query($sql3)  or die($conn->error);
            $row3 = $result3->fetch_assoc();
            $buyer = $row3['Name'];

            $final_row = array($count,$row2['Name'], $row2['Author'], $row2['Price'], $seller);
            fputcsv($output, $final_row);

            $count = $count+1;

        }

    } else{
        //echo "0 results";
    }



}
?>
