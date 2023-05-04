<?php
    class M_Users{
        private $db;

        public function __construct()
        {
            $this->db=new Database();
        }


        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$email);

            $row=$this->db->single();

            if ($this->db->rowCount()>0) {
                return true;
            }
            else{
                return false;
            }
        }


        //register

        public function register($data){
            $this->db->query('INSERT INTO users(Email,Password,Name,otp,ContactNo) VALUES(:email,:password,:name,:otp,:contactno)');
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':otp',$data['otp']);
            $this->db->bind(':contactno',$data['contactno']);


            if ($this->db->execute()) {
                $this->db->query('SELECT * FROM users WHERE Email= :email');
                $this->db->bind(':email',$data['email']);
                // $this->db->query('SELECT * FROM users');
    
                $row=$this->db->single();

                $this->db->query('INSERT INTO traveler(TravelerID,country) VALUES(:travelerid,:country)');
                $this->db->bind(':country',$data['country']);
                $this->db->bind(':travelerid',$row->UserID);
                
                if ($this->db->execute()) {

                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }

        //edit travler details

        public function editTravelerDetails($data){
            $this->db->query('UPDATE traveler set country=:country WHERE TravelerID=:id');
            $this->db->bind(':country',$data['country']);
            $this->db->bind(':id',$data['id']);

            $s1=$this->db->execute();


            $this->db->query('UPDATE users set Name=:name,ContactNo=:contactno,profileimg=:profile_img WHERE UserID=:id');
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':profile_img',$data['profile-img_name']);
            $this->db->bind(':contactno',$data['contactno']);
            $this->db->bind(':id',$data['id']);

            $s2=$this->db->execute();

            if ($s1 && $s2) {
                $_SESSION['user_name']=$data['name'];
                return true;
            }
        }

        public function editHotelAccountDetails($data){

            $this->db->query('UPDATE users set Name=:name,ContactNo=:contactno,profileimg=:profile_img WHERE UserID=:id');
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':profile_img',$data['profile-img_name']);
            $this->db->bind(':contactno',$data['contactno']);
            $this->db->bind(':id',$data['id']);

            $s2=$this->db->execute();

            if ($s2) {
                $_SESSION['user_name']=$data['name'];
                return true;
            }
        }

        public function editHotelDetails($data){
            $this->db->query('UPDATE hotels set Name=:name,Description=:description,Line1=:line1, Line2=:line2,
            District=:district, Rating=:rating, Category=:category, Pets=:pets, Check_in=:checkin, Check_out=:checkout, 
            contact_number=:contact, reg_number=:regNo WHERE HotelID=:id');

            $this->db->bind(':name',$data['name']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':line1',$data['line1']);
            $this->db->bind(':line2',$data['line2']);
            $this->db->bind(':district',$data['district']);
            $this->db->bind(':rating',$data['rating']);
            $this->db->bind(':category',$data['category']);
            $this->db->bind(':pets',$data['pets']);
            $this->db->bind(':checkin',$data['checkin']);
            $this->db->bind(':checkout',$data['checkout']);
            $this->db->bind(':regNo',$data['regNo']);
            $this->db->bind(':contact',$data['contact']);
            $this->db->bind(':id',$data['id']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        
        public function getUserDetails($userID)
        {
            $this->db->query('SELECT * FROM users WHERE UserID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }

        //get traveler details
        public function getTravelerDetails($userID)
        {
            $this->db->query('SELECT * FROM traveler WHERE TravelerID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }

        public function getAllUserDetails($usertype,$action=NULL)
        {          
            
            
            if ($action=='verify') {
                $this->db->query('SELECT * FROM users WHERE UserType= :usertype AND verification_status=2' );
                $this->db->bind(':usertype',$usertype);
            } else {
                $this->db->query('SELECT * FROM users WHERE UserType= :usertype AND (verification_status=3 OR verification_status=1)');
                $this->db->bind(':usertype',$usertype);
            }
            $users=$this->db->resultSet();
            

            if($usertype=='Traveler'){
                return $users;
            }
            elseif($usertype=='Hotel'){
                foreach($users as $user){
                    $details=$this->getHotelById($user->UserID);
                    $user->moreDetails=$details;
                }
                return $users;
            }
            elseif($usertype=='Guide'){
                foreach($users as $user){
                    $details=$this->getGuideById($user->UserID);
                    $user->moreDetails=$details;
                }
                return $users;
            }
            elseif($usertype=='Taxi'){
                foreach($users as $user){
                    $details=$this->getTaxiById($user->UserID);
                    $user->moreDetails=$details;
                }
                return $users;
            }
            
        }

        public function getAdminDetails($userID)
        {
            $this->db->query('SELECT * FROM admins WHERE AdminID= :userid');
            $this->db->bind(':userid',$userID);
            $row=$this->db->single();

            return $row;
        }

        public function getHotelById($id){
            $this->db->query('SELECT * FROM hotels WHERE HotelID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            $row->address=$row->Line1.", ".$row->Line2.", ".$row->District;

            return $row;
        }

        public function getGuideById($id){
            $this->db->query('SELECT * FROM guides WHERE GuideID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            $this->db->query('SELECT * FROM guide_languages WHERE guide_id=:id');
            $this->db->bind(':id',$row->GuideID);
            $languages=$this->db->resultSet();
            $row->languages=$languages;
            return $row;
        }

        public function getTaxiById($id){
            $this->db->query('SELECT * FROM taxiowner WHERE OwnerID=:id');
            $this->db->bind(':id',$id);

            $row=$this->db->single();
            $details=$this->getUserDetails($id);
            $row->moreDetails=$details;
            return $row;
        }


        //action on account

        //suspend
        public function suspendaccount($id,$action)
        {
            $this->db->query('UPDATE users set acc_status=:act WHERE UserID=:id');
            $this->db->bind(':id',$id);
            $this->db->bind(':act',$action);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
            
        }

        public function verifyaccount($id)
        {
            $this->db->query('UPDATE users set verification_status=3 WHERE UserID=:id');
            $this->db->bind(':id',$id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
            
        }


        //login
        public function login($data){

            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);
            // $this->db->query('SELECT * FROM users');

            $row=$this->db->single();

            $hashed_password=$row->Password;

            if ($row->verification_status==0) {
                return 'NotValidate';
            }
            else if (password_verify($data['password'], $hashed_password)) {
                $this->db->query('UPDATE users set active_status="Active" WHERE Email= :email');
                $this->db->bind(':email',$data['email']);
                if ($this->db->execute()) {
                    return $row;
                } else {
                    return false;
                }
                
            }
            else {
                return false;
            }
        }

        //email verification

        public function emailverify($data){
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();


            $dbotp=$row->otp;

            if($dbotp==$data['code']){
                $this->db->query('UPDATE users SET verification_status=1 WHERE Email= :email');
                $this->db->bind(':email',$data['email']);
                $this->db->execute();
                return true;
            }
            else
            {
                return false;
            }

        }


        //forgot password
        public function passwordverify($data){
            $this->db->query('SELECT * FROM users WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();

            if ($row) {
                $this->db->query('UPDATE users SET pw_reset_otp=:pw_rest_otp WHERE Email=:email');
                $this->db->bind(':email',$data['email']);
                $this->db->bind(':pw_rest_otp',$data['pw_rest_otp']);    
                $this->db->execute();
                return true;
            }
            else {
                return false;
            }

        }

        public function resetpassword($data){
            $this->db->query('SELECT * FROM users WHERE Email=:email AND pw_reset_otp=:pw_reset_otp');
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':pw_reset_otp',$data['reset_code']);


            $row=$this->db->single();

            if ($row) {
                $this->db->query('UPDATE users SET Password=:password WHERE Email=:email');
                $this->db->bind(':password',$data['password']);
                $this->db->bind(':email',$data['email']);
                if ($this->db->execute()) {
                    $this->db->query('UPDATE users SET pw_reset_otp=NULL WHERE Email=:email');
                    $this->db->bind(':email',$data['email']);
                    if ($this->db->execute()) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                else {
                    return false;
                }
            }
            else {
                echo 'HI';
                return false;
            }
        }

        public function logout()
        {
                $this->db->query('UPDATE users set active_status="Offline" WHERE UserID=:id');
                $this->db->bind(':id',$_SESSION['user_id']);
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
        }
    }

?>