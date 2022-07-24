
/*
const modalcarInfo = document.querySelector(".carInfo");
const modalbtnOpen = document.querySelectorAll(".btnOpen");

modalbtnOpen.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal(){
  modalcarInfo.classList.toggle("active")
}
*/


let ficheTech =document.querySelectorAll(".listeCars");
ficheTech.forEach((event)=>{
  event.addEventListener('click',()=>{
    if(event.classList.contains("active")){
      event.classList.remove("active");
    }
    else{
      event.classList.add("active");
    }
  })
})