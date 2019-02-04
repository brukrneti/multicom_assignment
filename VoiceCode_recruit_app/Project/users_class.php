<?php
class User {
    private $userID;
    private $username;
    private $userType;
    private $email;
    private $loginTime;

    public function User() {
    }

    public function ReturnID(){
        return $this->userID;
    }

    public function ReturnUsername(){
        return $this->username;
    }

    public function ReturnUserType(){
        return $this->userType;
    }

    public function ReturnEmail(){
        return $this->email;
    }

    public function ReturnLoginTime(){
        return $this->loginTime;
    }

    public function SetData($idArg, $usernameArg, $userTypeArg, $emailArg, $loginTimeArg) {
        $this->userID = $idArg;
        $this->username = $usernameArg;
        $this->userType = $userTypeArg;
        $this->email = $emailArg;
        $this->loginTime = $loginTimeArg;
    }
}

?>

