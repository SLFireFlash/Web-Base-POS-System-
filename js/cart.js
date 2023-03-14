let cartIds = [

];
let cartIdvalue =null;


function cart(){
    const buttons = document.querySelectorAll(".cart-btns");
    console.log("test")
    
    for (let i = 0; i < buttons.length; i++) {
      buttons[i].addEventListener("click", function(event) { 
        cartIdvalue = event.target.value;
        event.target.disabled =true;
        event.target.classList.remove("btn-info")
        event.target.classList.add("btn-warning")
        event.target.innerHTML = "added";
        if(!cartIds.includes(cartIdvalue)){
            cartIds.push(cartIdvalue);
        }
        console.log(cartIds);   
        
      });
    };
    
    document.getElementById("btn-goto-bill").classList.remove("hideEle");

//console.log(cartIds)      
}
function showBill(){
    document.getElementById("btn-goto-bill").classList.add("hideEle");
    document.getElementById("btn-Edit-Bill").classList.remove("hideEle");
    document.getElementById("btn-Edit-Bill-form").classList.remove("hideEle");


   

    
}