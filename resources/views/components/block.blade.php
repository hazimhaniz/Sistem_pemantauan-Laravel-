<?php

if(!isset($percentage))
    $percentage = 1;

if( isset($disabled) && $disabled ){
    $color = 'default';
    $icon = 'fa-info-circle';
    $percentage = 100;
}
else {
    if( $percentage == 100){
        $color = 'success';
        $icon = 'fa-check';
    }

    else if( $percentage > 40){
        $color = 'warning';
        $icon = 'fa-circle-o-notch';
    }

    else {
        $color = 'danger';
        $icon = 'fa-times';

        if($percentage < 1)
            $percentage = 1;
    }
}

?>

<div class="card card-transparent mb-0">
    <div class="card-block no-padding">
        <div id="card-circular-minimal" class="card card-default">
            <div class="card-block">
                <h5>
                    <i class="mr-2 fa {{ isset($icon) ? $icon : '' }} text-{{ isset($color) ? $color : '' }}"></i>
                    <span class="semi-bold">{{ isset($title) ? $title : 'Title' }}</span> {{ isset($description) ? $description : '' }}
                    {{ isset($slot) ? $slot : '' }}
                </h5>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-{{ isset($color) ? $color : '' }}" style="width:{{ isset($default) && $default ? '100' : $percentage }}%"></div>
            </div>
        </div>
    </div>
</div>