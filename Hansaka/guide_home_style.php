<?php
    header('Content-type: text/css; charset:UTF-8');
?>
body{
   
    background-image: linear-gradient(#179FEB,white);
  
   background-size:1920px;
  
 
 
} 
.div_1{
   height:700px;
}
.ref_img{
    position:absolute;
    top:40%;
    left:20%;
    width:300px;
    height:300px;
    border-radius:150px;
}
h1{
    position:absolute;
    top:-20%;
    left:10%;
    font-family: sans-serif;
    font-size:120px;
    color:balck;
}
.welcome{
    width:99%;
    height:95%;
    position:absolute;
    

    
}
@media screen and (max-width: 768px) {
    .ref_img{
    position:absolute;
    left:20%;
    top:110%;
    }
    h1{
    position:absolute;
    top:-20%;
    left:0%;
    
    font-size:40px;
    
    }
    .welcome{
    
    position:absolute;
    left:-200%;
    
    }
}
@media screen and (max-width: 400px) {
    .ref_img{
        position:absolute;
    
    }
    h1{
    position:absolute;
    top:-20%;
    left:-105;
    font-size:30px;
    
    }
    .welcome{
    width:1px;
    height:1px;
    position:absolute;
    left:-200%;
    }
}


