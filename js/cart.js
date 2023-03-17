let cartIds = [];


function cart(productId,productName,brand,sellingPrice){ 
    const buttons = document.querySelectorAll(".cart-btns");
    const quantitiy =document.getElementById("quantity-For-Bill-"+productId).value;

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

    document.getElementById("btn-Edit-Bill-form").classList.remove("hideEle");
    document.getElementById("btn-goto-bill").classList.add("hideEle");
    document.getElementById("search-bar").classList.add("hideEle");
    document.getElementById("search-result-table").classList.add("hideEle");
    document.getElementById("final-bill-btn").innerHTML = '<button type="button" onclick="hidebillBtn()"  class="btn btn-info final-bill" style="margin-left: 42%;">finalize Bill</button>'
    document.getElementById("nav-bar-section").remove();

    const billTable = document.getElementById("bill-items");
    
    const BillItems = uniCart(cartIds);

    for(let x =0; x < BillItems.length;x++){
      
      const newRow = billTable.insertRow();
      newRow.setAttribute("id","product-Row-Id-" +BillItems[x].productId)


      const newCell1 = newRow.insertCell();
      newCell1.textContent =BillItems[x].productName;

      const newCell2 = newRow.insertCell();
      newCell2.innerHTML = '<div class="col-md-3 col-lg-3 col-xl-2 d-flex quantitiy"><input id="edit-Bill-quantitiy-'+BillItems[x].productId+'" min="0" name="quantity" value="1" type="number"class="form-control qua-val form-control-sm " style="width: 50px;" /></div>'
      const quantitiyId = document.getElementById("edit-Bill-quantitiy-"+BillItems[x].productId)
      totalPrice = quantitiyId
      quantitiyId.value =BillItems[x].quantitiy;

      const newCell3 = newRow.insertCell();
      newCell3.classList.add("lastItem");
      newCell3.classList.add("CartTotal");


      newCell3.setAttribute("id","selling-price-"+BillItems[x].productId);
      newCell3.innerHTML = BillItems[x].sellingPrice * quantitiyId.value + '<button type="button" class="btn-close" onclick="RemoveBillItem('+ BillItems[x].productId+')" aria-label="Close"></button>'
      totalPrice =BillItems[x].sellingPrice * quantitiyId.value

      quantitiyId.addEventListener('input', function() {
        totalPrice = BillItems[x].sellingPrice * quantitiyId.value
        newCell3.innerHTML =totalPrice +'<button type="button" class="btn-close" onclick="RemoveBillItem(' + BillItems[x].productId +')"  aria-label="Close"></button>'
        newCell3.setAttribute("value",BillItems[x].sellingPrice * quantitiyId.value);
        

      });
    }


    
    const TotalRow = billTable.insertRow();
    TotalRow.setAttribute("id","total-Row")

    const TotalCell = TotalRow.insertCell();
    TotalCell.textContent = "TOTAL:";

    const TotalCell2 = TotalRow.insertCell();
    TotalCell2.innerHTML ='<button type="button" id="bill-show-total" class ="btn btn-info" onclick="showTotal()">Total</button>';
    

    const TotalCel3 = TotalRow.insertCell();
    TotalCel3.setAttribute("id","Bill-total-Price");
    TotalCel3.setAttribute("style","border: none;border-top: solid;border-bottom: solid;")
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

function RemoveBillItem(Id){
  let newId ="product-Row-Id-"+Id
  document.getElementById(newId).innerHTML = ""


  }
function checkout(){
  console.log("checkout");
}
function hidebillBtn(){

  showTotal()
  document.getElementById("final-bill-btn").classList.add("hideEle");
  document.getElementById("socail-icons").remove();
  document.getElementById("bill-show-total").remove();

  // const quaBtns = document.querySelectorAll(".qua-btn");
  // quaBtns.forEach(element => {
  //   element.remove();
  
  // });

  const quaVal = document.querySelectorAll(".qua-val");
  quaVal.forEach(element => {
    element.setAttribute("disabled","true");
    
  });
  const btnClose = document.querySelectorAll(".btn-close");
  btnClose.forEach(element=>{
    element.remove();
  })
  const userData =document.querySelectorAll(".user-data");
  userData.forEach(element=>{
    element.setAttribute("disabled","true");
  })



}