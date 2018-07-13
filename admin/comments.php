<?php include "includes/admin-header.php" ?>
    
    <div id="wrapper">
    
        <!-- Navigation -->
 
        <?php include "includes/admin-navigation.php" ?>
        
<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>

<?php
if(isset($_GET['source'])){

$source = $_GET['source'];

} else {
    $source = "";
}

switch($source){
    
    case 'add_posts';
    include('includes/add_posts.php');
    break;    

    case 'edit_posts';
    include('includes/edit_posts.php');
    break;

    case '200';
    echo 'NICE 200!';
    break;

    case '300';
    echo 'NICE 300!';
    break;

    default: include('includes/view_all_comments.php');

    break;
}


?>


            
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin-footer.php" ?>
