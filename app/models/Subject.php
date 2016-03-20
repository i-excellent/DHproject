<?php
class Subject
{
    public static function getCategorySubject(){
        $DBH = dbConnect::getConnection();
        $result=$DBH->query("SELECT DISTINCT type, type_id FROM subject");
        if($result->rowCount() > 0);{
            $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row1;
            }
    }
    public static function getSubject()
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT subject_name,id_subject,type,count_work,type_id FROM subject");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row2;
    }
    }
    public static function getCategoryesWork($category)
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT theme_file,price_work,desc_work,subject_work,name FROM (work_user,user) WHERE type_work=$category AND user_id=id");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row2;
    }
    }
    public function __construct($select = false) {
        // объект бд коннекта
        global $dbObject;
        $this->db = $dbObject;

        // имя таблицы
        $modelName = get_class($this);
        $arrExp = explode('_', $modelName);
        $tableName = strtolower($arrExp[1]);
        $this->table = $tableName;

        // обработка запроса, если нужно
        $sql = $this->_getSelect($select);
        if($sql) $this->_getResult("SELECT * FROM $this->table" . $sql);
    }
}