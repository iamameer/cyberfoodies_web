<?php 

//Slider 1
$img_url = 'img/sample/sliderFood.jpg';
$small_tag = ''; //caps
$big_title = 'Hungry?';
$text = '';
$button = '<a href="browsefood.php" class="primary-btn">Browse food!</a>';
$spinsales = '';
//'<div class="off-card">
//                 <h2>Sale <span>50%</span></h2>
//             </div>';
echo '<div class="single-hero-items set-bg" data-setbg="'.$img_url.'">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <span>'.$small_tag.'</span>
                    <h1>'.$big_title.'</h1>
                    <p>'.$text.'</p>
                    '.$button.'
                </div>
            </div>
            '.$spinsales.'
        </div>
    </div>';

//Slider 2
$img_url = 'img/sample/sliderOnline.jpg';
$small_tag = 'Advertisement'; //caps
$big_title = 'You\'re selling?';
$text = 'Sign in and set up your own store FOR FREE, create multiple stores, add multiple products, ALL FOR FREE';
$button = '<a href="browsestore.php" class="primary-btn">or browse store</a>';
$spinsales = '';
// '<div class="off-card">
//                 <h2>Sale <span>50%</span></h2>
//            </div>';
echo '<div class="single-hero-items set-bg" data-setbg="'.$img_url.'">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <span>'.$small_tag.'</span>
                    <h1>'.$big_title.'</h1>
                    <p>'.$text.'</p>
                    '.$button.'
                </div>
            </div>
            '.$spinsales.'
        </div>
    </div>';


//Slider 3
$img_url = 'img/sample/sliderBazaar.jpg';
$small_tag = 'Announcement'; //caps
$big_title = 'Bazaar';
$text = 'New feature coming soon, stay tuned (:';
$button = '';//'<a href="#" class="primary-btn">Shop Now</a>';
$spinsales = '';
// '<div class="off-card">
//                 <h2>Sale <span>50%</span></h2>
//            </div>';
echo '<div class="single-hero-items set-bg" data-setbg="'.$img_url.'">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <span>'.$small_tag.'</span>
                    <h1>'.$big_title.'</h1>
                    <p>'.$text.'</p>
                    '.$button.'
                </div>
            </div>
            '.$spinsales.'
        </div>
    </div>';


?>