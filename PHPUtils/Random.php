<?php

# ──────────────────────────────────────────────────────────────────────────────────────────────── #
#                                              RANDOM                                              #
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
class Random extends Base {
    
    /**
     * array_pick_random
     *
     * @param  mixed $array
     * @return void
     */
    public function array_pick_random(array $array) {
        $rand = mt_rand(0,count($array)-1);
        $pick  = $array[$rand];
        return $pick;
    }

    
    /**
     * genStr
     *
     * @param  mixed $len
     * @param  mixed $charset
     * @param  mixed $required
     * @return void
     */
    public function genStr(int $len = 24, mixed $charset = [], $required = []) {
        
        $str['lowercase'] = range('a','z');
        $str['uppercase'] = range('A', 'Z');
        $str['digits']    = range(0,9);
        $str['symbols']   = str_split("!.:,;-");
        $str['all']       = array_merge($str['lowercase'], $str['uppercase'], $str['digits'], $str['symbols']);
        $str['default']   = array_merge($str['lowercase'], $str['uppercase'], $str['digits']);

        if (is_string($charset)) {
            $charset = str_split('', $charset);
        }
        
        if (empty($charset)) {
            foreach ($str as $this_str) {
                $charset = $str['default'];
            }
        }
        
        $count = count($charset);
        $returnValue = "";
        
        for ($i=0; $i <= $len-1; $i++) {
            $roll = mt_rand(0,$count-1);
            $returnValue .= $charset[$roll];
        }

        $requiredTypes = [
            'lowercase',
            'uppercase',
            'digits',
            'symbols',
        ];

        foreach ($requiredTypes as $type) {

            if (empty($str[$type])) {
                die(__METHOD__.": Invalid type: $type");
            }

            if (in_array($type, $required) && strpos($returnValue, implode('', $str[$type])) !== False) {
                $returnValue .= $this->array_pick_random($str[$type]);
            }
        }

        $returnValue = str_shuffle($returnValue); 

        return $returnValue;
    }

        
    /**
     * roll
     *
     * @param  mixed $from
     * @param  mixed $to
     * @return void
     */
    public function roll($from = 1, $to = 100) {
        return mt_rand($from, $to);
    }
    
        
    /**
     * percentage
     *
     * @param  mixed $chance
     * @return void
     */
    public function percentage(int $chance = 50) {
        return (mt_rand(0,100) <= $chance);
    }

}
?>