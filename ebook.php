<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook</title>
    <link rel="stylesheet" href="../Style/Ebook.css">
</head>
<body > 
 <div id="Head"></div><br/>  
 <div id="page-container">
   <div id="content-wrap">
    <div class="data">
        <h2>Book Details</h2>
        <table border="1">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Publication Year</th>
                <th>View</th>
            </thead>
            <tbody>
                <?php
                    require 'dbcon.php';
                    $selectquery="select * from ebook";
                    $stmt=$pdo->prepare($selectquery);
                    $stmt->execute();
                    while($result=$stmt->fetch(PDO::FETCH_ASSOC))
                    {  
                        echo "<tr>";
                            echo "<td class='link'>". $result['id']. "</td>";
                            echo "<td>". $result['title']. "</td>";
                            if(strlen($result['book_desc'])===0)
                                echo "<td>None</td>";
                            else
                                echo "<td>". $result['book_desc']. "</td>";
                            echo "<td>". $result['author']." </td>";
                            echo "<td class='link'>". $result['yop']." </td>";
                            echo "<td class='link'><a href='".$result['pdf']."' target='_blank'>Click Here</a> </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table> 
    <div id="content">
        <?php
            session_start();
            if(isset($_SESSION['member_id']) && isset($_SESSION['member_name']) || (isset($_SESSION['ngo_id']))){
        ?>        
        <div>             
            <a href="#EUF" class="nav-link at-float" data-toggle="modal"  id="at-menu-share" >                
                <i class="fa fa-plus my-float"></i></a>
            </div>
            <div w3-include-html="ebook_modal.php"></div>
        </div><br/>
        <?php
        }
        ?>
    </div> 
    </div>
    
    <div id="Foot"></div>
</div>
</body>
<script>
    function includeHTML() {
        var z, i, elmnt, file, xhttp;
        /* Loop through a collection of all HTML elements: */
        z = document.getElementsByTagName("*");
        for (i = 0; i < z.length; i++) {
            elmnt = z[i];
            /*search for elements with a certain atrribute:*/
            file = elmnt.getAttribute("w3-include-html");
            if (file) {
                /* Make an HTTP request using the attribute value as the file name: */
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {elmnt.innerHTML = this.responseText;}
                        if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
                        /* Remove the attribute, and call this function once more: */
                        elmnt.removeAttribute("w3-include-html");
                        includeHTML();
                    }
                }
                xhttp.open("GET", file, true);
                xhttp.send();
                /* Exit the function: */
                return;
            }
        }
    }

    includeHTML();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(function(){
       $("#Head").load("Header.php");
       $("#Foot").load("Footer.php");
   });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script> 
</html>