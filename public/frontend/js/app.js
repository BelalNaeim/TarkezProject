
let menuBar = document.querySelector(".menu-icon");
let menu = document.querySelector(".menu");
let line = document.querySelector(".line-2");
let contactMsg = document.querySelector(".contact-msg");
let contactMsgIcon = document.querySelector(".contac-msg-icon");
var body = document.getElementsByTagName('body')[0]
 function openNav(){
    menu.classList.toggle("toggle-nav");
    menuBar.classList.toggle("rotate");
    
 }
 function popup(){
  
    contactMsg.style.display="block";
    contactMsg.style.overflowY="scroll";
    body.style.overflowY="hidden";
 }
 function closePopUp(){
    contactMsg.style.display="none";
   body.style.overflowY="scroll";
 }

