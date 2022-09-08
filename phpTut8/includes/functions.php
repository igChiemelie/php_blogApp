<?php
    // date_default_timezone_set('America/Los_Angeles');
    // function timer($datetime, $full = false) {
    //     $now = new DateTime;
    //     $ago = new DateTime($datetime);
    //     $diff = $now->diff($ago);
    
    //     $diff->w = floor($diff->d / 7);
    //     $diff->d -= $diff->w * 7;
    
    //     $string = array(
    //         'y' => 'year',
    //         'm' => 'month',
    //         'w' => 'week',
    //         'd' => 'day',
    //         'h' => 'hour',
    //         'i' => 'minute',
    //         's' => 'second',
    //     );
    //     foreach ($string as $k => &$v) {
    //         if ($diff->$k) {
    //             $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    //         } else {
    //             unset($string[$k]);
    //         }
    //     }
    
    //     if (!$full) $string = array_slice($string, 0, 1);
    //     return $string ? implode(', ', $string) . ' ago' : 'just now';
    // }

    // date_default_timezone_set("Africa/Lagos");
    // date_default_timezone_set("Africa/Lagos");
    date_default_timezone_set('America/Los_Angeles');

    function timer($pTime){
        $now = date("Y-m-d H:i:s");
        $now = strtotime($now);
        $pTime = strtotime($pTime);

        $estimate_time = $now - $pTime;

        if($estimate_time < 1){
            return 'Less than 1 seconds ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60      => 'month',
            24 * 60 * 60           => 'day',
            60 * 60                => 'hour',
            60                     => 'minute',
            1                      => 'second',
        );

        foreach($condition as $secs => $str){
            $d = $estimate_time / $secs;

            if($d >= 1){
                $r = round($d);

                return $r.' '.$str.($r > 1 ? 's' : '').' ago';
            }
        }
    }
?>