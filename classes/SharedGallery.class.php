<?php
class SharedGallery{

    private $db;

    public function __construct(){
        $this->db= Db::getInstance();
    }

    //CHECK USERNAME
    public function checkUsername($username){
        $sql="SELECT * from user where username=:username";
        $this->db->query($sql);

        $this->db->bind(":username",$username);

        return $this->db->single();
           
       
    }


      //CHECK EMAIL
      public function checkEmail($email){
        $sql="SELECT * from user where email=:email";
        $this->db->query($sql);

        $this->db->bind(':email',$email);

        return $this->db->single();
    }

    //GET USERS FROM USER By Id
    public function getUserById($id){
        $sql="SELECT * FROM  user where id=:id";
        $this->db->query($sql);
        $this->db->bind(":id",$id);
        return $this->db->single();
    }

    //INSERT USER
    public function registerUser($data){
        $hashpwd=password_hash($data['password'],PASSWORD_DEFAULT);
        $sql="INSERT INTO user (username,email,password) VALUE(:username,:email,:password)";

        $this->db->query($sql);

        $this->db->bind(":username",$data["username"]);
        $this->db->bind(":email",$data["email"]);
        $this->db->bind(":password",$hashpwd);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //GET LAST USER Id
    public function getLastUserId(){
        $sql="SELECT id FROM  user WHERE id=(SELECT MAX(id) FROM user)";
        $this->db->query($sql);
        return $this->db->single();
        
    }



    //SET Users Roles
    public function setUsersRoles($user_id,$role_id){
        $sql="INSERT INTO users_roles (user_id,role_id) VALUE(:user_id,:role_id)";
        $this->db->query($sql);

        $this->db->bind(":user_id",$user_id);
        $this->db->bind(":role_id",$role_id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }


    // Check password
    public function checkPassword($data){
        
        $sql="SELECT * from user Where username=:data or id=:data";
        $this->db->query($sql);

        $this->db->bind(":data",$data);
       
        return $this->db->single();
    }


    //Upload images
    public function uploadImages($imgUrl,$idU){
        $sql="INSERT INTO gallery (imageUrl,user_id) VALUE(:img,:id)";
        $this->db->query($sql);

        $this->db->bind(":img",$imgUrl);
        $this->db->bind(":id",$idU);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }

    //GET data from user and gallery
    public function getDataAndImg(){
        $sql="SELECT u.id,u.username,u.email,g.imageUrl,g.id as idimg from user as u INNER JOIN gallery as g ON u.id=g.user_id";
        $this->db->query($sql);

        return $this->db->resultSet();
    }


    //DELETE PHOTO
    public function deletePhoto($ImgId){
        $sql="DELETE FROM gallery WHERE id=:id";
        $this->db->query($sql);

        $this->db->bind(":id",$ImgId);
      

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

   

    //NEW PASSWORD
    public function newPassword($id,$pwd){
        $hashpwd=password_hash($pwd,PASSWORD_DEFAULT);
        $sql="UPDATE user SET password=:password WHERE id=:id";

        $this->db->query($sql);

        $this->db->bind(":id",$id);
  
        $this->db->bind(":password",$hashpwd);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //DELETE Photo by user_id
    public function deletePhotoByUserId($Id){
        $sql="DELETE FROM gallery where user_id=:id";
        
        $this->db->query($sql);
       

        $this->db->bind(":id",$Id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }
       //DELETE Users roles
       public function deleteUserRole($Id){
 
        $sql="DELETE FROM users_roles where user_id=:id";
        
        $this->db->query($sql);
        

        $this->db->bind(":id",$Id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    } 

       //DELETE User
       public function deleteUser($Id){
       
        $sql="DELETE FROM user where id=:id";
        $this->db->query($sql);
        

        $this->db->bind(":id",$Id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }


        //DELETE ACCOUNT
    public function deleteAccount($Id){
       $this->deletePhotoByUserId($Id);
       $this->deleteUserRole($Id);
       $this-> deleteUser($Id);
    }

        // get number of Photots from gallery
    public function getCountPhotos(){
        
        $sql="SELECT count(*) as c from gallery";
        $this->db->query($sql);

       
       
        return $this->db->single();
    }


}


?>