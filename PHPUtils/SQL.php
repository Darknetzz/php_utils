<?php
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
#                                                SQL                                               #
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
class SQL extends Base {
    function __construct() {

    }

    function connectHost(string $host, string $user, string $pass) {
        return new mysqli($host, $user, $pass);
    }
    
    /* ────────────────────────────────────────────────────────────────────────── */
    /*                                 Connect DB                                 */
    /* ────────────────────────────────────────────────────────────────────────── */
    function connectDB(string $host, string $user, string $pass, string $db = null) {
        return new mysqli($host, $user, $pass, $db);
    }
    
    /* ────────────────────────────────────────────────────────────────────────── */
    /*                 MAIN SQL QUERY WRAPPER [IMPORTANT FUNCTION]                */
    /* ────────────────────────────────────────────────────────────────────────── */
    function executeQuery(string $statement, array $params = [], string $return = Null) {
        global $sqlcon;
    
        # allow for the statement to contain constants directly (probably not such a good idea)
        # https://stackoverflow.com/questions/1563654/quoting-constants-in-php-this-is-a-my-constant
        // $statement = str_replace(array_keys(get_defined_constants(true)['user']), get_defined_constants(true)['user'], $statement);
    
        $query = $sqlcon->prepare($statement);
    
        $paramsCount = count($params);
        if ($paramsCount > 0) {
            $types = str_repeat('s', $paramsCount);
            $query->bind_param($types, ...$params);
        }
    
        $query->execute();
        $result = $query->get_result();

        if ($return == 'id') {
            $result = $sqlcon->insert_id;
        }
    
        if ($sqlcon->error) {
            die("<div class='alert alert-danger'>executeQuery() - Fatal error: $sqlcon->error</div>");
        }
    
        return $result;
    }
    /* ────────────────────────────────────────────────────────────────────────── */
    
    function save_result(mysqli_result $query) {
        $result = [];
        while ($row = $query->fetch_assoc()) {

            # Save to array with key ID if it exists
            if (!empty($row['id'])) {
                $result[$row['id']] = $row;
                continue;
            }

            # If not, just append it to the array
            $result[] = $row;
        }
        return $result;
    }
    
    
    // ------------------------[ setupDB ]------------------------ //
    function setupDB($sqlcon, $templateArray) {
        
        /*
        
        $sqlcon example:
            $sqlcon = new mysqli('127.0.0.1', 'root', '');
            
            $templateArray example:
            
            $sql_template["artister"] = [
                "ALTER TABLE artister ADD `navn` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;",
                "ALTER TABLE artister ADD `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;",
                "ALTER TABLE artister ADD PRIMARY KEY (`id`);",
                "ALTER TABLE artister MODIFY `id` int NOT NULL AUTO_INCREMENT;",
            ];
            
            $sql_template["brukere"] = [
                "ALTER TABLE brukere ADD `navn` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;",
                "ALTER TABLE brukere ADD `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;",
                "ALTER TABLE brukere ADD PRIMARY KEY (`id`);",
                "ALTER TABLE brukere MODIFY `id` int NOT NULL AUTO_INCREMENT;",
            ];
            
            */
        }
        




    } # END CLASS
        ?>