<?php
require_once("mongodb/mongodb_connect.php");

?>

<html>
<form action="" method="post">
    <div>
    	<label for="name">Name</label>
	    <input type="text" name="name" id="name" required="required"/>

	    <br>

    	<label for="quantity">Quantity</label>
	    <input type="text" name="quantity" id="quantity" required="required"/>

	    <br>

    	<label for="distributor">Distributor</label>
	    <input type="text" name="distributor" id="distributor" required="required"/>

	    <br>

    	<label for="price">Price</label>
	    <input type="text" name="price" id="price" required="required"/>

	    <br>

    	<label for="date">Date</label>
	    <input type="text" name="date" id="date" required="required"/>
	    
    <div class="submit"><input type="submit" name="save" value="Save"/></div>
</form>
</html>