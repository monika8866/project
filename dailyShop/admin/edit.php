<?php
ob_start(); 
include('header.php');
include('sidebar.php');

include('config.php');
if (isset($_GET['id'])) {
    $num = $_GET['id'];
    $html1='<div id="main-content">
                <noscript>
                    <div class="notification error png_bg">
                        <div>
                            Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                        </div>
                    </div>
                </noscript>
                <h2>Welcome John</h2>
                <p id="page-intro">What would you like to do?</p>
                </ul>
                <div class="clear"></div>
                <div class="content-box">
                    <div class="content-box-header">
                        <h3>Content box</h3>
                        <ul class="content-box-tabs">
                            <li><a href="#tab2">Edit</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                <div class="content-box-content">
                    <div class="tab-content default-tab" id="tab1">
                        <form action="#" method="POST" enctype="multipart/form-data">';
    
    $html2='</select>
    </p>
    <p>
        <label>Tags</label>';

    $html3= '<p>
        <input class="button" type="submit" name="submit" value="Submit" />
        </p>
    </fieldset>';
    
    $html4='	<div class="clear"></div>
    </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>';
                        
    if ($_GET['action'] == 'editproduct') {
        if (isset($_POST['submit'])) {
            $tag = array();
            $filename = $_FILES['image']['name'];
            $filetmpname = $_FILES['image']['tmp_name'];
            $folder = 'resources/images/product/';
            move_uploaded_file($filetmpname, $folder . $filename);

            $name         = isset($_POST['product-name']) ? $_POST['product-name'] : '';
            $price         = isset($_POST['product-price']) ? $_POST['product-price'] : '';
            $category     = isset($_POST['product-category']) ? $_POST['product-category'] : '';
            $tag        = isset($_POST['tag']) ? $_POST['tag'] : '';
            $description = isset($_POST['long_description']) ? $_POST['long_description'] : '';
            $tags         = json_encode($tag);

            $query = "UPDATE products SET name='$name',price='$price',image='$filename',category_id='$category',tag='$tags',description='$description'  WHERE id=$num";

            $result = mysqli_query($connection, $query)
                or die("Values cannot be Inserted" . mysqli_error($connection));

            if($result)
            {
                header('Location:products.php');
            }
        }

        echo $html1;

        $query = 'SELECT * FROM products';
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
                if ($row['id'] == $num) :
                    echo '<fieldset>
                            <p>
                                <label>Name</label>
                                <input class="text-input small-input" type="text" name="product-name" value="' . $row['name'] . '" required />
                            </p>
                            <p>
                                <label>Price</label>
                                <input class="text-input small-input" type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="product-price" value="' . $row['price'] . '" required />
                            </p>
                            <p>
                                <label>Image</label>
                                <input class="text-input small-input" type="file" name="image" value="' . $row['image'] . '" required />
                            </p>
                            <p>
                                <label>Category</label>
                                <select name="product-category" class="small-input">';

        $query2 = "SELECT * FROM categories";
        $result2 = mysqli_query($connection, $query2) or die("No products");
        if ($result2->num_rows > 0) :
            while ($rows = $result2->fetch_assoc()) :
                echo '<option value="' . $rows['id'] . '">' . $rows['name'] . '</option>';
             endwhile;
        endif;
            echo $html2;
        $query3 = "SELECT * FROM tags";
        $result3 = mysqli_query($connection, $query3) or die("No products");
        if ($result3->num_rows > 0) :
            while ($rowss = $result3->fetch_assoc()) :
                echo '<input type="checkbox" name="tag[]" value="' . $rowss['name'] . '" /> ' . $rowss['name'];
            endwhile;
        endif;
        echo '</p>
        <p>
            <label>Description</label>
            <textarea class="text-input textarea wysiwyg" id="textarea" name="long_description" cols="79" rows="15" value="' . $row['description'] . '"></textarea>
        </p>';

        echo $html3;

                endif;
            endwhile;
        endif;

        echo $html4;
    }

    if ($_GET['action'] == 'editcategory') {
        if (isset($_POST['submit'])) {

            $category 	= isset($_POST['cname'])?$_POST['cname']:'';

            $query = "UPDATE categories SET name='$category' WHERE id=$num";

            $result = mysqli_query($connection, $query)
                or die("Values cannot be Inserted" . mysqli_error($connection));

            if($result)
            {
                header('Location:categories.php');
            }
        }

        echo $html1;

        $query = 'SELECT * FROM categories';
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
                if ($row['id'] == $num) :
                    echo '<fieldset>
                    <p>
                    <label>Category Name</label>
                        <input class="text-input small-input" type="text" id="small-input" name="cname" value="'.$row['name'].'" />
                </p>';

            echo $html2;
        echo $html3;

                endif;
            endwhile;
        endif;

        echo $html4;
    }

    if ($_GET['action'] == 'edittags') {
        if (isset($_POST['submit'])) {
            
            $tag 	= isset($_POST['name'])?$_POST['name']:'';

            $query = "UPDATE tags SET name='$tag'  WHERE id=$num";

            $result = mysqli_query($connection, $query)
                or die("Values cannot be Inserted" . mysqli_error($connection));

            if($result)
            {
                header('Location:tags.php');
            }
        }

        echo $html1;

        $query = 'SELECT * FROM tags';
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
                if ($row['id'] == $num) :
                    echo '<fieldset>
                    <p>
                    <label>Tag Name</label>
                        <input class="text-input small-input" type="text" id="small-input" name="name" value="'.$row['name'].'"/>
                </p>';
        
        echo $html3;

                endif;
            endwhile;
        endif;

        echo $html4;
    }
    

    if ($_GET['action'] == 'edituser') {
        if (isset($_POST['submit'])) {
            
            $name 		= isset($_POST['name']) ? $_POST['name'] : '';
            $password 	= isset($_POST['password']) ? $_POST['password'] : '';
            $email 		= isset($_POST['email']) ? $_POST['email'] : '';
            $dob		= isset($_POST['dob']) ? $_POST['dob'] : '';
            $address 	= isset($_POST['address']) ? $_POST['address'] : '';

            $query = "UPDATE users SET username='$name',password='$password',email='$email',dob='$dob',address='$address'  WHERE id=$num";

            $result = mysqli_query($connection, $query)
                or die("Values cannot be Inserted" . mysqli_error($connection));

            if($result)
            {
                header('Location:user.php');
            }
        }

        echo $html1;

        $query = 'SELECT * FROM users';
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
                if ($row['id'] == $num) :
                    echo '<fieldset>

                    <p>
                    <label>Name</label>
                    <input class="text-input small-input" type="text" name="name" value="' . $row['username'] . '" required />
                </p>

                <p>
                    <label>Password</label>
                    <input class="text-input small-input" type="password" name="password" value="' . $row['password'] . '" required />
                </p>

                <p>
                    <label>Email</label>
                    <input class="text-input small-input" type="email" name="email" value="' . $row['email'] . '" required />
                </p>

                <p>
                    <label>Date of Birth</label>
                    <input class="text-input small-input" type="date" name="dob" value="' . $row['dob'] . '" required />
                </p>

                <p>
                    <label> Address</label>
                    <input class="text-input small-input" type="address" name="address" value="' . $row['address'] . '" required />
                </p>';

        echo $html3;

                endif;
            endwhile;
        endif;

        echo $html4;
    }
}
