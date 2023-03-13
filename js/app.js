const InvoiceTD = document.getElementById("InvoiceTD");

function timeAndDate(){
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth();
    let day = currentDate.getDate();
    let time = currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate.getSeconds();

    const fullData = ("Invoice<br>" + year + '-' + months[month] + '-' + day +"<br>" + time);
    return fullData

}

InvoiceTD.innerHTML =timeAndDate()
