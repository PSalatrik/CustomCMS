 <?php

if(isset($_POST['checkBoxArray'])) {

foreach($_POST['checkBoxArray'] as $postvalueID){

 $bulk_options = $_POST['bulk_options'];

    switch($bulk_options){
        case 'published':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $postvalueID " ; 
        $update_to_published_status = mysqli_query($connection, $query);
        break;
        case 'draft':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $postvalueID " ; 
        $update_to_draft_status = mysqli_query($connection, $query);
        break;

        case "delete":
        $delete_query = "DELETE FROM posts WHERE post_id = $postvalueID" ;
        $delete_posts = mysqli_query($connection, $delete_query);
        break;

        case "reset":
        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $postvalueID";
        $reset_query = mysqli_query($connection, $query);
        break;

        case "clone":

        $clone_query = "SELECT * FROM posts WHERE post_id = $postvalueID" ;
        $clone_posts_query = mysqli_query($connection, $clone_query);

        while($row = mysqli_fetch_array($clone_posts_query)){
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        

            }
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_content, post_tags, post_status, post_image) ";
        $query .= "VALUES ( '{$post_category_id}', '{$post_title}', '{$post_author}', '{$post_date}', '{$post_content}', '{$post_tags}', '{$post_status}', '{$post_status}' ) ";

        $copy_query = mysqli_query($connection, $query);

                confirm($copy_query);


        break;

    }

}
}

 ?>




 <form action="" method="post">

  <table class="table table-bordered table-hover">

    <div class="col-xs-4" class="bulkOptionsContainer">

            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
                <option value="reset">Reset Count</option>
            </select>
    </div>

    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_posts">Add New</a>
    </div>

                <thead>
                    <tr>

                    <th><input id="selectAllBoxes" type="checkbox"> </th>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Views</th>
                    </tr>
                </thead>
            
            <tbody>

<?php

$query = "SELECT * FROM posts ORDER BY post_id DESC ";
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($result)){
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_count = $row['post_views_count'];

    echo "<tr>";

    ?>
        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id;?>'> </td>;

    <?php

    
    echo"<td>{$post_id}</td>";
    echo"<td>{$post_author}</td>";
    echo"<td>{$post_title}</td>";

$query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
$select_categories_id = mysqli_query($connection,$query);  

while($row = mysqli_fetch_assoc($select_categories_id)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

    echo"<td>{$cat_title}</td>";
}    

    echo"<td>{$post_status}</td>";
    echo"<td><img width='100' src='../images/$post_image' alt='post image'</td>";
    echo"<td>{$post_comment_count}</td>";
    echo"<td>{$post_date}</td>";
    echo"<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
    echo"<td><a href='posts.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
    echo"<td><a onClick=\"javascript: return confirm('Are you sure'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo"<td><a onClick=\"javascript: return confirm('Are you sure'); \" href='posts.php?reset={$post_id}'>{$post_count}</a></td>";
    echo "</tr>";


}


        ?>
                
            </tbody>
            </table>
            </form>

            

<?php

if(isset($_GET['delete'])){

    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}" ;

    $result = mysqli_query($connection, $query);
    header("Location: posts.php");
    confirm($result);

}

if(isset($_GET['reset'])){

    $the_post_id = $_GET['delete'];

    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" .mysqli_real_escape_string($connection, $_GET['reset'] ) . " ";

    $reset_query = mysqli_query($connection, $query);
    header("Location: posts.php");
    confirm($reset_query);

}


?>
<script src="js/jquery.js"></script>
<script src="js/scripts.js"></script>
