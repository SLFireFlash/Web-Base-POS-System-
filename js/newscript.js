function SearchFromDb(){
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
