<?php 

    $flag_green = 'uk-label-success';
    $flag_orange = 'uk-label-warning';
    $flag_red = 'uk-label-danger';
    $flag_blue = 'default';

    $text_green = 'uk-text-success';
    $text_orange = 'uk-text-warning'; 
    $text_red = 'uk-text-danger'; 
    $text_blue = 'uk-text-primary';

    $timeline = array(
            //0.icon  2.date  3.flag_color  4.flag_text  5.text_color,  6.$text
        array("info","21st March 2021",$flag_blue,"FEATURE",$text_blue,"Comment/Review feature added!"),
        array("check","20th March 2021",$flag_green,"LAUNCH",$text_green,"Cybereats soft launching!"),
        array("check","15th March 2021",$flag_green,"REGISTERED",$text_green,"Cyberfoodies registered as Cybereats.fun"),
        array("check","09th March 2021",$flag_orange,"BETA",$text_orange,"Open Beta test start"),
        array("check","19th Feb 2021",$flag_blue,"STARTED","default","Development started...."),
    );

    for($d = 0;$d<count($timeline);$d++){
        if($timeline[$d][0] == 'check'){
            $badgecolor = 'style="background-color:lightgreen!important;"';
        }else{
            $badgecolor = 'style="background-color:orange!important;"';
        }
        echo '  <div class="uk-timeline-item">
                    <div class="uk-timeline-icon">
                        <span class="uk-badge" '.$badgecolor.'><span uk-icon="'.$timeline[$d][0].'"></span></span>
                    </div>
                    <div class="uk-timeline-content">
                        <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <h3 class="uk-card-title"><time datetime="2020-07-08">'.$timeline[$d][1].'</time></h3>
                                    <span class="uk-label '.$timeline[$d][2].' uk-margin-auto-left">'.$timeline[$d][3].'</span>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <p class="'.$timeline[$d][4].'">
                                '.$timeline[$d][5].'
                                </p>
                            </div>
                        </div>
                    </div>
                </div>';
    }

?>