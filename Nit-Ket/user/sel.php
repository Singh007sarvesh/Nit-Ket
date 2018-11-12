<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Seller</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/seller.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' /> 
</head>
<body>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.html" class="menu-top-active" >HOME</a></li>
                           
                             <li><a href="#" id="view">View</a></li>
                            <li><a href="#" id="createc">Create Chart</a></li>
                            <li><a href="#" id="Add_new">Add new</a></li>
			    <li><a href="logout.php?confirm=1" id="logout">LogOut</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    	<div id="header">	
    		<form action="Seller.php" method="post" enctype="multipart/form-data">
  			<div class="form-group">
    				<label for="item Name">Item Name</label>
    					<input type="text" class="form-control" name="item_name" required pattern="[a-zA-Z0-9 ]{4,}">
  			</div>
  			<div class="form-group">
    				<label for="item cat">Item Category</label>
    				<select class="form-control" name="item_cat">
    						<option value="Mobile">Mobile</option>
    						<option value="Notepad">Notepad</option>
    						<option value="Laptop">Laptop</option>
    						<option value="Tab">Tab</option>
          			<option value="Tab">Book</option>
          			<option value="Tab">Bicycle</option>
          			<option value="Tab">Others</option>
					  </select>
  			</div>
  			<div class="form-group">
    				<label for="price">Price</label>
    					<input type="text" class="form-control" name="item_price" required pattern="[0-9]{3,}>
  			</div>
  			<div class="form-group">
    				<label for="item_desc">Item Description</label>
    					<input type="text" class="form-control" name="item_descp" required pattern="[a-zA-Z0-9 ]{4,}>
  			</div>
  			<div class="form-group">
    				<label for="itemstatus"> Item Status</label>
    					<input type="text" class="form-control" name="item_status" required pattern="[T]{1,}>
  			</div>
  			<div class="form-group">
    				<label for="upload"> Upload Image</label>
  			<input type="file"  name="Upload" required >
  				</div>
  				<lable><input id="right1" type="submit"  name="sub" value="Submit"></label>
		</form>
    	</div>
    	
</body>
</html>