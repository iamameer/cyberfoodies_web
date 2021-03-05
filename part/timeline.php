<?php 

    $flag_green = 'uk-label-success';
    $flag_orange = 'uk-label-warning';
    $flag_red = 'uk-label-danger';

    $text_green = 'uk-text-success';
    $text_orange = 'uk-text-warning'; 
    $text_red = 'uk-text-danger'; 

    echo '  <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                    <span class="uk-badge"><span uk-icon="check"></span></span>
                </div>
                <div class="uk-timeline-content">
                    <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <h3 class="uk-card-title"><time datetime="2020-07-08">March 15 2021</time></h3>
                                <span class="uk-label '.$flag_green.' uk-margin-auto-left">Launch</span>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p class="'.$text_green.'">
                                Cyberfoodies launched!
                            </p>
                        </div>
                    </div>
                </div>
            </div>';

    echo '  <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                    <span class="uk-badge"><span uk-icon="check"></span></span>
                </div>
                <div class="uk-timeline-content">
                    <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <h3 class="uk-card-title"><time datetime="2021-02-19">Feb 19 2021</time></h3>
                                <span class="uk-label '.$flag_orange.' uk-margin-auto-left">Start</span>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p class="default">
                                Cyberfoodies development started...
                            </p>
                        </div>
                    </div>
                </div>
            </div>';

?>