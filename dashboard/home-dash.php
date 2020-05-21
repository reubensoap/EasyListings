<?php include('./view/dash-header.php'); ?>
<div class="big-wrapper dash-back">
    <div class="rp-content-wrapper">
        <div class="home-dash-top">
            <div class="company-head">
                <h3><?php echo $userClientData['businessName']?></h3>
                <p>Welcome Back, <?php echo $userClientData['firstName'] . " " . $userClientData['lastName']; ?></p>
                <div class="dash-line"></div>
            </div>
            <div class="company-middle">
                <div class="middle-left">
                    <div class="middle-left-top">
                        <ul>
                            <li><p>Make Request</p></li>
                            <li><p>Edit Your Information</p></li>
                            <li><p>View Our Notes</p></li>
                        </ul>
                    </div>
                    <div class="middle-left-bottom">
                        <h4>Updates: </h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo fugiat tempore totam adipisci sunt praesentium! Maiores placeat eius debitis perferendis, non ut voluptatem quis perspiciatis voluptate voluptas reprehenderit cumque repellendus fugiat natus minima, harum ad sint eveniet voluptates quam mollitia iusto. Soluta iusto delectus eveniet!</p>
                    </div>
                </div>
                <div class="middle-right">
                    <img src="../images/dash-photo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./view/dash-footer.php'); ?>