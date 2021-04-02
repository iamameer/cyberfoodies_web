 // $(document).ready(function(){
            //     $(".searchButton").click(function(){ 
            //         var a = $("#searchInput").val();
            //         $(".product-show-option").load("browselist.php?search="+a);
            //     });
            // });

function searchFood(){ 
    var x = document.getElementById("searchInput").value;
    if(x.length<2){
        alert("Please insert a logical keyword to be searched");
        return;
    }
    
    var url = window.location.href;
    if(url.includes("browsestore.php")){
        window.location.replace("browsestore.php?search="+x);
    }else{
        //search outside browsestore
        window.location.replace("browsefood.php?search="+x);
    }
}

// function searchStore(){
//     var x = document.getElementById("searchstore").value;
//     if(x.length>1){
//         window.location.replace("browsestore.php?search="+x);
//     }else{
//         alert("Please insert a logical keyword to be searched");
//     }
// }

function filterStore(){

    //search input
    var x = document.getElementById("searchInput").value;   
    var search = "search="+x; 

    //district checkbox
    var district = "&district=";
    if(document.getElementById("cyberjaya").checked){
        district += "a";
    }
    if(document.getElementById("putrajaya").checked){
        district += "+b";
    }
    if(document.getElementById("dengkil").checked){
        district += "+c";
    }
    if(document.getElementById("puchong").checked){
        district += "+d";
    }
    if(document.getElementById("other").checked){
        district += "+e";
    } 

    //status
    var status = "&status="+document.getElementById("storestatus").value;

    //category
    var category = "&category="+document.getElementById("category").value;

    window.location.replace("browsestore.php?"+search+district+status+category);

    // if(x.length>0){
    //     window.location.replace("browsestore.php?search="+x+district+status+category);
    // }else{
    //     district = district.substring(1);
    //     window.location.replace("browsestore.php?"+district+status+category);
    // }
}

function filterFood(){
    //price
    var pmin = document.getElementById("minamount").value;
    var pmax = document.getElementById("maxamount").value;
    var price = "pmin="+pmin+"&pmax="+pmax;

    //district checkbox
    var district = "&district=";
    if(document.getElementById("cyberjaya").checked){
        district += "a";
    }
    if(document.getElementById("putrajaya").checked){
        district += "+b";
    }
    if(document.getElementById("dengkil").checked){
        district += "+c";
    }
    if(document.getElementById("puchong").checked){
        district += "+d";
    }
    if(document.getElementById("other").checked){
        district += "+e";
    } 

    //status
    var status = "";//"&status="+document.getElementById("productstatus").value;

    //search (url)
    var x = window.location.href; 
    x = (x.includes("search")) ? (x.split("search=")[1]).split("&")[0] : '';

    if(x.length>0){
        window.location.replace("browsefood.php?search="+x+"&"+price+district+status);
    }else{ 
        window.location.replace("browsefood.php?"+price+district+status);
    }
}

function openNav() { 
    document.getElementById("filterbar").style.width = "80%"; 
    document.getElementById("filterbar").style.left = "0px";  

    document.getElementById("filterblocker").style.width = "100%"; 
    document.getElementById("filterblocker").style.right = "0px";  
}

function closeNav() { 
    document.getElementById("filterbar").style.width = "0";  
    document.getElementById("filterbar").style.left = "-50px"; 

    document.getElementById("filterblocker").style.width = "0"; 
    document.getElementById("filterblocker").style.right = "-50px";  
}

function floatbutton() { 
    console.log("floatclicked")
    var x = window.location.href; 
    if(!x.includes("#storeinfo") && !x.includes("#storename")){
        document.getElementById("floatbutton").href = "#storename"
        document.getElementById("myfloat").classList.add("fa-chevron-circle-up");
        document.getElementById("myfloat").classList.remove("fa-info-circle");
    }else if(x.includes("#storename")){ 
            document.getElementById("floatbutton").href = "#storeinfo"
            document.getElementById("myfloat").classList.add("fa-chevron-circle-up");
            document.getElementById("myfloat").classList.remove("fa-info-circle"); 
    }else if(x.includes("#storeinfo")){ 
        document.getElementById("floatbutton").href = "#storename"
        document.getElementById("myfloat").classList.remove("fa-chevron-circle-up");
        document.getElementById("myfloat").classList.add("fa-info-circle");
    }
}
