    <?php 
    
    $studentArray ;
    $newpassword  ;
    $jsArray ;

    ?>



    <div style="width: 56vw; height:100vh ;  display: grid;
  grid-template-columns: 0.3fr 0.7fr;
  grid-template-areas: 'nav content'; color:black " class="dashboard-container" >

        <ul class="dashboard-nav" style="grid-area: nav; background-color:rgba(128, 128, 128, 0.199) ;   list-style:none" >
            <li>   <h1> ADMIN </h1>  </li>
            <li style="cursor: pointer; " > Users </li>
            <li style="cursor: pointer; " > Blocked Users </li>

        </ul>


        <div class="dashboard-content"  style="grid-area:content; background-color: grey; padding-top:5vh " >
            
           <label> Search by Name:  <input type="text" id="nameSearch" />    <button id="nameSearchBtn" > Search </button> </label>
           <label> Search by Email:  <input type="text" id="emailSearch" />   <button id="emailSearchBtn" > Search </button> </label>
           
            <br/> <br/>
            <table style="width: 50vw; border: 1px solid black  " >

                <h3>  Students Table </h3>
                <thead>  <th> Name </th> <th> Course </th>  <th> Email </th> <th></th>  </thead> 
                <tbody> </tbody>

     

            </table>
       
                
            <button id="load" name="load" > Load More </button>
            
               <button id="loadless" name="loadless" > Load Less </button>
          


            <div>
        </div>
    </div>    

    <script>
var tbody = document.querySelector("tbody");
var data = []; // Array to store the fetched data
var number = 10; // Number of items to load at a time
var startIndex = 0; // Start index for loading data
var increaser = 10;

var loadbtn = document.getElementById("load");
var loadLessbtn = document.getElementById("loadless");
var delbtn = document.querySelector(".deletebtn");

//searchbtns
var emailInput = document.getElementById("emailSearch");
var emailBtn = document.getElementById("emailSearchBtn");
var nameInput = document.getElementById("nameSearch");
var nameBtn = document.getElementById("nameSearchBtn");
// Fetch initial data
fetch("../controller/requestStudentArray.php")
  .then(response => response.json())
  .then(response => {
    data = response; // Store the fetched data
    console.log(data);
    populateTable(startIndex, number); // Populate the table with initial data
    loadbtn.disabled = false; // Enable the "Load More" button

    return data ;
  })
  .catch(error => {
    console.error("Error:", error);
  });


function populateTable(start, count ,content) {
  const tableRows = data.slice(start, count).map((item,index) => {
        var trimmed = (item.Email) ;
        var modifiedEmail = trimmed.replace(/[.@]/g, "");
        var blockName = "Block" ;
        var blockColor = "black" ;
        var defaultBlockColor = "white"
        if(item.blockedStatus==0){
         blockName = "Unblock" 
         blockColor = "green" 
         defaultBlockColor = "red"
        }

    return `<tr class="${modifiedEmail}" style="color:${defaultBlockColor}"  >
      <td class="stname${index}" >${item.StudentName}  </td>
      <td>Course</td>
      <td class="stemail${index}" >${item.Email}</td>
      <td><button style="width:5vw ; color:${blockColor}" class="${modifiedEmail} ${modifiedEmail}ii" id="${item.Email}" > ${blockName} </button> <button class="blockbtn blockbtn${index}" >Delete</button></td>
    </tr>`;
  });

  tbody.innerHTML = tableRows.join('');

    // Enable or disable the "Load Less" button based on the current data count
    if(increaser <= 10){
    loadLessbtn.disabled = true ;
 }else{
    loadLessbtn.disabled = false ;
 }

 if(increaser >= data.length){

    loadbtn.disabled = true

 }else{
    loadbtn.disabled = false
 }

}

// check blocked status
loadbtn.addEventListener("click", function(){
  // Increase the start index and load more data
if(increaser< data.length ){
  increaser += 10;
  populateTable(0, increaser)}
});

loadLessbtn.addEventListener("click", function() {
  // Decrease the start index and load previous data
  if(increaser> 10 ){
  increaser -= 10;
  populateTable(0, increaser);
}});





// firing a click event to check if the block button has been clicked
document.addEventListener("click",function(evt){

var showid = evt.target ;
var comparable = showid.innerHTML ;
if( showid.tagName == "BUTTON" && showid.innerText == "Block" ){

      var idcontainer =  evt.target ;

      // alert(showid.innerHTML)
      // console.log(showid.innerHTML);
      // alert(idcontainer.className);
  //  using the email of user to block him/her in the database
fetch(`../controller/admindashboard.php?useremail=${idcontainer.id}`)
.then(response => response.text())
.then(response => {      
      const updatedStr = response.toString().substr(0,5).replace(/\s/g, '');
      // console.log(updatedStr);
      if(updatedStr == 0 ){

        var classBlock = idcontainer.classList[0] ;
        var classBlock2 = idcontainer.classList[1] ;
        var colorChange =  document.querySelector(`.${classBlock}`);
        colorChange.style.color= "red";
        var blockColorChange = document.querySelector(`.${classBlock2}`)
        blockColorChange.innerHTML = "Unblock"
        blockColorChange.style.color= "green";
          // idcontainer.className.style.color="red" 
      }
})
.catch(error => {
  console.error('Error:', error);

});
}// end of block on click 


if(showid.tagName == "BUTTON" && showid.innerText == "Unblock"){

var idcontainer =  evt.target  ;
//  using the email of user to block him/her in the database
fetch(`../controller/unblockuser.php?useremail=${idcontainer.id}`)
.then(response => response.text())
.then(response => {      
const updatedStr = response.toString().substr(0,5).replace(/\s/g, '');
// console.log(updatedStr);
if(updatedStr == 0 ){
  var classBlock = idcontainer.classList[0] ;
  var classBlock2 = idcontainer.classList[1] ;
  var colorChange =  document.querySelector(`.${classBlock}`);
  colorChange.style.color= "white";
  var blockColorChange = document.querySelector(`.${classBlock2}`)
  blockColorChange.innerHTML = "Block"
  blockColorChange.style.color= "black";
}
})
.catch(error => {
console.error('Error:', error);});
}// end of block on click 

})

nameBtn.onclick = function(){
  var searchTerm = nameInput.value.toLowerCase();
  var filteredItems = data.filter((item)=>{
    return (item.StudentName).toLowerCase().includes(searchTerm);
  });

  alert(filteredItems);
  console.log(filteredItems);
  var filteredTables = filteredItems.map((item,index)=>{


    var trimmed = (item.Email) ;
        var modifiedEmail = trimmed.replace(/[.@]/g, "");
        var blockName = "Block" ;
        var blockColor = "black" ;
        var defaultBlockColor = "white"
        if(item.blockedStatus==0){
         blockName = "Unblock" 
         blockColor = "green" 
         defaultBlockColor = "red"
        }


    return `<tr class="${modifiedEmail}" style="color:${defaultBlockColor}"  >
      <td class="stname${index}" >${item.StudentName}  </td>
      <td>Course</td>
      <td class="stemail${index}" >${item.Email}</td>
      <td><button style="width:5vw ; color:${blockColor}" class="${modifiedEmail} ${modifiedEmail}ii" id="${item.Email}" > ${blockName} </button> <button class="blockbtn blockbtn${index}" >Delete</button></td>
    </tr>`;

  })
  tbody.innerHTML = filteredTables.join('');
}

// nameInput.addEventListener("input",function(e){
    
//   console.log(e.target.value);

// })
 

emailBtn.onclick = function(){

        window.scrollTo(0,400) ;


}


    </script>
    
