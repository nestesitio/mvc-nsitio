    /**
     * 
     * @return \model\querys\%$className%Query
     */
    public function select%$method%() {
        $this->setSelect(%$tableColumn%);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\%$className%Query
     */
    public function filterBy%$method%($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(%$tableColumn%, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\%$className%Query
     */
    public function orderBy%$method%($order = Mysql::ASC) {
        $this->orderBy(%$tableColumn%, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\%$className%Query
     */
    public function groupBy%$method%() {
        $this->groupBy(%$tableColumn%);
        return $this;
    }
    
    