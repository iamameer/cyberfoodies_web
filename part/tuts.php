
<style type="text/css"> 
    .timeline-item{
        margin-bottom: 15px;
    }

    .timeline-content { 
        position: relative;
        overflow: auto;
        padding: 10px 30px;
        border-radius: 4px;
        background: #f5f5f5;
        box-shadow: 0 20px 25px -15px rgba(0, 0, 0, .3);
    }

    .timeline-img {
        width: 30px;
        height: 30px;
        background: $primary;
        border-radius: 50%;
        position: absolute;
        left: 50%;
        margin-top: 25px;
        margin-left: -15px;
    }


    .timeline-img-header {

        height: 200px;
        position: relative;
        margin-bottom: 20px;

            h3 {
                color: white;
                position: absolute;
                bottom: 5px;
                left: 20px;
            }
    }

    .date {
        background: #FF4081;
        display: inline-block;
        color: white;
        padding: 10px;
        position: absolute;
        top: 0;
        left: 0;
    }

    .img {
        background: linear-gradient(rgba(0,0,0,0), rgba(255, 188, 94, .3));
        background-size: contain;
        overflow: auto;
    } 

    img{
        display: block;
        margin: 5px auto 5px auto;
    }

    /* .img {
        background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0, .4)), 
            url('https://i.imgur.com/ZCdfJfT.png') center center no-repeat;
        background-size: contain;
    }  */
 
