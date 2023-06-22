
<?php 
  

    $savedstudentname ;
    $savedstudentpwd ;
    $imageloc;
    $savedEmail;

?>


<section> 

    

    <div>
         <input type="text" name="studentname" id="studentname"  value="<?php if(isset($savedstudentname)){ echo $savedstudentname ;}  ;  ?>"  />  
    </div> 

    <div>
              
    <input type="text" name="studentpwd" id="studentpwd" 
         value="<?php if(isset($savedstudentpwd )){ echo $savedstudentpwd ;} ;   ?>"
         />  

         <input type="text" name="studentemail" id="studentemail" 
         value="<?php if(isset($savedEmail )){ echo $savedEmail ;} ;   ?>"
         />  
    </div> 

    <input type="button" value="Update" id="updatebtn" />

    <div style="width:250px ; height:200px ; background-color:blue ; background-image: url(<?php echo $imageloc ?>) ; background-size:cover ; " > 

    <!-- <img src="<?php echo $imageloc ?>" alt="not available" /> -->
</div>



    <!-- taking data in a json format -->

<script> 

//let response = fetch("../controller/updatepassword.php"); 

let actionbtn = document.getElementById("updatebtn") ;
let userpwd ;
let useremail = document.getElementById("studentemail").value;

let emailholder = document.getElementById("studentemail") ;

document.getElementById('studentpwd').addEventListener('input', function(event) {
    userpwd= event.target.value;
  
});

actionbtn.addEventListener("click",function(){

    fetch(`../controller/updatepassword.php?userpassword=${userpwd}&useremail=${useremail}`)
    .then(response => response.json())
    .then(response => { console.log(response) , console.log(response.nwpwd) 
}).catch(error => {
            // console.error('Error:', error);
            // console.log(error);
        });
})
</script>
    <!-- taking data in a json format -->





<!-- 
<script> 

//let response = fetch("../controller/updatepassword.php"); 

let actionbtn = document.getElementById("updatebtn") ;
let userpwd ;
let useremail = document.getElementById("studentemail").value;

let emailholder = document.getElementById("studentemail") ;

document.getElementById('studentpwd').addEventListener('input', function(event) {
    userpwd= event.target.value;
  
});


actionbtn.addEventListener("click",function(){


        // fetch(`../controller/updatepassword.php?userpassword=${userpwd}&useremail=${useremail}`)
        
        fetch("../controller/updatepassword.php?userpassword="+userpwd+"&useremail="+ useremail)
        .then(response => response.text())
        .then(text => {
            console.log(text);

            emailholder.value = text ;

            // alert(text);
        })
        .catch(error => {
            console.error('Error:', error);
        });


})


//   fetch('../controller/updatepassword.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded'
//             },
//             body: 'userpassword=' + encodeURIComponent(userpwd)
//         })
//         .then(response => response.text())
//         .then(text => {
//             // Handle the text response
//             console.log(text);
//             // alert(text);
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });


</script> -->


</section>


