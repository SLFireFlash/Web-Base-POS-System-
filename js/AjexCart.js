
$(document).on('submit','#search-form',function(e){
    e.preventDefault();
    
    $.ajax({
    method:"POST",
    url: "php/searchQ.php",
    data:$(this).serialize(),
    success: function(data){
        $("#table-container").html(data);

}});
});

function removeitems(){
    const dataTable = document.getElementById("search-result-table");
    if (dataTable != null){
      dataTable.remove();
    }
  }