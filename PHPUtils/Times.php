<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                  TimeUtil                                  */
/* ────────────────────────────────────────────────────────────────────────── */

class Times {
    // --------[ getCurrentTime ]-------- //
    public function getCurrentTime(string $format, string $timezone) : string {
        $dt = new DateTime('now');
        $tz = new DateTimeZone($timezone);
        $dt->setTimeZone($tz);
        $return = $dt->format($format);
    
        return $return;
    }
}

?>