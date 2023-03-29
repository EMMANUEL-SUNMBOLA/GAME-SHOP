<?php 
    include("../private/signuphandler.php");
    include("head.php");
?>

<div class="form">
    <div class="formcont">
        <form action="" method="post">
            <h1>SIGN-UP</h1>
            <input type="text" placeholder="USERNAME" name="USERNAME" value="<?php echo ((isset($_POST["sign"])) && (!empty($err))) ? $username : "" ?>"><br>
            <input type="text" placeholder="EMAIL" name="EMAIL" value="<?php echo ((isset($_POST["sign"])) && (!empty($err))) ? $email : "" ?>"><br>
            <input type="text" placeholder="PASSWORD" name="PASSWORD" ><br>
            <input type="text" placeholder="CONFIRM PASSWORD" name="PASSWORD2" ><br>
            <input type="text" placeholder="UID" name="UID" value="<?php echo ((isset($_POST["sign"])) && (!empty($err))) ? $uid : "" ?>"><br>
            <input type="text" placeholder="CARD    XXX XXXX XXX" name="CARD" value="<?php echo ((isset($_POST["sign"])) && (!empty($err))) ? $card : "" ?>"><br>
            <button type="submit" class="buy" name="sign">SIGNUP</button>
        </form>
    </div>
    <?php
    if((isset($_POST["sign"])) && (!empty($err))){
        echo '<div class="err">';
        foreach($err as $celery){
            echo $celery . '<br>';
        }
        echo '</div>';
    }
    if((isset($_POST["sign"])) && (!empty($prob))){
        echo '<div class="prob">';
        foreach($prob as $celery){
            echo $celery . '<br>';
        }
        echo '</div>';
    }
    ?>
</div>

</body>
</html>