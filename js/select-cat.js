var select = document.getElementById("select");   
var popular = document.getElementById("popular");   
var date = document.getElementById("date");   
var id = document.getElementById("id");   
//var input = document.querySelector("input");

select.addEventListener("change", function(){
    console.log(id.value)
    window.location.href = 'http://localhost:8080/app/pages/books_by_category.php?id_category='+id.value+'&sort='+select.value;
});