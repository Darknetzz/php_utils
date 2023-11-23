<?php
class Network extends Base {
    
    /**
     * cidrToRange
     *
     * @param  mixed $cidr
     * @return array
     */
    function cidrToRange(string $cidr) {
        $range = array();
        $cidr = explode('/', $cidr);
        $range[0] = long2ip((ip2long($cidr[0])) & ((-1 << (32 - (int)$cidr[1]))));
        $range[1] = long2ip((ip2long($range[0])) + pow(2, (32 - (int)$cidr[1])) - 1);
        return $range;
      }

      
    function ipInRange(string $ip, string $lowerip, string $upperip) {
      $ip         = ip2long($ip);
      $lower_long = ip2long($lowerip);
      $upper_long = ip2long($upperip);

      if ($lower_long <= $ip && $ip >= $upper_long) {
          return true;
      }
      return false;
    }

 
    /* ───────────────────────────────────────────────────────────────────── */
    /*                               getUserIP                               */
    /* ───────────────────────────────────────────────────────────────────── */
    # NOTE: Please do not assume this function is safe for determining user IP.
    function getUserIP(
      string $reverse_proxy = null,
      bool $return_array = false,
      bool $die_if_empty = false) {
      
        $ra     = (!empty($_SERVER['REMOTE_ADDR'])          ? $_SERVER['REMOTE_ADDR']          : null);
        $ff     = (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null);
        $type   = (!empty($ff)                              ? "proxy"                          : "direct");
        $userip = (!empty($ff)                              ? $ff                              : $ra);

      if (empty($userip) && $die_if_empty !== false) {
        die("getUserIP: Unable to get IP from user.");
      }

      if (!empty($reverse_proxy) && $ra == $reverse_proxy) {
        $type   = "proxy";
      }

      if ($return_array !== false) {
        return ["type" => $type, "userip" => $userip];
      }
      return $userip;
    }


    /* ───────────────────────────────────────────────────────────────────── */
    /*                            usesReverseProxy                           */
    /* ───────────────────────────────────────────────────────────────────── */
    # NOTE: Please do not assume this function is safe for determining user proxy.
    function usesReverseProxy(?string $proxy = null) {
      $ra     = (!empty($_SERVER['REMOTE_ADDR'])          ? $_SERVER['REMOTE_ADDR']          : null);
      $ff     = (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null);

      if (!empty($ff)) {
        return true;
      }
      if ($ra == $proxy) {
        return true;
      }
      return false;
    }

}
?>