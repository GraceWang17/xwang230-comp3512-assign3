<?php

include_once 'AbsDataGateway.class.php';
class BaseDataGateway extends AbsDataGateway{
     private $colNames, $values, $tableName, $primaryKey, $joins, $bindingValues, $whereClause, $orderBy, $limit;
    function __construct(){
        parent::__construct();
    }
    
    protected function getSelectStatement(){
        $sql = 'select '. $this->colName . ' from ' . $this->tableName . $this->joins . $this->whereCaluse . $this->orderBy . $this->limit;
        // var_dump($sql);
        return $sql;
    }
    
    protected function getBindingValues(){
        if($this->bindingValue === 'null') throw new Exception('wrong binding value.');
        return $this->bindindValue;
    }
    
    public function getWhereClause($bindingValue = array()){
        if(!is_arrary($bindingValue)) throw new Exception('wrong binding value.');
        $this->bindingValue = $bindingValue;
        $this->getBindingValue();
    }
    
        /**
     * no matter what condition operator being used in where clause, it generates
     * proper statement
     *
     * @example : array( '=' => array('name' => 'Daniel', 'age' => 26, 'height' => 180, 'weight' => 65),
     *          '>' => array('name' => 'Daniel', 'age' => 26, 'height' => 180, 'weight' => 65),
     *          '<' => array('name' => 'Daniel', 'age' => 26, 'height' => 180, 'weight' => 65),
     *          'in' => array('name' => array('daniel', 'wang', 'zilong')),
     *          'like' => array('name' => 'Daniel%')
     *          );
     */
    private function setbindingValue(){
          $temp = array();
        $str = 'where ';
        foreach($this->bindingValues as $type => $ary)
        {
            foreach($ary as $k => $v)
            {
                if($type == 'in')
                {
                    $str .= $k . ' in (';
                    foreach($v as $token)
                    {
                        $str .= '?, ';
                    }
                    $str = substr($str, 0, -2);
                    $str .= ') and ';
                }
                else
                    $str .= $k . ' ' . $type . ' :' . $k . ' and ';
                $temp[':' . $k] = $v;
            }
        }
        $this->bindingValues = $temp;
        $this->whereClause = substr($str, 0, -5);
    }
    
    public function setColname($colName){
        $this->colName = $colName;
    }
    
    
    public function setTableName($tableName){
        $this->tableName = $tableName;
    }
    
    public function setJoin($joins){
        $this->joins =$joins;
    }
    
    public function setOrderBy($orderBy, $name = ''){
        $this->orderBy = 'order by' . $orderBy . ' ' . $name;
    }
    
    public function setLimit($num){
        $this->limit = ' limit ' .$num;
    }
    
    public function setColValue($value){
        $this->value = $value;
    }
    
}

?>