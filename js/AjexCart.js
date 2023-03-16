console.log("file runing..");


$(document).on('click','#btn-search-product',function(e){
    console.log("inside function 01");
    $.ajax({    
      type: "GET",
      url: "php/searchQ.php",             
      dataType: "html",                  
      success: function(data){    
        console.log("inside function 02");                
          $("#table-container").html(data); 
         
      }
  });
});