<div class="page-nav no-margin row" style="background-color: #2B7DDF;">
    <div class="container">
        <div class="row">
            <h2 class="text-white"><?php echo $title ?></h2>
            <ul class="text-white">
                <li> <a href="#" class="text-white"><i class="fas fa-home text-white"></i> Home</a></li>
                <?php
                if($title == "Laboratory Detail"){?>
                    <li><i class="fas fa-angle-double-right text-white"></i> <?php echo "Our Laboratory" ?></li>
                    <li><i class="fas fa-angle-double-right text-white"></i> <?php echo $title ?></li>
                <?php } else { ?>
                    <li><i class="fas fa-angle-double-right text-white"></i> <?php echo $title ?></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
</div>