
const findstate = () =>{
  
    const status = document.getElementsByClassName("status");
    const success = (userPosition) =>{
        //check position
        console.log(userPosition);
    }

    const errr = () =>{
        status.textContent = "Location failed ";
    }

    //the navigator object has a geolocation method that allow us to the coordinate of a user
    navigator.geolocation.getCurrentPosition(success,errr);//when the user clicks on allow button we run the success function else errr

}

document.getElementById("findlocation").addEventListener("click",findstate);
