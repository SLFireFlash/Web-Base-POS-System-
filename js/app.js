const InvoiceTD = document.getElementById("InvoiceTD");

function timeAndDate(){
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth();
    let day = currentDate.getDate();

    const fullData = ("Invoice<br>Created : " + year + '-' + months[month] + '-' + day);
    return fullData

}

InvoiceTD.innerHTML =timeAndDate()
