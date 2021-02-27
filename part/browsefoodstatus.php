<?php
    print_r($status);
    $a ='';
    $b ='';
    $c ='';
    $d ='';
    $e ='';
    $f ='';
    if(strpos($status,'a')){
        $a = 'checked';
    }
    if(strpos($status,'b')){
        $b = 'checked';
    }
    if(strpos($status,'c')){
        $c = 'checked';
    }
    if(strpos($status,'d')){
        $d = 'checked';
    }
    if(strpos($status,'e')){
        $e = 'checked';
    }
    if(strpos($status,'f')){
        $f = 'checked';
    }

    echo ' <div class="bc-item">
                <label for="available">
                Dijual (Available)
                    <input type="checkbox" id="available" '.$a.'>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="limited">
                Terhad (Limited)
                    <input type="checkbox" id="limited" '.$b.'>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="outofstock">
                Out of stock
                    <input type="checkbox" id="outofstock" '.$c.'>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="tobeadded">
                To be added
                    <input type="checkbox" id="tobeadded" '.$d.'>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="preorder">
                Pre-Order
                    <input type="checkbox" id="preorder" '.$e.'>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="other">
                Lain (Other)
                    <input type="checkbox" id="other" '.$f.'>
                    <span class="checkmark"></span>
                </label>
            </div>';

?>