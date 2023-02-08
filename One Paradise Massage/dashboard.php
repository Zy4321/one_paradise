<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>One Paradise Massage</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="dashboard.css" />
        <link rel="icon" href="Logo\Logo1.png" />
    </head>

    <body class="tabs">
        <nav id="navbar">
            <div class="logo">
                <a href="dashboard.php" class="logo-text">ONE PARADISE</a>
            </div>
            <?php 
                if(isset($_SESSION["adname"])){
                    echo "<div class='nav-links tabs-sidebar'>
                    <li class='tabs-button tab-1' data-for-tab='1'><i class='fa-solid fa-chart-line'></i><a href='#'>Dashboard</a></li>
                    <li class='tabs-button tab-2' data-for-tab='2'><i class='fa-solid fa-calendar-check'></i><a href='#'>Appointment</a></li>
                    <li class='tabs-button tab-3' data-for-tab='3'><i class='fa-solid fa-address-card'></i><a href='#'>Customer List</a></li>
                    <li class='tabs-button tab-4' data-for-tab='4'><i class='fa-solid fa-spa'></i><a href='#'>Services</a></li>
                </div>";
                }
                else{
                    header("location: index.php");
                  }
            ?>
        </nav>
        
        <section id="interface">
            <div class="navigation">
                <div class="nav-wrapper">
                    <i class="fa-solid fa-crown user-icon"></i>
                </div>

                <div class="logout">
                    <button class="logout-btn" type="submit" onclick="window.location.href='php-script/admin-logout-script.php'">Logout</button>
                </div>
            </div>
            
            <div class="container tabs-content" data-tab="1">
                <h3 class="title">
                Dashboard
                </h3>

                <div class="details">
                    <div class="detail-box">
                        <i class="fas fa-users"></i>
                        <div>
                            <?php 
                                require "php-script/dbh.php";
                                $sql = mysqli_query($conn, "SELECT * FROM customer;");
                                $result = mysqli_num_rows($sql);
                                echo "<h3>$result</h3>";
                            ?>
                            <span>Customers</span>
                        </div>
                    </div>
                    <div class="detail-box">
                        <i class="fa-solid fa-calendar-check"></i>
                        <div>
                            <?php 
                                require "php-script/dbh.php";
                                $sql = mysqli_query($conn, "SELECT * FROM booking WHERE progress = 0;");
                                $result = mysqli_num_rows($sql);
                                echo "<h3>$result</h3>";
                            ?>
                            <span>On Going Appointments</span>
                        </div>
                    </div>
                    <div class="detail-box">
                        <i class="fa-solid fa-spa"></i>
                        <div>
                            <?php 
                                require "php-script/dbh.php";
                                $sql = mysqli_query($conn, "SELECT * FROM massage_type;");
                                $result = mysqli_num_rows($sql);
                                echo "<h3>$result</h3>";
                            ?>
                            <span>Services</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container tabs-content" data-tab="2">
                <h3 class="title">
                Appointment
                </h3>
                <i class="fa-solid fa-magnifying-glass glass"></i>
                <form class="btn-wrapper" action="dashboard.php?page=2" method="POST">
                    <input type="text" placeholder="search" name="key">
                    <div class="btn-container">
                        <button class="s-btn" type="submit" name="search">Search</button>
                        <button class="r-btn" type="submit" name="reset">Reset</button>
                    </div>
                    <div class="t-booking">
                        <?php 
                             require 'php-script/dbh.php';
                             if(isset($_POST["search"])){
                                $key=$_POST["key"];
                                $result = mysqli_query($conn, "SELECT * FROM `c_booking` where b_id like'%$key%' 
                                OR start_time like '%$key%' OR end_time LIKE '%$key%' OR cusName LIKE '%$key%' OR 
                                b_date LIKE '%$key%' ORDER BY 'b_id' ASC;");
                                $number=mysqli_num_rows($result);
                                }else{
                                $result = mysqli_query($conn, "SELECT b.b_id,s.start_time,s.end_time,c.cusName,m.m_type,b.progress,b.b_date FROM booking b, session s, massage_type m, customer c WHERE c.cusid=b.cusid AND s.slot_id=b.slot_id AND m.m_type=b.m_type ORDER BY `b`.`b_id` ASC;");
                                }
                                $number=mysqli_num_rows($result);
                                if($number>0){
                                echo "<h3>Result: $number</h3>";
                                }else{
                                echo "<h3>NO RESULT</h3>";      
                                }
                                ?>
                            
                                <table>
                                <tr>
                                <th>Booking ID</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Customer Name</th>
                                <th>Massage Type</th>
                                <th>Progress</th>
                                <th>Booking Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Completed</th>
                                </tr>
                                <?php
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                <td><?=$row['b_id']?></td>
                                <td><?=$row['start_time']?></td>
                                <td><?=$row['end_time']?></td>
                                <td><?=$row['cusName']?></td>
                                <td><?=$row['m_type']?></td>
                                <?php  if($row['progress']== 0){
                                    $progress = "Ongoing";
                                }else{
                                    $progress = "Completed";?>
                                <?php } ?>
                                <td><?=$progress?></td>
                                <td><?=$row['b_date']?></td>
                                <td><a href="a_edit.php?id=<?=$row['b_id']?>" class='edit-btn'>Edit</a></td>
                                <td><a href="php-script/a_del.php?id=<?=$row['b_id']?>" name='delete' class='delete-btn'>Delete</a></td>
                                <?php  if($row['progress']== 0){ ?>
                                    <td><a href="php-script/a_complete.php?id=<?=$row['b_id']?>" name='complete' class='complete-btn'>complete</a></td>
                                <?php }else{ ?>
                                    <td><i class="fa-solid fa-check"></i></td>
                                <?php } }?>
                                </tr>
                                </table>
                    </div>
                </form>
            </div>

            <div class="container tabs-content" data-tab="3">
                <h3 class="title">
                Customer List
                </h3>
                
                
                <div class="t-booking2">
                    <?php 
                        include "php-script/customer-table.php";
                    ?>
                </div>
            </div>

            <div class="container tabs-content" data-tab="4">
                <h3 class="title">
                Services
                </h3>

                <div class="services">
                    <form class="upload" action="php-script/services.php" method="POST" enctype="multipart/form-data">
                        <div class="text-field">
                            <p>MASSAGE NAME:</p> 
                            <input type="text" name="m_type">
                        </div>
                        <div class="text-field">
                            <p>Price(RM):</p> 
                            <input type="text" name="m_price">
                        </div>
                        <div class="text-field">
                            <p>Description:</p> 
                            <textarea type="text" name="m_desc"></textarea>
                        </div>
                        <div class="text-field">
                            <p>IMAGE:</p> 
                            <input type="file" name="fileUpload" id="fileUpload"><br>
                        </div>
                        <div class="btn-container">
                            <input class="upload-btn1" type="submit" name="submit">
                            <input class="upload-btn2" type="reset" name="submit">
                        </div>
                    </form>
                    <div class="t-services">
                        <?php 
                            include "php-script/services-table.php";
                        ?>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <script>
            function tabsSetup () {
                document.querySelectorAll(".tabs-button").forEach(li => {
                    li.addEventListener("click", () => {
                        const sideBar = li.parentElement;
                        const tabsContainer = sideBar.closest(".tabs");
                        const tabNumber = li.dataset.forTab;
                        const tabToActivate = tabsContainer.querySelector(`.tabs-content[data-tab="${tabNumber}"]`);

                        sideBar.querySelectorAll(".tabs-button").forEach(button => {
                            button.classList.remove("tabs-button--active");
                        });

                        tabsContainer.querySelectorAll(".tabs-content").forEach(tab => {
                            tab.classList.remove("tabs-content--active");
                        });

                        li.classList.add("tabs-button--active");
                        tabToActivate.classList.add("tabs-content--active");
                        
                    });
                });
            }
            </script>

            <?php  if(isset($_GET["page"])){
                    if($_GET["page"] == "1"){ ?>
                    <script>
            document.addEventListener("DOMContentLoaded", () => {
                tabsSetup();

                document.querySelectorAll(".tabs").forEach(tabsContainer => {
                    tabsContainer.querySelector(".tabs-sidebar .tab-1").click();
                });                
            });
            </script>
             <?php }else if($_GET["page"] == "2"){ ?>
                <script>
            document.addEventListener("DOMContentLoaded", () => {
                tabsSetup();

                document.querySelectorAll(".tabs").forEach(tabsContainer => {
                    tabsContainer.querySelector(".tabs-sidebar .tab-2").click();
                });                
            });
            </script>
            <?php }else if($_GET["page"] == "3"){ ?>
                <script>
            document.addEventListener("DOMContentLoaded", () => {
                tabsSetup();

                document.querySelectorAll(".tabs").forEach(tabsContainer => {
                    tabsContainer.querySelector(".tabs-sidebar .tab-3").click();
                });                
            });
            </script>
            <?php }else if($_GET["page"] == "4"){ ?>
                <script>
            document.addEventListener("DOMContentLoaded", () => {
                tabsSetup();

                document.querySelectorAll(".tabs").forEach(tabsContainer => {
                    tabsContainer.querySelector(".tabs-sidebar .tab-4").click();
                });                
            });
            </script>
            <?php }}else{ ?>
                 <script>
                 document.addEventListener("DOMContentLoaded", () => {
                     tabsSetup();
     
                     document.querySelectorAll(".tabs").forEach(tabsContainer => {
                         tabsContainer.querySelector(".tabs-sidebar .tabs-button").click();
                     });                
                 });
                 </script>       

           <?php } ?>
    </body>
</html>