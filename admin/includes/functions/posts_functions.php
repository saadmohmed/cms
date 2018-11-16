
<?php
function get_source()
{
    global $conn;
    if (isset($_GET['source'])) {
        $source = $_GET['source'];

    } else {
        $source = '';
    }
    switch ($source) {
        case 'add_post':
            include "includes/add_post.php";
            break;
        case 'edit':
            include "includes/edit_post.php";
            break;

        default:
            include "includes/view_all_posts.php";
            break;
    }
}

function view_all_posts_in_admin_root(){
 
}



?>