<?php include 'header.php' ?>
    <header>
        <div class="container">
            <div class="intro-text"></div>
        </div>
    </header>
    <?php
    if (@$_SESSION['pertype_id']==1) {
        //  header("Refresh:1; techer.php");
        echo '<script type="text/javascript">        
                window.location="/techer.php";
            </script>';
         
    }if (@$_SESSION['pertype_id']==2) {
        echo '<script type="text/javascript">       
         window.location="/student.php";
        </script>';
        //  header("Refresh:0; student.php");
    }if (@$_SESSION['pertype_id']==""){
       ?>
    <div class="index">
        <div class="heading">WELCOME CHILDREN</div>
            <a href="log_in.php" class="page-scroll btn btn-default">LOGIN</a>
            <a href="regis.php" class="page-scroll btn btn-default">REGIS</a>
    </div>

<?php  
    }

include 'footer.php' 
?>