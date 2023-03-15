let cartIds = [];


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
  let totalPrice = 0
  document.getElementById("btn-Edit-Bill-form").classList.remove("hideEle");
    document.getElementById("btn-Edit-Bill").classList.add("hideEle");
    const BillItems = uniCart(cartIds);
    console.log(BillItems)
    const billTable = document.getElementById("bill-items");

    for(let x =0; x < BillItems.length;x++){
      
      const newRow = billTable.insertRow();

      const newCell1 = newRow.insertCell();
      newCell1.textContent =BillItems[x].productName;

      const newCell2 = newRow.insertCell();
      newCell2.innerHTML = '<input type="text" placeholder="quantitiy" class="quantitiy" id="edit-Bill-quantitiy-'+BillItems[x].productId+'">'
      const quantitiyId = document.getElementById("edit-Bill-quantitiy-"+BillItems[x].productId)
      totalPrice = quantitiyId
      quantitiyId.value =BillItems[x].quantitiy;

      const newCell3 = newRow.insertCell();
      newCell3.classList.add("lastItem");
      newCell3.classList.add("CartTotal");

      newCell3.setAttribute("id","selling-price-"+BillItems[x].productId);

      newCell3.textContent = BillItems[x].sellingPrice * quantitiyId.value
      totalPrice =BillItems[x].sellingPrice * quantitiyId.value

      quantitiyId.addEventListener('input', function() {
        newCell3.textContent = BillItems[x].sellingPrice * quantitiyId.value
        newCell3.setAttribute("value",BillItems[x].sellingPrice * quantitiyId.value);
        totalPrice = BillItems[x].sellingPrice * quantitiyId.value

      });
    }

    const TotalRow = billTable.insertRow();

    const TotalCell = TotalRow.insertCell();
    TotalCell.textContent = "TOTAL:";

    const TotalCell2 = TotalRow.insertCell();
    TotalCell2.innerHTML ='<button type="button" class ="btn btn-info" onclick="showTotal()">ViewTotal</button>';

    const TotalCel3 = TotalRow.insertCell();
    TotalCel3.setAttribute("id","Bill-total-Price");
    TotalCel3.classList.add("lastItem")

}

function showTotal(){
  let total =0
  const totalValue = document.querySelectorAll(".CartTotal");
  for(let x =0;x<totalValue.length;x++){
    total += parseInt(totalValue[x].innerHTML);
  }
  document.getElementById("Bill-total-Price").innerHTML = total;
}