</style> 
    <div class="row">
    <div class="col-lg-12">
    <div class="faq-accordin">
    <div class="accordion" id="accordionExample">

                <!-- tambah kedai -->
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseOne">
                               Bagaimana nak tambah kedai? (How to add store?)
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/ZCdfJfT.png" >
                                        </div>
                                        <div class="date">Step 1:</div>
                                        <p>Klik butang sign in di <a href="index.php">home page</a> <i>(Click the sign in button in the <a href="index.php">home page</a>)</i></p>
                                        <span class="q">
                                        <br>Q1: Eh, tak pernah daftar pun <i>(I never register before)</i>
                                        <br>A1: Account dicipta secara automatik <i>(Your account will be created automatically.)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/MjgribR.png" >
                                        </div>
                                        <div class="date">Step 2:</div>
                                        <p>Pilih account google yang berkenaan <i>(Select the related google account)</i></p>
                                        <span class="q">
                                        <br>Q1: Eh, google account hilang/kene hack <i>(I lost my google account...)</i>
                                        <br>A1: Ha... kene <a href="request.php">contact admin</a> <i>(Well, you need to <a href="request.php">contact admin</a> for that)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/bllvNNi.png" >
                                        </div>
                                        <div class="date">Step 3:</div>
                                        <p>Klik new store untuk setup kedai <i>(Click new store to setup a store)</i></p>
                                        <span class="q">
                                        <br>Q1: Kene bayar tak? <i>(Do I have to pay?)</i>
                                        <br>A1: Tak, percuma je. <i>(It's foc ...)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/q9rKwfZ.png" >
                                        </div>
                                        <div class="date">Step 4:</div>
                                        <p>Isikan maklumat yang berkenaan kemudian tekan ADD STORE <i>(Fill in the information and click ADD STORE)</i></p>
                                        <span class="q">
                                        <br>Q1: Tak boleh tekan lah... <i>(Can't click, send help)</i>
                                        <br>A1: Pastikan tempat kosong yang wajib diisi <i>(Make sure required fields are filled)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/cpVRj9A.png" >
                                        </div>
                                        <div class="date">YEAY</div>
                                        <p>Siapppp! Jum tambah produk jualan! <i>(You're done! Let's add product!)</i></p>
                                        <span class="q">
                                        <br>Q1: Cemana?? <i>(How leh?)</i>
                                        <br>A1: Ha, scroll bawah sikit. <i>(Let's move down a bit)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- tambah produk -->   
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseTwo">
                                Mula menjual produk (Start selling products) :
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/uF42Axj.png" >
                                        </div>
                                        <div class="date">Step 1:</div>
                                        <p>Pastikan anda telah sign-in, klik <a href="profile.php">MY PAGE</a> <i>(Ensure you're logged in, click <a href="profile.php">MY PAGE</a>)</i></p>
                                       
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/Ro1WOWA.png" >
                                        </div>
                                        <div class="date">Step 2:</div>
                                        <p>Pilih store yang berkenaan <i>(Select the related store)</i></p> 
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/mo351lV.png" >
                                        </div>
                                        <div class="date">Step 3:</div>
                                        <p>Pilih ADD PRODUCT <i>(Choose ADD PRODUCT)</i></p>
                                        <span class="q">
                                        <br>Q1: Takde pun ADD PRODUCT! <i>(There's no ADD PRODUCT!)</i>
                                        <br>A1: Check adakah itu kedai anda.... kalau problem, <a href="request.php">contact admin</a> <i>(Is that your store....? Else <a href="request.php">contact admin</a>)</i>
                                        <br><br>Q2: EDIT STORE tu ape? <i>(What is EDIT STORE?)</i>
                                        <br>A2: Oh, tu kalau nak edit store la <i>(Oh, that's to edit your store)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/Ca6yIrV.png" >
                                        </div>
                                        <div class="date">Step 4:</div>
                                        <p>Isikan maklumat yang berkenaan kemudian tekan ADD PRODUCT <i>(Fill in the information and click ADD PRODUCT)</i></p>
                                        <span class="q">
                                        <br>Q1: Tak boleh tekan lah... <i>(Can't click, send help)</i>
                                        <br>A1: Pastikan tempat kosong yang wajib diisi <i>(Make sure required fields are filled)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/ZTns75c.png" >
                                        </div>
                                        <div class="date">YAHOOOO</div>
                                        <p>Siapppp! Tahniah! <i>(You're done! Congratulations!)</i></p>
                                        <span class="q">
                                        <br>Q1: So, buat apa la ni? <i>(So, what now?)</i>
                                        <br>A1: Dipersilakan jikalau nak iklankan produk atau website ini! <i>(Feel free to advertise your product or this site!)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- edit kedai -->   
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseThree">
                                Cemana nak edit kedai? (How to edit store?) :
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/uF42Axj.png" >
                                        </div>
                                        <div class="date">Step 1:</div>
                                        <p>Pastikan anda telah sign-in, klik <a href="profile.php">MY PAGE</a> <i>(Ensure you're logged in, click <a href="profile.php">MY PAGE</a>)</i></p>
                                       
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/Ro1WOWA.png" >
                                        </div>
                                        <div class="date">Step 2:</div>
                                        <p>Pilih store yang berkenaan <i>(Select the related store)</i></p> 
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/5myb42b.png" >
                                        </div>
                                        <div class="date">Step 3:</div>
                                        <p>Pilih EDIT STORE <i>(Choose EDIT STORE)</i></p>
                                        <span class="q">
                                        <br>Q1: Takde pun ADD PRODUCT! <i>(There's no ADD PRODUCT!)</i>
                                        <br>A1: Check adakah itu kedai anda.... kalau problem, <a href="request.php">contact admin</a> <i>(Is that your store....? Else <a href="request.php">contact admin</a>)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/KVfIDT0.png" >
                                        </div>
                                        <div class="date">Step 4:</div>
                                        <p>Isikan maklumat yang berkenaan kemudian tekan UPDATE STORE <i>(Fill in the information and click UPDATE STORE)</i></p>
                                        <span class="q">
                                        <br>Q1: Tak boleh tekan lah... <i>(Can't click, send help)</i>
                                        <br>A1: Pastikan tempat kosong yang wajib diisi <i>(Make sure required fields are filled)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>
 
                            </div>
                        </div>
                    </div>

                <!-- edit produk -->
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseFour">
                                Cemana nak edit produk? (How to edit products?) :
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/uF42Axj.png" >
                                        </div>
                                        <div class="date">Step 1:</div>
                                        <p>Pastikan anda telah sign-in, klik <a href="profile.php">MY PAGE</a> <i>(Ensure you're logged in, click <a href="profile.php">MY PAGE</a>)</i></p>
                                       
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/Ro1WOWA.png" >
                                        </div>
                                        <div class="date">Step 2:</div>
                                        <p>Pilih store yang berkenaan <i>(Select the related store)</i></p> 
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/hDasVQw.png" >
                                        </div>
                                        <div class="date">Step 3:</div>
                                        <p>Seperti arahan yang tertera (petak biru), klik pada imej produk yang ingin diubah (petak merah)<br>
                                        <i>(As intructed (in blue rectangle), click on the particular product image (red rectangle)</i></p>
                                        <span class="q">
                                        <br>Q1: Takde arahan pun? / Tak boleh klik imej pun! 
                                        <i>(There's no instruction / Unable to click the image!)</i>
                                        <br>A1: Check adakah itu kedai anda.... kalau problem, <a href="request.php">contact admin</a> 
                                        <i>(Is that your store....? Else <a href="request.php">contact admin</a>)</i> 
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-content timeline-card js--fadeInRight">
                                        <div class="img">
                                        <!-- <h3>Step 1:</h3> -->
                                        <img src="https://i.imgur.com/82oCMfL.png" >
                                        </div>
                                        <div class="date">Step 4:</div>
                                        <p>Isikan maklumat yang berkenaan kemudian tekan UPDATE PRODUCT 
                                        <i>(Fill in the information and click UPDATE PRODUCT)</i></p>
                                        <span class="q">
                                        <br>Q1: Tak boleh tekan lah... <i>(Can't click, send help)</i>
                                        <br>A1: Pastikan tempat kosong yang wajib diisi <i>(Make sure required fields are filled)</i>
                                        </span>
                                        <!-- <a class="bnt-more" href="javascript:void(0)">More</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- delete account ? -->   
                   
    </div></div></div></div>

    