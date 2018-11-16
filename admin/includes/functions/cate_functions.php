<?php

function view_all_cats_in_admin_root()
{
    global $conn;
    $query = "SELECT * FROM categories ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $cate_id = $row['cate_id'];
        $cate_title = $row['cate_title'];

        echo "<tbody>";
        echo "<tr>";
        echo "<td> {$cate_id} </td>";
        echo " <td> {$cate_title} </td>";
        echo " <td><a href='categories.php?delete-id={$cate_id}'>Delete</a> </td>";
        echo " <td><a href='categories.php?update-id={$cate_id}'>Update</a> </td>";
        echo "  </tr>";
        echo "</tbody>";

    }
}

function inserting_into_cats()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $cate_title = $_POST['cate_title'];
        if (strlen($cate_title) > 0 && strlen(trim($cate_title)) == 0 || empty($cate_title)) {
            echo "<h2 style='color:red;'>you must fill the filed</h2><br>";
        } else {

            $query = " INSERT INTO categories(cate_title)
                                       VALUES('$cate_title') ";

            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<h2 style='color:green;'>Category Created :) </h2>";
            } else {
                echo "<h2 style='color:red;'>Category not Created</h2>";

            }
        }
    }
}

function get_cats_value_to_update_input()
{
    global $conn;

    if (isset($_GET['update-id'])) {
        $get_cate_id = $_GET['update-id'];
        global $conn;
        $query = "SELECT * FROM categories WHERE cate_id = $get_cate_id ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $cate_id = $row['cate_id'];
            $cate_title = $row['cate_title'];
            if (isset($cate_title)) {
                echo "<form action ='' method ='post'>";


                echo "<div class ='form-group' >";
                echo "<input value ='$cate_title' type = 'text' class ='form-control' name ='cate_update_value' >";

                echo "</div>";
                echo " <div class='form-group'>";
                echo "<input type ='submit' name ='update_cate' class ='btn btn-primary' value = 'Update Category' >";
                echo " </div>";
                echo "</form>";
            }
        }

        if (isset($_POST['update_cate'])) {
            $cate_title = $_POST['cate_update_value'];



            $query = "UPDATE categories  SET cate_title = '{$cate_title}' WHERE cate_id = {$get_cate_id} ";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("saad");
            }
            header('Location: categories.php');
        }
    }
}

function delete_from_cats()
{
    global $conn;
    if (isset($_GET['delete-id'])) {
        $get_cate_id = $_GET['delete-id'];
        $query = "DELETE FROM categories WHERE cate_id= {$get_cate_id} ";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<h2 style='color:red;'>Category deleted :) </h2>";
            header('Location: categories.php');
        }
        
    }
 
}

?>