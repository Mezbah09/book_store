<?php 
$con=mysqli_connect("localhost","root","","book_store");
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");


/*
if($link){
    echo'yes';

}else{
    echo 'no';
}*/

?>