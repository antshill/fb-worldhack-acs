<?php
class Donation {
  public $dp;

  static $FIELDS = array('sponsor_id', 'user_id', 'amount');

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
    return $this->dp->getDonation($id);
  }

  function userDonations($user_id=NULL) {
      return $this->dp->getDonationByUserId($user_id);
  }

  function userDonationInfo($donation_id=NULL) {
      return $this->dp->getDonationInfo($donation_id);
  }

  function userDonationsBySponsorId($sponsorship_id=NULL) {
      //return "HELLO";
      return $this->dp->getDonationBySponsorshipId($sponsorship_id);
  }

  function post($request_data=NULL) {
    return $this->dp->insertDonation($this->_validate($request_data));
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
    $donation=array();
    foreach (Donation::$FIELDS as $field) {
//you may also vaildate the data here
      if(!isset($data[$field]))throw new RestException(417,"$field field missing");
      $donation[$field]=$data[$field];
    }
    return $donation;
  }
}