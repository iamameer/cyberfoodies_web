 // $(document).ready(function(){
            //     $(".searchButton").click(function(){ 
            //         var a = $("#searchInput").val();
            //         $(".product-show-option").load("browselist.php?search="+a);
            //     });
            // });

function searchFood(){
    var x = document.getElementById("searchInput").value;
    //x = x.replace(" ","+");
    if(x.length>1){
        window.location.replace("browsefood.php?search="+x);
    }else{
        alert("Please insert a logical keyword to be searched");
    }
}

function searchStore(){
    var x = document.getElementById("searchstore").value;
    if(x.length>1){
        window.location.replace("browsestore.php?search="+x);
    }else{
        alert("Please insert a logical keyword to be searched");
    }
}

function filterStore(){
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

    //search input
    var x = document.getElementById("searchstore").value; 
    if(x.length>0){
        window.location.replace("browsestore.php?search="+x+district+status+category);
    }else{
        district = district.substring(1);
        window.location.replace("browsestore.php?"+district+status+category);
    }
}