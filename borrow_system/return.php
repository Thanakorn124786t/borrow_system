<?php
if (isset($_POST["return_id"])) {
    $borrow_id = $_POST["return_id"];

    $query = "UPDATE borrow_records SET return_date=NOW(), status='returned' WHERE id='$borrow_id'";
    mysqli_query($conn, $query);

    $update = "UPDATE items SET status='available' WHERE id=(SELECT item_id FROM borrow_records WHERE id='$borrow_id')";
    mysqli_query($conn, $update);

    echo "คืนสำเร็จ!";
}
?>