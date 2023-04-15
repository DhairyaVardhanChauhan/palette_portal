<?php

class ProfileInfo extends Dbh{

    protected function getProfileInfo($userId){
        $stmt=$this->connect()->prepare('SELECT * FROM profiles WHERE users_id=?;');

        if($stmt->execute(array($userId))){
            $stmt=null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
        if($stmt->count()==0){
            $stmt=null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }
    
        $profileData=$stmt->fetchAll(PDO::FETCH_ASSOC);


        return $profileData;
    }


    protected function setNewProfileInfo($profileAbout,$profileTitle,$profileText,$profileBal,$userId){
        $stmt=$this->connect()->prepare('UPDATE profiles SET profileAbout=?,profileintrotitle=?,profileintro=?,profilebal=? WHERE users_id=?;');

        if($stmt->execute(array($profileAbout,$profileTitle,$profileText,$profileBal,$userId))){
            $stmt=null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        $stmt=null; 
    }
    protected function setProfileInfo($profileAbout,$profileTitle,$profileText,$profileBal,$userId){
        $stmt=$this->connect()->prepare('INSERT INTO profiles (profiles_about,profiles_introtitle,profiles_introtext,profiles_bal,users_id) VALUES (?,?,?,?,?);');

        if($stmt->execute(array($profileAbout,$profileTitle,$profileText,$profileBal,$userId))){
            $stmt=null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        $stmt=null; 
    }

}