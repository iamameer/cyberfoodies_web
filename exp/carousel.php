<?php 

    $arr = array();

    #Slider 1 ###################################
    $img_url = 'https://source.unsplash.com/collection/67804040'; //'img/sample/sliderFood.jpg';
    $small_tag = ''; //caps
    $big_title = 'Hungry?';
    $text = '';
    $button = '<a href="browsefood.php" class="primary-btn">Browse food!</a>';
    $spinsales = '';
    //'<div class="off-card">
    //                 <h2>Sale <span>50%</span></h2>
    //             </div>';
    $arr1 = array($img_url,$small_tag,$big_title,$text,$button,$spinsales); 

    #Slider 2 ###################################
    $img_url = 'https://source.unsplash.com/collection/84302887'; //'img/sample/sliderOnline.jpg';
    $small_tag = 'Advertisement'; //caps
    $big_title = 'You\'re selling?';
    $text = 'Sign in and set up your own store FOR FREE, create multiple stores, add multiple products, ALL FOR FREE';
    $button = '<a href="browsestore.php" class="primary-btn">or browse store</a>';
    $spinsales = '';

    $arr2 = array($img_url,$small_tag,$big_title,$text,$button,$spinsales); 

    #Slider 3 ###################################
    $img_url = 'img/sample/sliderBazaar.jpg';
    $small_tag = 'Announcement'; //caps
    $big_title = 'Bazaar';
    $text = 'New feature coming soon, stay tuned (:';
    $button = '<a href="bazaar.php" class="primary-btn">What?</a>';
    $spinsales = '';

    $arr3 = array($img_url,$small_tag,$big_title,$text,$button,$spinsales);

    #Slider 4 ###################################
    $img_url = 'img/sample/lorongbelakang.jpg';
    $small_tag = 'Event'; //caps
    $big_title = 'Lorong Belakang';
    $text = 'Lorong Belakang Shaftbury Square dah start!';
    $button = '';//'<a href="#" class="primary-btn">Shop Now</a>';
    $spinsales = '';

    $arr4 = array($img_url,$small_tag,$big_title,$text,$button,$spinsales);  

    ///////////////////////////////////////////////////////////////////

    $arr = array(
            $arr1,$arr2,$arr3,$arr4
        );

    for($d = 0;$d<count($arr);$d++){
       
        echo '<div class="single-hero-items set-bg" data-setbg="'. $arr[$d][0].'">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 indexrow">
                            <span style="background-color:black;padding-left:5px;padding-right:5px">'. $arr[$d][1].'</span>
                            <h1  >'. $arr[$d][2].'</h1>
                            <p style="color:#4f3814;
                            text-shadow: 0px 0px 5px rgba(255, 255, 255, 1);">'. $arr[$d][3].'</p>
                            '. $arr[$d][4].'
                        </div>
                    </div>
                    '. $arr[$d][5].'
                </div>
            </div>';
    }
    
?>