
<?php
require_once('DAL.class.php');


class home extends DAL{
public function gethome(){
    $sql="SELECT * FROM home";
    return $this->getdata($sql);
 }
 public function updateh($home_id,$s1_h4,$s1_h2,$s1_h2b,$s2_h4,$s2_h2,$s2_h2b){
    $sql="UPDATE home SET s1_h4='$s1_h4',s1_h2='$s1_h2',s1_h2b='$s1_h2b',s2_h4='$s2_h4',s2_h2='$s2_h2',s2_h2b='$s2_h2b' WHERE home_id=$home_id";
    return $this->execute($sql);

 }
 public function updatehome2($home_id, $s1_img, $s2_img, $s1_h4, $s1_h2, $s1_h2b, $s2_h4, $s2_h2, $s2_h2b) {
    $s1_img_name = $this->moveSingleFile($s1_img); // Move and get the file name
    $s2_img_name = $this->moveSingleFile($s2_img); // Move and get the file name

    // Construct the SQL query with correct quoting
    $sql = "UPDATE `home` SET 
            `s1_img`='$s1_img_name',
            `s2_img`='$s2_img_name',
            `s1_h4`='$s1_h4',
            `s1_h2`='$s1_h2',
            `s1_h2b`='$s1_h2b',
            `s2_h4`='$s2_h4',
            `s2_h2`='$s2_h2',
            `s2_h2b`='$s2_h2b'
            WHERE `home_id`='$home_id'";

    return $this->execute($sql);
}
public function updatehomes1($home_id, $s1_img, $s1_h4, $s1_h2, $s1_h2b, $s2_h4, $s2_h2, $s2_h2b) {
    $s1_img_name = $this->moveSingleFile($s1_img); // Move and get the file name
    // Construct the SQL query with correct quoting
    $sql = "UPDATE `home` SET 
            `s1_img`='$s1_img_name',
            `s1_h4`='$s1_h4',
            `s1_h2`='$s1_h2',
            `s1_h2b`='$s1_h2b',
            `s2_h4`='$s2_h4',
            `s2_h2`='$s2_h2',
            `s2_h2b`='$s2_h2b'
            WHERE `home_id`='$home_id'";

    return $this->execute($sql);
}
public function updatehomes2($home_id, $s2_img, $s1_h4, $s1_h2, $s1_h2b, $s2_h4, $s2_h2, $s2_h2b) {
    $s2_img_name = $this->moveSingleFile($s2_img); // Move and get the file name


    // Construct the SQL query with correct quoting
    $sql = "UPDATE `home` SET 
            `s2_img`='$s2_img_name',
            `s1_h4`='$s1_h4',
            `s1_h2`='$s1_h2',
            `s1_h2b`='$s1_h2b',
            `s2_h4`='$s2_h4',
            `s2_h2`='$s2_h2',
            `s2_h2b`='$s2_h2b'
            WHERE `home_id`='$home_id'";

    return $this->execute($sql);
}

public function getabout(){
    $sql="SELECT * FROM about";
    return $this->getdata($sql);
 }
 public function updateabout($about_id,$title,$paragraph){
    $sql="UPDATE about SET title='$title',paragraph='$paragraph' WHERE about_id=$about_id";
    return $this->execute($sql);

 }
public function updateabout1($about_id,$title,$paragraph,$about_img) {
    $s1_img_name = $this->moveSingleFile($about_img); // Move and get the file name
    // Construct the SQL query with correct quoting
    $sql = "UPDATE about SET title='$title',paragraph='$paragraph' ,about_img='$s1_img_name'WHERE about_id=$about_id";
    return $this->execute($sql);
}
public function getteam(){
    $sql="SELECT * from team";
    return $this->getdata($sql);
}
public function getteambyid($id){
    $sql="SELECT * from team where team_id=$id";
    return $this->getdata($sql);
}
public function updateteam($team_id,$name,$des){
    $sql="UPDATE team SET 1name='$name',1des='$des' WHERE team_id='$team_id'";
    return $this->execute($sql);

 }
public function updateteam1($team_id,$name,$des,$img) {
    $s1_img_name = $this->moveSingleFile($img); // Move and get the file name
    // Construct the SQL query with correct quoting
    $sql = "UPDATE team SET 1name='$name',1des='$des' ,1photo='$s1_img_name'WHERE team_id=$team_id";
    return $this->execute($sql);
}
}
?>