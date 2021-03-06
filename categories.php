<?php 
    require './admin/connect.php';
    $sql = 'select * from categories order by id asc';
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_array($result)){
        $categories[] = $row;   
    };
    $sql = 'select count(*) as count from categories';
    $result = mysqli_query($connection, $sql);
    $categories_num = mysqli_fetch_array($result)['count'];
    $num_cols = ceil($categories_num / 2) ;
?>

<div class="category">
    <div class="category__header">DANH MỤC</div>
    <div class="category__body">
    <?php for($i = 0; $i < $num_cols; $i++) { ?>
        <div class="grid_col-2 category-col">
            <a href="#" class="category-item">
                <?php
                    $ele = array_shift($categories);
                    $name = $ele['name'];
                    $image_id = $ele['id'];
                ?>
                <div class="category-item__img" style="background-image: url('./assets/images/categories/<?php echo $image_id ?>.png' ) ; background-size: contain; background-repeat: no-repeat;" ></div>
                <span class="category-item__name"><?php echo $name ?></span>
            </a>
            <a href="#" class="category-item">
                <?php
                    if(sizeof($categories) > 0) {
                        $ele = array_shift($categories);
                        $name = $ele['name'];
                        $image_id = $ele['id'];
                    
                ?>
                <div class="category-item__img" style="background-image: url('./assets/images/categories/<?php echo $image_id ?>.png' ) ; background-size: contain; background-repeat: no-repeat;" ></div>
                <span class="category-item__name"><?php echo $name ?></span>
                <?php } ?>
            </a>
        
        </div>    
    <?php } ?>
       
    </div>
    
</div>