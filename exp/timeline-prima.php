<!-- Latest Blog Section Begin -->
<section class="latest-blog spad" style="padding:5px!important">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title" style="margin-bottom:2px">
                    <h2 class="pwabazaar">Senarai penjual (vendors list)</h2>
                </div>
                <ol>
                <a href="#1">1.	Furzani Burger</a><br>
                <a href="#2">2.	Mango Float</a><br>
                <a href="#3">3.	Nasi Lan Kedah</a><br>
                <a href="#4">4.	Takoyaki & Sushi</a><br>
                <a href="#5">5.	Ayam Geprek</a><br>
                <a href="#6">6.	Padi House</a><br>
                <a href="#7">7.	Tokio Café</a><br>
                <a href="#8">8.	Satay & Char Keuy Teow</a><br>
                <a href="#9">9.	Daging Harimau Menangis</a><br>
                <a href="#10">10. Nasi Dagang</a><br>
                <a href="#11">11. TK Cabin</a><br>
                <a href="#12">12/13. Mior Kitchen (western) </a><br>
                <a href="#13">14. Old Town </a><br>
                <a href="#14">15. Café Kuih</a><br>
                <a href="#15">16. Nasi Lauk Campur (Taufik)</a><br>
                <a href="#16">17. Nasi Ayam Kunyit</a><br>
                </ol><br><br>
            </div>
        </div>
        <div class="row">
        <?php 
            $arr = array();

            #1
            $contact = '010-529 1394';
            $insta = '5';
            $vendor = '1. Furzani Burger';
            $desc = 'Menu: Roti John ';
            $img = 'https://i.imgur.com/wnfc0O1.jpg';

            $arr1 = array($contact, $insta, $vendor, $desc,$img);

            #2
            $contact = '(0)';
            $insta = '5';
            $vendor = '2. Mango Float';
            $desc = 'Air';
            $img = 'https://pbs.twimg.com/media/EzFegJwVEAIISLZ?format=jpg&name=large';

            $arr2 = array($contact, $insta, $vendor, $desc,$img);

            #3
            $contact = '(0)';
            $insta = '5';
            $vendor = '3. Nasi Lan Kedah';
            $desc = 'Lauk campur';
            $img = 'https://pbs.twimg.com/media/EzKFTJvUUAApHsP?format=jpg&name=large';

            $arr3 = array($contact, $insta, $vendor, $desc,$img);

            #4
            $contact = '(0)';
            $insta = '5';
            $vendor = '4. Takoyaki & Sushi';
            $desc = 'Takoyaki Mix: crab, octopus, prawn, chicken cheese';
            $img = 'https://i.imgur.com/ZdrG01E.jpg';

            $arr4 = array($contact, $insta, $vendor, $desc,$img);
        
            #5
            $contact = '(0)';
            $insta = '5';
            $vendor = '5. Ayam Geprek';
            $desc = 'Ayam Gesek, Lele Gesek, Semur Gesek';
            $img = 'https://i.imgur.com/tHeRoNB.jpg';

            $arr5 = array($contact, $insta, $vendor, $desc,$img);

            #6
            $contact = '012-696 5372';
            $insta = 'padihouse';
            $vendor = '6. Padi House';
            $desc = '-';
            $img = 'https://i.imgur.com/WslvciM.jpg';

            $arr6 = array($contact, $insta, $vendor, $desc,$img);

            #7
            $contact = '(0)';
            $insta = '5';
            $vendor = '7. Tokio Café';
            $desc = '(combined with Padi House)';
            $img = 'https://i.imgur.com/AhTmphN.jpg';
 
             $arr7 = array($contact, $insta, $vendor, $desc,$img);

            #8
            $contact = '016-995 7489';
            $insta = 'rahimah_satay';
            $vendor = '8. Satay & Char Keuy Teow';
            $desc = 'Satay, Char Keuy Teow';
            $img = 'https://i.imgur.com/mZo8mSd.jpg';

            $arr8 = array($contact, $insta, $vendor, $desc,$img);

            #9
            $contact = '011-1131 1812';
            $insta = 'restoran_sebulek_';
            $vendor = '9. Restirab Sebulek';
            $desc = 'Daging Harimau Menangis';
            $img = 'https://i.imgur.com/3X3d3Wx.jpg';

            $arr9 = array($contact, $insta, $vendor, $desc,$img);


            #10
            $contact = '0193643714';
            $insta = '5';   
            $vendor = '10. Nasi Dagang'; 
            $desc = 'Ayam Masak Merak, Nasi Dagang';
            $img = 'https://i.imgur.com/vmwtVnZ.jpg';

            $arr10 = array($contact, $insta, $vendor, $desc,$img);

            
            #11
            $contact = '0193224768';
            $insta = '5';
            $vendor = '11. TK Cabin';
            $desc = 'Nasi Goreng, Telur Goreng, Air Mata Kucing';
            $img = 'https://i.imgur.com/Z2LaAwS.jpg'; 

            $arr11 = array($contact, $insta, $vendor, $desc,$img);

            
            #12/13
            $contact = '(0)';
            $insta = '5';
            $vendor = '12/13. Mior Kitchen (western)';
            $desc = 'Nasi Goreng Ayam Penyet, Spaghetti Ayam Penyet, Chicken & Mash, Meatball & Mash';
            $img = 'https://i.imgur.com/9D8nyYE.jpg';

            $arr1213 = array($contact, $insta, $vendor, $desc,$img);

            #14
            $contact = '(0)';
            $insta = '5';
            $vendor = '14. Old Town';
            $desc = '-';
            $img = 'https://i.imgur.com/tPOoWqs.jpg';

            $arr14 = array($contact, $insta, $vendor, $desc,$img);

            #15
            $contact = '013-763 0610';
            $insta = 'Kue_cafe';
            $vendor = '15. Café Kuih';
            $desc = 'Kuih Muih, Masak Lemak, Ayam Salai, Itik Salai, Asam Pedas';
            $img = 'https://i.imgur.com/TH75oNP.jpg';

            $arr15 = array($contact, $insta, $vendor, $desc,$img);

            #16
            $contact = '0143348676';
            $insta = '5';
            $vendor = '16. Nasi Lauk Campur (Taufik)';
            $desc = 'Nasi campur';
            $img = 'https://i.imgur.com/Rjp45eP.jpg';

            $arr16 = array($contact, $insta, $vendor, $desc,$img);

            #17
            $contact = '(0)';
            $insta = '5';
            $vendor = '17. Nasi Ayam Kunyit';
            $desc = 'Nasi Ayam Kunyit, Laksa Utara Sarang';
            $img = 'https://i.imgur.com/AmwzGer.jpg';

            $arr17 = array($contact, $insta, $vendor, $desc,$img);

            ////////////////
            $arr = array(
                        $arr1,$arr2,$arr3,$arr4,$arr5,$arr6,$arr7,$arr8, 
                        $arr9,$arr10,$arr11,$arr1213,$arr14,$arr15,$arr16,$arr17 
                    );  

            for($d = 0;$d<count($arr);$d++){

                $phone = str_replace(' ','',$arr[$d][0]);
                $phone =  str_replace('-','',$phone);

                $whatsapp = (strlen($phone)>3) ?
                            '
                                <div class="tag-item" 
                                    style="background-color:#25D366;padding:5px;color:white;border-radius:6px">
                                    <a href="https://wa.me/6'.$phone.'"style="color:white" >
                                        <i class="fa fa-whatsapp" style="color:white" ></i>
                                     Whatsapp
                                    </a>
                                </div> 
                           ' : 
                             '' ;

                $instagram = (strlen($arr[$d][1])>3) ? 
                            '<a href="https://instagram.com/'.$arr[$d][1].'" 
                                style="background-color:#C13584;padding:5px;color:white;border-radius:6px"" >
                                <i class="fa fa-instagram"></i> 
                                '.$arr[$d][1].'
                            </a>' : ' ';

                $image =  (strlen($arr[$d][4])>3) ? 
                             $arr[$d][4]
                            : 'https://i.imgur.com/Fbvbumo.png?1';
                
                echo ' 
                        <div id="'.($d+1).'"  class="col-lg-4 col-md-6">
                            <div class="single-latest-blog"  style="background-color:rgba(255, 156, 94,.2);padding:5px">
                                <img src="'.$image .'" alt="">
                                <div class="latest-text">
                                    <div class="tag-list">
                                            '.$whatsapp.' 
                                        <div class="tag-item"> 
                                            '.$instagram.'
                                        </div>
                                    </div> 
                                        <h4>'.$arr[$d][2].'</h4> 
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