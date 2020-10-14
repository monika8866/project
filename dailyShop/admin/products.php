<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('config.php'); ?>

<?php

if (isset($_POST['submit'])) {
	$tag = array();
	$filename = $_FILES['image']['name'];
	$filetmpname = $_FILES['image']['tmp_name'];
	$folder = 'resources/images/product/';
	move_uploaded_file($filetmpname, $folder . $filename);

	$name 		= isset($_POST['product-name']) ? $_POST['product-name'] : '';
	$price 		= isset($_POST['product-price']) ? $_POST['product-price'] : '';
	$category 	= isset($_POST['product-category']) ? $_POST['product-category'] : '';
	$tag		= isset($_POST['tag']) ? $_POST['tag'] : '';
	$description = isset($_POST['long_description']) ? $_POST['long_description'] : '';
	$tags 		= json_encode($tag);

	$query = "INSERT INTO products (name,image,price,category_id,tag,description) VALUES('$name','$filename','$price','$category','$tags','$description')";

	$result = mysqli_query($connection, $query)
		or die("Values cannot be Inserted" . mysqli_error($connection));
}
?>

<div id="main-content">
	<!-- Main Content Section with everything -->

	<noscript>
		<!-- Show a notification if the user has disabled javascript -->
		<div class="notification error png_bg">
			<div>
				Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
			</div>
		</div>
	</noscript>

	<!-- Page Head -->
	<h2>Welcome John</h2>
	<p id="page-intro">What would you like to do?</p>

	</ul><!-- End .shortcut-buttons-set -->

	<div class="clear"></div> <!-- End .clear -->

	<div class="content-box">
		<!-- Start Content Box -->

		<div class="content-box-header">

			<h3>Content box</h3>

			<ul class="content-box-tabs">
				<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
				<li><a href="#tab2">Add</a></li>
			</ul>

			<div class="clear"></div>

		</div> <!-- End .content-box-header -->

		<div class="content-box-content">

			<div class="tab-content default-tab" id="tab1">
				<!-- This is the target div. id must match the href of this div's tab -->

				<div class="notification attention png_bg">
					<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
					</div>
				</div>

				<table>

					<thead>
						<tr>
							<th><input class="check-all" type="checkbox" /></th>
							<th>Product ID</th>
							<th>IMAGE</th>
							<th>NAME</th>
							<th>PRICE</th>
							<th>CATEGORY ID</th>
							<th>TAG</th>
							<th>DESCRIPTION</th>
							<th>ACTION</th>
						</tr>

					</thead>

					<tfoot>
						<tr>
							<td colspan="6">
								<div class="bulk-actions align-left">
									<select name="dropdown">
										<option value="option1">Choose an action...</option>
										<option value="option2">Edit</option>
										<option value="option3">Delete</option>
									</select>
									<a class="button" href="#">Apply to selected</a>
								</div>

								<div class="pagination">
									<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
									<a href="#" class="number" title="1">1</a>
									<a href="#" class="number" title="2">2</a>
									<a href="#" class="number current" title="3">3</a>
									<a href="#" class="number" title="4">4</a>
									<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
								</div> <!-- End .pagination -->
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>

					<tbody>
						<?php
						$query = 'SELECT * FROM products';
						$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

						if ($result->num_rows > 0) :

							while ($row = $result->fetch_assoc()) :

						?>

								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo '<image src="resources/images/product/' . $row['image'] . '" height="50" width="50">'; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td>$<?php echo $row['price']; ?></td>
									<td><?php echo $row['category_id']; ?></td>
									<td><?php $tags=json_decode($row['tag']); foreach($tags as $temp){echo $temp." ";}?></td>
									<td><?php echo $row['description']; ?></td>
									<td>
										<!-- Icons -->
										<a <?php echo "href='edit.php?id=" . $row['id'] . "&action=editproduct'" ?> title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										<a <?php echo "href='delete.php?id=" . $row['id'] . "&action=deleteproduct'" ?> title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>
										<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
						<?php
							endwhile;
						endif;
						?>
					</tbody>

				</table>

			</div> <!-- End #tab1 -->

			<div class="tab-content" id="tab2">

				<form action="#" method="POST" enctype="multipart/form-data">

					<fieldset>
						<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

						<p>
							<label>Name</label>
							<input class="text-input small-input" type="text" name="product-name" required />
						</p>

						<p>
							<label>Price</label>
							<input class="text-input small-input" type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="product-price" required />
						</p>

						<p>
							<label>Image</label>
							<input class="text-input small-input" type="file" name="image" required />
						</p>

						<p>
							<label>Category</label>
							<select name="product-category" class="small-input">
								<?php
								$query = "SELECT * FROM categories";
								$result = mysqli_query($connection, $query) or die("No products");
								if ($result->num_rows > 0) :
									while ($row = $result->fetch_assoc()) :
								?>
										<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
								<?php
									endwhile;
								endif;
								?>
							</select>
						</p>

						<p>
							<label>Tags</label>
							<?php
								$query = "SELECT * FROM categories";
								$result = mysqli_query($connection, $query) or die("No products");
								if ($result->num_rows > 0) :
									while ($row = $result->fetch_assoc()) :
							?>
							<input type="checkbox" name="tag[]" value="<?php echo $row['name'];?>" /> <?php echo $row['name'];?>
							<?php
									endwhile;
								endif;
							?>
						</p>

						<p>
							<label>Description</label>
							<textarea class="text-input textarea wysiwyg" id="textarea" name="long_description" cols="79" rows="15"></textarea>
						</p>

						<p>
							<input class="button" type="submit" name="submit" value="Submit" />
						</p>

					</fieldset>

					<div class="clear"></div><!-- End .clear -->

				</form>

			</div> <!-- End #tab2 -->

		</div> <!-- End .content-box-content -->

	</div> <!-- End .content-box -->

	<div class="clear"></div>


	<!-- Start Notifications -->

	<!--
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			-->

	<!-- End Notifications -->

	<?php include('footer.php'); ?>