<?php
class Album extends Zend_Db_Table
{
    protected $_name = 'albums';
	protected $_primary_key = 'album_id';
	protected $db;
	
	public function __construct()
	{
		$this->db = Zend_Registry::get('db');
	}
	
	public function insert_row($input = array())
	{
		$this->db->insert('albums',$input);
		return '1';
	} 

	public function fetchDetails($id)
	{

                $this->db->setFetchMode(Zend_Db::FETCH_NUM);
		$sql = 'SELECT * FROM albums WHERE album_id = ?';
		$result = $this->db->fetchRow($sql,array($id));
		return $result;
	}
 
        public function fetchBySearch($where){
          $this->db->setFetchMode(Zend_Db::FETCH_NUM);
		$sql = 'SELECT * FROM albums '.$where;
                $result = $this->db->fetchAll($sql);
		return $result;
         }
 
         public function fetchByLatest(){
                $this->db->setFetchMode(Zend_Db::FETCH_NUM);
		$sql = 'SELECT * FROM albums ORDER BY Id DESC LIMIT 3 ';
                $result = $this->db->fetchAll($sql);
		return $result;
         }

}
