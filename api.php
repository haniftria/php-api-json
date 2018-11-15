<?php
require_once 'connect.php';
if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {
        case 'api':
        $true = 'true';
        $succes ='Show data user succes';
        $codesc = '200';
      	$sql = "SELECT * FROM tabel";
      	$r = mysqli_query($conn,$sql);
      	$result = array();
      	while($row = mysqli_fetch_array($r)){
      		array_push($result,array(
      			"id"=>$row['id'],
      			"username"=>$row['username'],
      			"password"=>$row['password'],
      			"level"=>$row['level'],
      			"fullname"=>$row['fullname']
      		));
      	}
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }
    }
    else
    {
      $id = $_GET['id'];
      $true = 'true';
      $succes ='Show data user succes';
      $codesc = '200';
      $coderr = '204';
      $error = 'Data User not Found';
      $sql = "SELECT * FROM tabel WHERE id=$id;";
      $r = mysqli_query($conn,$sql);
      $result = array();
      $row = mysqli_fetch_array($r);
      array_push($result,array(
          "id"=>$row['id'],
          "username"=>$row['username'],
          "password"=>$row['password'],
          "level"=>$row['level'],
          "fullname"=>$row['fullname']
        ));
      if ($id<10) {
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }else{
        echo json_encode(array(
          'succes' => $true,
          'data'=>array(),
          'message'=>$error,
          'code'=>$coderr
        ));
      }
    }
 ?>