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
        $lower_long = ip2long($lowerip);
        $upper_long = ip2long($upperip);

        if ($lower_long <= $ip && $ip >= $upper_long) {
            return true;
        }
        return false;
      }

}
?>