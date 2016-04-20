    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\%$tableJoin%Query
     */
    function join%$tableJoin%($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\%$table%, $join, [%$leftcol%, \model\models\%$rightcol%]);
        return \model\querys\%$tableJoin%Query::useModel($this);
    }
    
    