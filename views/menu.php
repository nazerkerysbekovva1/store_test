<?php
    include "config/db.php";
?>
<div class="menu">
            <div class="menu-div">
                <?php
                    $menu_query = mysqli_query($con, "SELECT * FROM menu");
                    while($row = mysqli_fetch_assoc($menu_query)){
                        $menu_name = $row["menu_name"];
                        $menu_icon = $row["icon"];
                        if(isset($_GET["menu_id"]) && $row["id"] == $_GET["menu_id"]){
                            echo '<a class="picked-link" href="'. $BASE_URL.'/profile.php?menu_id='.$row["id"].'">'. $menu_icon, $menu_name.'</a>';
                        }
                        else{
                            echo '<a href="'. $BASE_URL.'/profile.php?menu_id='.$row["id"].'">'. $menu_icon, $menu_name.'</a>';
                        }
                    }
                ?>
            </div>
            <div class="menu-div">
                <a href="<?=$BASE_URL?>/api/auth/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Выйти из аккаунта</a>
            </div>
         </div>