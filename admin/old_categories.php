''
<?php include('includes/admin-header.php'); ?>


    <div id="wrapper">




        <!-- Navigation -->
        <?php include('includes/admin-navagation.php'); ?>


        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Author</small>
                        </h1>
                            
                        <!---Admin Add Catagory section -->
                            <div class="col-xs-6">
                            
                            <?php insert_categories(); ?>
                            
                              
                                <form action="" method="post">
                                  <div class="form-group">
                                        <label for="cat_title">Add Category</label>
                                        <input class="form-control" type="text" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                                </form>

                                <?php // UPDATE AND INCLUDE QUERY
                                if(isset($_GET['update'])) {
                                    $cat_id = $_GET['update'];
                                }

                                 include "includes/update-categories.php";
                                ?>



                            </div>
                        <!-- End Add Category section -->

                            <div class="col-xs-6">
                                <table class="table table-bordered table-hover">
                                    <thread>
                                    <tr>
                                        <th>ID</th>
                                        <th>Catagory Title</th>
                                    </tr>
                                    </thread>
                                    <tbody>
                                        <tr>
                                            <?php findAllCategories(); ?>

                                            <?php deleteCategories(); ?>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>


        <!-- /#page-wrapper -->

        <?php include('includes/admin-footer.php'); ?>
