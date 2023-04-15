<?php

class ProfileInfoctrl extends ProfileInfo{
    
    private $id;
    private $username;
    

    public function __construct($id,$username){
        $this->id=$id;
        $this->username=$username;

    }

    public function defaultProfileInfo(){
        $profileAbout="About yourself";
        $profileTitle="Hi! I am ".this->username;
        $profileText="Welcome to my page ";
        $this->setProfileInfo($profileAbout,$profileTitle,$profileText,$this->id);
    }
    public function updateProfileInfo($about,$introtitle,$introtext){


        if($this->empltyInputCheck($about,$introtitle,$introtext)==true){
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        // Update Profile Info
        $this->setNewProfileInfo($about,$introtitle,$introtext,$profileBal,$this->id);
    }

    private function empltyInputCheck($about,$introtitle,$introtext){
        $result;
        if(empty($about)||empty($introtitle)||empty($introtext)){
            $result=True;
        }
        else{
            $result=false;
        }
        return $result;

    }

}