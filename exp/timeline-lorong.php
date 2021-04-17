<!-- Latest Blog Section Begin -->
<section class="latest-blog spad" style="padding-top:5px!important">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Senarai penjual (vendors list)</h2>
                </div>
            </div>
        </div> -->
        <div class="row">
        <?php 
            $arr = array();

            #1
            $contact = '0115-883 9349';
            $insta = 'thebearybearkids';
            $vendor = '1. Vendor 1';
            $desc = 'pakaian dan aksesori';
            $img = 'https://i.imgur.com/OTnFvOD.png';

            $arr1 = array($contact, $insta, $vendor, $desc,$img);

            #2
            $contact = '0111-285 9973';
            $insta = 'n.fzlna98';
            $vendor = '2. Vendor 2';
            $desc = 'makanan bungkus, servis ';
            $img = '';

            $arr2 = array($contact, $insta, $vendor, $desc,$img);

            #3
            $contact = '0113-551 6166';
            $insta = 'ain_ramlee93';
            $vendor = '3. Vendor 3';
            $desc = 'others';
            $img = ' ';

            $arr3 = array($contact, $insta, $vendor, $desc,$img);

            #4
            $contact = '(0)';
            $insta = '5';
            $vendor = '4. Takoyaki & Sushi';
            $desc = '';
            $img = 'xx';

            $arr4 = array($contact, $insta, $vendor, $desc,$img);
        
            #5
            $contact = '(0)';
            $insta = '5';
            $vendor = '5. Ayam Geprek';
            $desc = 'Ayam Gesek, Lele Gesek, Semur Gesek';
            $img = 'xx';

            $arr5 = array($contact, $insta, $vendor, $desc,$img);

            #6
            $contact = ' ';
            $insta = ' ';
            $vendor = '6. Padi House';
            $desc = '-';
            $img = 'xx';

            $arr6 = array($contact, $insta, $vendor, $desc,$img);

            #7
            $contact = '(0)';
            $insta = '5';
            $vendor = '7. Tokio Café';
            $desc = '-';
            $img = '';
 
             $arr7 = array($contact, $insta, $vendor, $desc,$img);

            #8
            $contact = ' ';
            $insta = ' ';
            $vendor = '8. Satay & Char Keuy Teow';
            $desc = 'Satay, Char Keuy Teow';
            $img = 'xx';

            $arr8 = array($contact, $insta, $vendor, $desc,$img);

            #9
            $contact = '016-521 2990';
            $insta = ' ';
            $vendor = '9. Restirab Sebulek';
            $desc = 'pakaian dan aksesori, others';
            $img = 'https://i.imgur.com/cwlM0as.png';

            $arr9 = array($contact, $insta, $vendor, $desc,$img);


            #10
            $contact = '0112-849 6716';
            $insta = 'thesaqnis_';
            $vendor = '10. Uncle K';
            $desc = 'makanan (live cooking), makanan bungkus';
            $img = 'https://i.imgur.com/gJv55uV.png';

            $arr10 = array($contact, $insta, $vendor, $desc,$img);

            
            #11
            $contact = '(0)';
            $insta = '5';
            $vendor = '11. Nasi Dagang';
            $desc = 'Nasi Goreng, Telur Goreng, Air Mata Kucing';
            $img = 'xx';

            $arr11 = array($contact, $insta, $vendor, $desc,$img);

            
            #12
            $contact = '(0)';
            $insta = '5';
            $vendor = '12/13. Mior Kitchen (western)';
            $desc = 'Nasi Goreng Ayam Penyet, Spaghetti Ayam Penyet, Chicken & Mash, Meatball & Mash';
            $img = 'xx';

            $arr12 = array($contact, $insta, $vendor, $desc,$img);


            #13
            $contact = '019-828 0847';
            $insta = 'muscle_thrift_';
            $vendor = '12/13. Mior Kitchen (western)';
            $desc = 'pakaian dan aksesori, bundle ';
            $img = 'https://i.imgur.com/6JJj1du.png';

            $arr13 = array($contact, $insta, $vendor, $desc,$img);

            #14
            $contact = '(0)';
            $insta = '5';
            $vendor = '14. Old Town';
            $desc = ' ';
            $img = 'xx';

            $arr14 = array($contact, $insta, $vendor, $desc,$img);

            #15
            $contact = ' ';
            $insta = '5';
            $vendor = '15. Café Kuih';
            $desc = ' ';
            $img = 'xx';

            $arr15 = array($contact, $insta, $vendor, $desc,$img);

            #16
            $contact = '(0)';
            $insta = '5';
            $vendor = '16. Nasi Lauk Campur (Taufik)';
            $desc = '-';
            $img = 'xx';

            $arr16 = array($contact, $insta, $vendor, $desc,$img);

            #17
            $contact = '(0)';
            $insta = '5';
            $vendor = '17. Nasi Ayam Kunyit';
            $desc = ' ';
            $img = 'xx';

            $arr17 = array($contact, $insta, $vendor, $desc,$img);

            #18
            $contact = '012-466 5981';
            $insta = 'cikpramugarikitchen';
            $vendor = '17. Nasi Ayam Kunyit';
            $desc = 'makanan bungkus';
            $img = 'https://i.imgur.com/psXTboU.png';

            $arr18 = array($contact, $insta, $vendor, $desc,$img);

            #19
            $contact = '(0)';
            $insta = '5';
            $vendor = ' ';
            $desc = ' ';
            $img = 'xx';

            $arr19 = array($contact, $insta, $vendor, $desc,$img);
        
            #20
            $contact = '018-966 6896';
            $insta = '5';
            $vendor = ' ';
            $desc = 'makanan (live cooking), makanan bungkus';
            $img = 'xx';

            $arr20 = array($contact, $insta, $vendor, $desc,$img);

            #21
            $contact = ' ';
            $insta = '5';
            $vendor = ' ';
            $desc = ' ';
            $img = 'xx';

            $arr21 = array($contact, $insta, $vendor, $desc,$img);

            #22
            $contact = '019-283 0065';
            $insta = '5';
            $vendor = ' ';
            $desc = 'makanan dan minuman ringan';
            $img = 'xx';

            $arr22 = array($contact, $insta, $vendor, $desc,$img);

            #23
            $contact = ' ';
            $insta = '5';
            $vendor = ' ';
            $desc = ' ';
            $img = 'xx';

            $arr23 = array($contact, $insta, $vendor, $desc,$img);

            
            #24
            $contact = '013-529 0013';
            $insta = 'streetscarfls';
            $vendor = ' ';
            $desc = 'others';
            $img = 'https://i.imgur.com/XrJtja3.png';

            $arr24 = array($contact, $insta, $vendor, $desc,$img);

            
            #25
            $contact = ' ';
            $insta = '5';
            $vendor = ' ';
            $desc = ' ';
            $img = 'xx';

            $arr25 = array($contact, $insta, $vendor, $desc,$img);

            
            #26
            $contact = '012-227 1575';
            $insta = 'pangeran_bundle';
            $vendor = ' ';
            $desc = 'bundle';
            $img = 'https://i.imgur.com/3Euw2Fh.png';

            $arr26 = array($contact, $insta, $vendor, $desc,$img);

            
            #27
            $contact = ' ';
            $insta = '5';
            $vendor = ' ';
            $desc = ' ';
            $img = 'xx';

            $arr27 = array($contact, $insta, $vendor, $desc,$img);
            
            ////////////////
            $arr = array(
                        $arr1,$arr2,$arr3,$arr4,$arr5,$arr6,$arr7,$arr8, 
                        $arr9,$arr10,$arr11,$arr12,$arr13,$arr14,$arr15,
                        $arr16,$arr17,$arr18,$arr19,$arr20,$arr21,$arr22, 
                        $arr23,$arr24,$arr25,$arr26,$arr27 
                    );  

            for($d = 0;$d<count($arr);$d++){

                $phone = str_replace(' ','',$arr[$d][0]);
                $phone =  str_replace('-','',$phone);

                $whatsapp = (strlen($phone)>3) ?
                            '<a href="https://wa.me/6'.$phone.'"style="color:white" >
                                '.$arr[$d][0].'
                            </a>' : '(no contact)';

                $instagram = (strlen($arr[$d][1])>3) ? 
                            '<a href="https://instagram.com/'.$arr[$d][1].'"  >
                                '.$arr[$d][1].'
                            </a>' : '(no instagram)';

                $image =  (strlen($arr[$d][4])>5) ? 
                             $arr[$d][4] : 
                            'https://pbs.twimg.com/profile_images/1314079486325911552/CUc-uUhs_400x400.jpg';
                          

                $name = ($d+1) .'. Vendor '.($d+1);//$arr[$d][2];
                
                echo ' 
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-blog">
                                <img src="'.$image .'" alt="">
                                <div class="latest-text">
                                    <div class="tag-list">
                                        <div class="tag-item" style="background-color:#25D366;padding:5px;color:white">
                                            <i class="fa fa-whatsapp" style="color:white" ></i>
                                            '.$whatsapp.'
                                        </div>
                                        <div class="tag-item">
                                            <i class="fa fa-instagram"></i>
                                            '.$instagram.'
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h4>'.$name.'</h4>
                                    </a>
                                    <p>'.$arr[$d][3].'</p>
                                </div>
                            </div>
                    </div>';
            }
            
        ?>
       


        </div>

        <!-- <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over 99$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p>If good have prolems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Secure Payment</h6>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</section>
<!-- Latest Blog Section End -->