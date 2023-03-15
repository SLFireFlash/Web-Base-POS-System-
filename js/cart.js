let cartIds = [];
let cartIdvalue =null;


function cart(productId,productName,brand,quantitiy,sellingPrice){ 
    const buttons = document.querySelectorAll(".cart-btns");
    console.log(productId,productName,brand,quantitiy,sellingPrice) 
    cartIds.push({productId,productName,brand,quantitiy,sellingPrice});
    for (let i = 0; i < buttons.length; i++){
      buttons[i].addEventListener("click", function(event) { 
        cartBtnModify(event)   
      });
    };
  document.getElementById("btn-goto-bill").classList.remove("hideEle"); 

}

function cartBtnModify(event){
  event.target.disabled =true;
  event.target.classList.remove("btn-info")
  event.target.classList.add("btn-warning")
  event.target.innerHTML = "added";

}

function uniCart(arrayObj){
  const uniqueArray = arrayObj.filter((obj, index, self) => {
    return index === self.findIndex((t) => (
      t.productId === obj.productId
    ));

  });
  return uniqueArray;
}

function showBill(){
    const billItems = uniCart(cartIds);
    console.log(billItems)
    document.getElementById("btn-goto-bill").classList.add("hideEle");
    document.getElementById("btn-Edit-Bill").classList.remove("hideEle");
    document.getElementById("btn-Edit-Bill-form").classList.remove("hideEle");

    // <tr class="item" >
    //   <td>test</td>
    //   <td>50</td>
    //   <td class="lastItem">$300.00</td>
    // </tr>


   

    
}