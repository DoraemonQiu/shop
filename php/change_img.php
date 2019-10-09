<?php
$id = $_POST['old_src'];
$img_name=$_FILES['img']['name'];//获取新上传图片名称
$old_img_name=$_POST['old_img'];//获取旧的图片名称
$img_type=array('jpeg','jpg','png','gif');
$ext=explode('.',$img_name);
$ext=$ext[count($ext)-1];//图片后缀名
function get_file_name(){
    $file_name='A_';
    $chars = "1234567890qwertyuiopasdfghjklzxcvbnm";
    for($i=0;$i<6;$i++){
        $file_name.=$chars[mt_rand(0,strlen($chars)-1)];
    }
    return $file_name;
}
if(in_array($ext,$img_type)){
    do{
        $new_img_name=get_file_name().'.'.$ext;
        $path = "thumbnail/" . $new_img_name;
    }while(file_exists('../'.$path));
    $tmp_file = $_FILES['img']['tmp_name'];//图片在电脑中的具体位置
    include_once 'connect.php';
    $num = $link->exec("UPDATE shop_list SET imgsrc='$path' WHERE id=$id");
    $link=null;
    if($num){
        unlink("../" . $old_img_name);
        move_uploaded_file($tmp_file, "../" . $path);
        $flag=1;
    }else{
        $flag=2;
    }
}else{
    $flag=3;
}
echo json_encode($flag);