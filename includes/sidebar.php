<div class="col-md-4" style="width: 25%; float:right;">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!---End Search Form -->
                    <!-- /.input-group -->
                </div>

                <!-- Login Form -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" placeholder="Enter User Name" type="text" class="form-control">

                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input name="password" placeholder="Enter Your Password" type="password" class="form-control">
                        <span class="input-group btn">
                            <button class=" btn btn-primary" name="login" type="submit">Submit
                            
                            </button>
                            
                            </span>
                    
                    </div>
                    </form> <!---End Search Form -->
                    <!-- /.input-group -->
                </div>






                <!-- Blog Categories Well -->

                <div class="well">

                <?php
                        $query = 'SELECT * FROM categories LIMIT 10 ';
                        $select_categories_sidebar = mysqli_query($connection, $query);

                ?>



                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php
                            while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];

                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                          }

                            ?>
                                
                            </ul>
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>







                <!-- Side Widget Well -->
                <?php include ('widget.php'); ?> 

            </div>
