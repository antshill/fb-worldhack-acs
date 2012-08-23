<?php
class User {
  public $dp;

  static $FIELDS = array('fb_id', 'name', 'locale', 'fb_username');

  function __construct(){
      /**
    * $this->dp = new DB_PDO_Sqlite();
    * $this->dp = new DB_PDO_MySQL();
    * $this->dp = new DB_Serialized_File();
    */
    //$this->dp = new DB_Session();
    $this->dp = new DB_PDO_MySQL();
  }

  function get($id=NULL) {
    return is_null($id) ? $this->dp->getAllUsers() : $this->dp->getUser($id);
  }
  function post($request_data=NULL) {
    return $this->dp->insertUser($this->_validate($request_data));
  }
  /*
  function put($id=NULL, $request_data=NULL) {
    return $this->dp->update($id, $this->_validate($request_data));
  }
  function delete($id=NULL) {
    return $this->dp->delete($id);
  }
  */

  private function _validate($data){
    $user=array();
    foreach (User::$FIELDS as $field) {
//you may also vaildate the data here
      if(!isset($data[$field]))throw new RestException(417,"$field field missing");
      $user[$field]=$data[$field];
    }
    return $user;
  }
}