<?php
 include '../db/config.php';
//print_r($_REQUEST);
$method=$_REQUEST["method"];
$id=$_REQUEST["id"];

 if(isset($_POST['save'])){
  $comment = $_REQUEST[ 'comment' ];
  if ($method == 'new') {
    //print_r( $blog );exit;
    //if ( isset( $esto ) ) { echo 'Hola Mundo 1';exit; }
    //    extract($blog);
    //if ( isset( $estootro ) ) { echo 'Hola Mundo 2';exit; }
    //echo "insert into blogs SET title='$title', content='$content';<br/>";
    //echo 'insert into blogs SET title="' . $objMysqli->real_escape_string($title) . '", content="' . $objMysqli->real_escape_string($content) . '"';
    if ( $objMysqli->query( 'insert into comments SET content="' . $objMysqli->real_escape_string($comment[ 'content' ]) . '"' ) ) {
    //echo 'Guardo';
    } else {
      echo 'No Guardo : ' . $objMysqli->error;exit;
    }
  } else if ( $method == 'edit' ) {
    //echo 'update blogs SET title="' . $objMysqli->real_escape_string($title) . '", content="' . $objMysqli->real_escape_string($content) . '" where id=' . $id . '';
    if ( $objMysqli->query( 'update comments SET content="' . $objMysqli->real_escape_string($comment[ 'content' ]) . '" where id=' . $id . '' ) ) {
    //echo 'Guardo';
    } else {
      echo 'No Guardo : ' . $objMysqli->error;exit;
    }
  }
 }
 if ($method=='destroy'){
  //echo 'delete from blogs where id=' . $id . ''; 
  if ($objMysqli->query( 'delete from comments where id=' . $id . '' ) ) {
  }
  else {
     echo 'No se borro : ' . $objMysqli->error;exit;
  } 
  }
    header( 'Location:index.php' );

