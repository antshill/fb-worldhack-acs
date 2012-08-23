<?php
class Sponsorship {
  public $dp;

  static $FIELDS = array('user_id', 'item_id', 'amount_remaining', 'expiration');

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
    return $this->dp->getSponsorship($id);
  }

  function sponsorshipByUserId($user_id=NULL) {
        return $this->dp->getSponsorshipByUserId($user_id);

  }
  function post($request_data=NULL) {
    return $this->dp->insertSponsorship($this->_validate($request_data));
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
    $sponsorship=array();
    foreach (Sponsorship::$FIELDS as $field) {
//you may also vaildate the data here
      if(!isset($data[$field]))throw new RestException(417,"$field field missing");
      $sponsorship[$field]=$data[$field];
    }
    return $sponsorship;
  }
}