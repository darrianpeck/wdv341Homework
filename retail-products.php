<?php
    //database workflow
        //1. Connect to the database
        //2. Create your SQL command
        //3. Prepare your SQL Statement.......PDO Prepared Statements
        //4. Bind any parameters as needed
        //5. execute your SQL command/prepared statment
        //6. Process your result-set/object

    //include an external PHP file into this file
        //inclued
        //require

        //1.
            require '../dbConnectHost.php';        //copies content of dbConnect.php INTO this page

        //2.
            $sql = "SELECT product_id, product_name, product_description, product_price, product_image, product_inStock, product_status, product_update_date FROM wdv341_products";  
            if ($sql)
        //3. prepare out statement object PDO Prepared Statements
            $stmt = $conn->prepare($sql);

       //4. 


       //5. 
            $stmt->execute(); 

       //6.  fetch
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       //setting ALL fetch commands to return associative array
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}
        body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}
        h1,h2,h3{font-weight:400}
        h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}
        h1 span{color:#484c9b}
        h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}
        h3{font-size:18px;line-height:35px;margin:50px 0 0}
        a{color:#484c9b;text-decoration:none}
        a:focus,a:hover{text-decoration:underline}
        p{margin:0 0 2rem}
        p span{color:#aaa}
        header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}
        header p{margin:0}
        section{width:95%;max-width:910px;margin:40px auto}
        pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}
        table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}
        thead{background:#5965af;color:#fff}
        tbody tr td,thead td{padding:.5rem .75rem}
        tbody tr:nth-child(even){background:#efefef}
        tbody tr td:first-child{padding-left:1.25rem}
        tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}
        tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}
        tbody tr td:last-child,thead td:last-child{width:50%}
        
        @media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
        section {display: flex; justify-content: space-between; max-width: 1200px;}
        .productBlock{width:calc(100% / 6);display:inline-block;margin:0 .5rem;border:none;padding:1rem;background:#efefef;border-radius:10px;font-size:.875rem;line-height:1.5}.productImage img{display:block;margin-left:auto;margin-right:auto;width:100%;height:auto}.productName{font-size:large;margin:1rem 0 .5rem;text-align:left}.productDesc{margin-left:10px;margin-right:10px;margin:0}.productPrice{font-size:larger;color:#00f;margin:.5rem 0;text-align:left}.productStatus{font-weight:bolder;color:#2f4f4f;margin:.5rem 0;text-align:left}.productInventory{margin:.5rem 0;text-align:left}.productLowInventory{color:red}
    </style>
</head>

<body>
    <header>
        <h1>DMACC Electronics Store!</h1>
        <p>Products for your Home and School Office</p>
    </header>
    <section>
        <!-- This .productBlock is an example displaying the format/structure of each product.
        It will be replaced by the actual data. Please loop through all of your products and display them using
        this layout and following the instructions of the assignment. -->

      <!--<div class="productBlock">
            <div class="productImage">
                <image src="productImages/monitor.jpg">
            </div>
            <p class="productName">New 27" Monitor</p>
            <p class="productDesc">This is a new monitor. Available for desktop uses. A good choice for home office and school work.</p>
            <p class="productPrice">$159.00</p>
                //The productStatus element should only be displayed if there is product_status data in the record
            <p class="productStatus">New Item!</p>            
            <p class="productInventory">89 In Stock!</p>
        </div>-->

            <?php
                while($row = $stmt->fetch()) {
                    echo "<div class='productBlock'>";

                        echo "<div class='productImage'>";
                            echo "<img src='productImages/".$row["product_image"]."'>";
                        echo "</div>";

                        echo "<h3 class='productName'>";
                            echo $row["product_name"];
                        echo "</h3>";

                        echo "<p class='productDesc'>";
                            echo $row["product_description"];
                        echo "</p>";
                        
                        echo "<p class='productPrice'>";
                            echo "$" . $row["product_price"];
                        echo "</p>";

                        echo "<p class='productStatus'>";
                            echo $row["product_status"];
                        echo "</p>";

                        //If the $product_inventory is less than 10 then apply the productLowInventory class to the inventory p container.
                       echo "<p class='productInventory"; 
                            if($row["product_inStock"] < 10) {
                                echo " productLowInventory";
                                //echo "checking product";
                            }
                        echo "'>";
                            echo $row["product_inStock"];
                        echo " In Stock! </p>";
                        
                    echo "</div>";
                }
            ?>  

    </section>
</body>

</html>