<div style="display:none">
    First Online Tiffin Service Provider in jaipur, is a of providing healthy & hygienic food to each individual everyday at an affordable cost. Our food feels home cooked and is without excess oil, masala and garnishing. We manages to provide the right amount of servings which are very filling and the delivery by our boys is always on time.
</div>
<div class="slider">
    <div id="main-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($banners as $key => $value) {
                ?>
                <div class="item <?php if ($i == 0) echo 'active'; ?>">
                    <img src="<?php echo BASE_URL; ?>assets/images/banners/<?php echo $value->path; ?>" class="img-responsive" />
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
        <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-chevron-left"></i></span>
        </a>
        <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-chevron-right"></i></span>
        </a>
    </div>	
</div>

<?php foreach ($food_menu as $key => $value) { ?>
    <section class="product-carousel">
        <a href="<?php echo BASE_URL;?>order"><h2 class="product-head"><?php echo $value->name; ?> - Rs. <?php echo $value->price; ?></h2></a>
        <div class="row">
            <div class="col-xs-12">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->mon; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Monday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->mon_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->mon_d; ?>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                <div class="cart-button button-group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->tue; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Tuesday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->tue_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->tue_d; ?>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                <div class="cart-button button-group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->wed; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Wednesday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->wed_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->wed_d; ?>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                <div class="cart-button button-group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->thu; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Thursday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->thu_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->thu_d; ?>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                <div class="cart-button button-group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->fri; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Friday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->fri_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->fri_d; ?>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                <div class="cart-button button-group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->sat; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Saturday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->sat_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->sat_d; ?>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                <div class="cart-button button-group">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-col">
                            <div class="image">
                                <img src="<?php echo BASE_URL; ?>assets/images/food/<?php echo $value->menu->sun; ?>" alt="product" class="img-responsive" />
                            </div>
                            <div class="caption">
                                <h4><a href="">Sunday</a></h4>
                                <div class="description">
                                    Lunch - <?php echo $value->menu->sun_l; ?><br><br>
                                    Dinner - <?php echo $value->menu->sun_d; ?><br>
                                    <br><br><a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>
                                </div>
                                
                                <div class="cart-button button-group">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<section class="product-carousel">
    <a href="<?php echo BASE_URL;?>order"><h2 class="product-head">SPECIAL MEAL - Rs. 79</h2></a>
    <div class="row">
        <div class="col-xs-12 col-sm-5">
            <div class="item">
                <div class="product-col">
                    <div class="image">
                        <img src="<?php echo BASE_URL; ?>assets/images/food/special_meal.jpg" alt="product" class="img-responsive" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-7">
            <div class="item">
                <div class="product-col">
                    <div class="image">
                        <h3>Special Meal</h3>
                        <p>5 Butter Roti, Paneer Butter Masala, Dal, Sabji, Pulav, Bundi Raita, Salad, Sweet</p>
                        
                        <a class="btn btn-danger"  href="<?php echo BASE_URL; ?>order" style="color:#ffffff;">Order Now</a>                       
                        <br><br>
                        <br><br>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
