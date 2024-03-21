<?php
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
#                                                SQL                                               #
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
/**
 * Class SQL
 * 
 * A class to handle SQL connections and queries
 * 
 * @package PHPUtils
 */
class SQL extends Base {
    function __construct() {
        # TODO: Create a __construct class with the following
        # (just make sure you don't break anything somewhere else):
            // $this->sqlcon = new mysqli($host, $user, $pass, $db);
            // if ($this->sqlcon->connect_error) {
            //     throw new Exception("Connection failed: " . $this->sqlcon->connect_error);
            // }
    }
    
    /**
     * connectHost
     * 
     * Connect to a host (without a database specified)
     *
     * @param  string $host The host to connect to
     * @param  string $user The username to use
     * @param  string $pass The password to use
     * @return mysqli The mysqli object
     */
    function connectHost(string $host, string $user, string $pass) {
        return new mysqli($host, $user, $pass);
    }
    
    /* ────────────────────────────────────────────────────────────────────────── */
    /*                                 Connect DB                                 */
    /* ────────────────────────────────────────────────────────────────────────── */    
    /**
     * connectDB
     * 
     * Connect to a database
     *
     * @param  string $host The host to connect to
     * @param  string $user The username to use
     * @param  string $pass The password to use
     * @param  string $db The database to connect to, defaults to null
     * @return mysqli The mysqli object
     */
    function connectDB(string $host, string $user, string $pass, string $db = null) {
        return new mysqli($host, $user, $pass, $db);
    }
    
    /* ────────────────────────────────────────────────────────────────────────── */
    /*                 MAIN SQL QUERY WRAPPER [IMPORTANT FUNCTION]                */
    /* ────────────────────────────────────────────────────────────────────────── */    
    /**
     * executeQuery
     * 
     * Execute a query
     *
     * @param  string $statement The SQL statement to execute
     * @param  array $params The parameters to bind to the statement
     * @param  string $return The type of return to expect (id, array, object)
     * @return void
     */
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
    
        if (!empty($sqlcon->error)) {
            die("<div class='alert alert-danger'>executeQuery() - Fatal error: $sqlcon->error</div>");
        }
    
        return $result;
    }
    /* ────────────────────────────────────────────────────────────────────────── */
        
    /**
     * save_result
     * 
     * Save the result of a query to an array
     *
     * @param  mysqli_result $query The query to save
     * @return array The result of the query
     */
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

    /* ───────────────────────────────────────────────────────────────────── */
    /*                                 Error                                 */
    /* ───────────────────────────────────────────────────────────────────── */    
    /**
     * error
     * 
     * Get the last error from the SQL connection
     *
     * @return string The last error from the SQL connection
     */
    function error() {
        global $sqlcon;
        return $sqlcon->error;
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

        /**
         * search
         * 
         * Search a table for a string
         * 
         * @param  string $tablename The table to search
         * @param  string $search The string to search for
         * @param  array $columns The columns to search in
         * @param  array $options The options for the search
         *                       - delimiter: The string to split the search string by
         *                       - limit: The maximum number of results to return (default 0 = no limit)
         *                       - casesensitive: Whether the search should be case sensitive (default False)
         * 
         * @return mysqli_result The result of the search
         */
        function search(string $tablename, string $search, array $columns = ["name"], array $options = []) {
            global $sql;

            # Default options
            $delimiter     = (empty($options["delimiter"]) ? " " : $options["delimiter"]);
            $limit         = (empty($options['limit']) ? 0 : intval($options['limit']));
            $casesensitive = (empty($options['casesensitive']) ? False : $options['casesensitive']);

            $keywords = explode($delimiter, $search);
            $searchQuery = "SELECT *, (";
            $conditions = [];
            $searchParams = [];
            foreach ($keywords as $keyword) {
                foreach ($columns as $column) {
                    if ($casesensitive) {
                        $conditions[] = "(CASE WHEN `$column` LIKE ? THEN 1 ELSE 0 END)";
                        $searchParams[] = "%".$keyword."%";
                    } else {
                        $conditions[] = "(CASE WHEN LOWER(`$column`) LIKE ? THEN 1 ELSE 0 END)";
                        $searchParams[] = "%".strtolower($keyword)."%";
                    }
                }
            }
            $searchQuery .= implode(" + ", $conditions) . ") AS relevance";
            $searchQuery .= " FROM $tablename WHERE " . implode(" OR ", $conditions);
            $searchQuery .= " ORDER BY relevance DESC";
            if ($limit > 0) {
                $searchQuery .= " LIMIT " . $limit;
            }
            $searchResult = $sql->executeQuery($searchQuery, array_merge($searchParams, $searchParams));
            return $searchResult;
        }
        




    } # END CLASS
        ?>