<!DOCTYPE html>
<!--Author:	Brian Wardwell
	Date:	May 24th, 2016
	File:	softwareOrder.php
-->
<!-- softwareOrder ALGORITHM:

	INCLUDE incSoftwareOrder.php
	GET os from user
	GET numCopies from user

	IF numCopies < 1
		DISPLAY "ERROR: YOu must order at least 1 copy!
	ELSE
		subtotal = getSubTotal(numCopies)
		salesTax = getSalesTax(subTotal)
		shippingAndHandling = getShippingAndHandling(numCopies)
		totalCost = subTotal + salesTax + shippingAndHandling
		DISPLAY "Your Order:", os, numCopies, subTotal, salesTax, shippingAndHandling, totalCost
	END
-->
<!-- incSoftwareOrder.php ALGORITHMS:

	getSubtotal FUNCTION:
		RECEIVE numCopies from softwareOrder.php
			numCopies * 35.75
			RETURN numCopies
		END
	
	getSalesTax FUNCTION:
		RECEIVE subTotal from softwareOrder.php
			subTotal * 0.07
			RETURN subtotal
		END
	
	getShippingAndHandling FUNCTION:
		RECEIVE numCopies from softwareOrder.php
			IF (numCopies < 5)
				shippingAndHandling = 3.50
				RETURN shippingAndHandling
			ELSE
				shippingAndHandling = numCopies * 0.75
				RETURN shippingAndHandling
			END
-->
<html>
<head>
	<title>SaveTheWorld Software</title>
	<link rel ="stylesheet" type="text/css" href="phpoutput_styles.css" >
</head>
<body>
	
	<div class = "header">
		<h1>SaveTheWorld Software: Order Form</h1>
	</div>

	<div class = "output">
	<?php
	
		include ("incSoftwareOrder.php");
		
		// Getting input from user
		$os = $_POST['os'];
		$numCopies = $_POST['numCopies'];

		if ($numCopies < 1) // Error message if number of copies is less than one
			print("ERROR: You must order at least 1 copy!");
		else
		{
			$subTotal = getSubTotal($numCopies); // Returning calculations from incSoftwareOrder.php
			$salesTax = getSalesTax($subTotal);
			$shippingAndHandling = getShippingHandling($numCopies);

		
			$subTotal = number_format($subTotal,2); // Output formatting
			$salesTax = number_format($salesTax,2);
			$shippingAndHandling = number_format($salesTax,2);
	
			// Calculating total cost
			$totalCost = $subTotal + $salesTax + $shippingAndHandling;

			
			// Printing for user.
			print("<hr /><h4><strong>YOUR ORDER:</strong> </h4><hr />");
			print("<p>Operating System: $os<br />");
			print("Number of copies: $numCopies<br />");
			print("Sub-total: $$subTotal<br />");
			print("Sales tax: $$salesTax<br />");
			print("Shipping and handling: $$shippingAndHandling</p>");
			print("<hr /><h4><strong>TOTAL: $$totalCost</strong></h4><hr />");
		}
	?>
	
	</div> <!-- end of .output class -->
	
	<div class = "redirect"><!-- start of .print class-->
		<?php
			print("<h3><a href=\"#\">Print</a></h3>"); // Functionality to print receipt will go here.
		?>
	</div>

</body>
</html>
