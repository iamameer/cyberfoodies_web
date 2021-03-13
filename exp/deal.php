<?php 

    $title = 'Ramadhan 2021';
    $message = '<p style="color:white!important;text-shadow: 0px 0px 10px rgba(150, 150, 150, 1);">
                Nantikan kemunculan bazaar bulan Ramadhan!
                <br /><i> Get ready for bazaar, this upcoming Ramadhan! </i></p>';
    $price = '';//'$35.00 <span>/ HanBag</span>';
    $button = '';//<a href="#" class="primary-btn">Shop Now</a>

    echo ' <section class="deal-of-week set-bg spad" data-setbg="img/ramadhan.jpg" 
    style="box-shadow: 10px 10px 29px 0px rgba(0,0,0,0.42);
    -webkit-box-shadow: 10px 10px 29px 0px rgba(0,0,0,0.42);
    -moz-box-shadow: 10px 10px 29px 0px rgba(0,0,0,0.42);">
                <div class="container" >
                    <div class="col-lg-6 text-center"  style=" background: linear-gradient(rgba(0, 0, 0, .8),rgba(0,0,0,0));">
                        <div class="section-title">
                            <h2 style="color:silver; ">'.$title.'</h2>
                            '.$message.'
                            <div class="product-price">
                                '.$price.'
                            </div>
                        </div>
                        <div class="countdown-timer" id="countdown">
                            <div class="cd-item">
                                <span>56</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>12</span>
                                <p>Hrs</p>
                            </div>
                            <div class="cd-item">
                                <span>40</span>
                                <p>Mins</p>
                            </div>
                            <div class="cd-item">
                                <span>52</span>
                                <p>Secs</p>
                            </div>
                        </div>
                        '.$button.'
                    </div>
                </div>
            </section>'

?>