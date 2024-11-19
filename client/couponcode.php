<?php
if(isset($_POST))
{
include("../class/categories.class.php");
session_start();
$codes=new categories();
$code=$_POST['code'];
$coupon=$codes->selectcode($code);
$result=$coupon;
if ($result==null)
{
$response = array(
'status' => 'error',
'message' => 'Wrong Coupon Code name.'
);
}else
{

if($result[0]['limits']==0)
{
$response = array(
'status' => 'error',
'message' => 'exceed the limit.'
);
} else
{
if($result[0]['expiry_date']<date("Y-m-d"))
{
$response = array(
'status' => 'error',
'message' => 'No long Discount.'
);
}else
{
if(isset($_SESSION['client_id']))
{$key=0;
$a=explode("/",$coupon[0]['used_by']);
// var_dump($a);exit;
for($i=0; $i<count($a);$i++)
{
if($a[$i]==$_SESSION['client_id'])
{
$key=1;
break;

}
}
if($key==1)
{
$response = array(
'status' => 'error',
'message' => 'You Cannot use the code two times.'
);
}
else
{
$response = array(
'status' => 'success',
'message' => 'Correct Coupon Code.',
'discount'=>$coupon[0]['percentage'],
'limits'=>$coupon[0]['limits'],
'expiry_date'=>$coupon[0]['expiry_date'],
);
$_SESSION['coupon_discount']=$coupon[0]['percentage'];
$_SESSION[ 'limits']=$coupon[0]['limits'];
$_SESSION['coupon_id']=$coupon[0]['code_id'];
}
}
else{
$response = array(
'status' => 'success',

'message' => 'Correct Coupon Code!',
'discount'=>$coupon[0]['percentage'],
'limits'=>$coupon[0]['limits'],
'expiry_date'=>$coupon[0]['expiry_date'],
);
$_SESSION['coupon_discount']=$coupon[0]['percentage'];
$_SESSION[ 'limits']=$coupon[0]['limits'];
$_SESSION['coupon_id']=$coupon[0]['code_id'];
}}
}
}
header('Content-Type: application/json');
echo json_encode($response);
}else
{?>
<script>window.location.href= "cart.php" </script>
<?php }?>