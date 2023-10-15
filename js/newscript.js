function SearchFromDb(){
    console.log("function started")
    const dataTable = document.getElementById("search-result-table");
    if (dataTable != null){
      dataTable.remove();
    }
    $(document).on('submit','#search-form',function(e){
      console.log("searched")
      e.preventDefault();
      $.ajax({
      method:"POST",
      url: "php/removeProduct.php",
      data:$(this).serialize(),
      success: function(data){
          $("#table-container").html(data);
    
    }});
    });

}


function SendProductId(productId){
    var proid = productId;
    var xhr = new XMLHttpRequest();
    var url = "php/dbremove.php";
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            alert(xhr.responseText);
            location.reload(true);

        }
    };

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("proId=" + proid);


}

function SearchForUpdate(){
    const dataTable = document.getElementById("search-result-table");
    if (dataTable != null){
      dataTable.remove();
    }
    $(document).on('submit','#search-form',function(e){
      e.preventDefault();
      $.ajax({
      method:"POST",
      url: "php/updateProduct.php",
      data:$(this).serialize(),
      success: function(data){
          $("#table-container").html(data);
    
    }});
    });

}

function updateProductData(productId){
    const sell=document.getElementById("sell_"+productId).value;
    const buy =document.getElementById("Buy_"+productId).value;
    let coll_data =[];
    coll_data.push(productId);
    coll_data.push(buy);
    coll_data.push(sell);
    const send_coll = JSON.stringify(coll_data);

    console.log("new buy "+buy)
    console.log("new buy "+sell)
    var xhr = new XMLHttpRequest();
    var url = "php/dbupdate.php";
    xhr.open("POST", url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            alert(xhr.responseText);

        }
    };

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(send_coll);

    

    
}