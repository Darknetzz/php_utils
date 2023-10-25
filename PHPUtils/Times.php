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

    public function relativeTime($time, $format = null) {
        $then     = new DateTime('now');
        $now      = new DateTime($time);
        $diff     = $now->diff($then);

        # Translate the format
        $formats = [
            'days' => '%a',
            'hours' => '%h',
            'minutes' => '%i',
        ];

        # Return format is specified
        if (!empty($format) && !empty($formats[$format])) {
            $format = $formats[$format];
            return $diff->format($format);
        }

        // $formattedTimeLeft = $diff->format($format);

        # Automatically format the time left
            
        # Days
        $days = $diff->format($formats['days']);
        if ($days > 0) {
            return $days.' days';
        }

        # Hours
        $hours = $diff->format($formats['hours']);
        if ($hours > 0) {
            return $hours.' hours';
        }

        # Minutes
        $minutes = $diff->format($formats['minutes']);
        if ($minutes > 0) {
            return $minutes.' minutes';
        }

        return 'now';
    }
}

?>