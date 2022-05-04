$(document).ready( function () {
    $('#home-service-table').DataTable();
    $('#home-benefit-table').DataTable();
    var sid =document.getElementById('s-hidId');
    sid.value = "";
    var bid =document.getElementById('b-hidId');
    bid.value = "";

    $('#modal-lg-service').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-benefits').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });

{/* <!-- Service section Edit and Delete --> */}

$("#home-service-table tbody").on("click", ".s-edit", function(e){
//   s_edits = document.getElementsByClassName('s-edit');
//   Array.from(s_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('s-hidId');
       var heading = document.getElementById('service-heading');
       var smallContent = document.getElementById('smallContent-service');
       var moreContent = document.getElementById('moreContent-service');

       id.value = e.target.id;
    //    console.log(id.value);
    //    console.log(e.target.id);
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;

      $("#display-img-service").html(imgs);     
      
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
        moreContent.value = tr.getElementsByTagName('td')[4].innerHTML;
        $('#modal-lg-service').modal('toggle');

//       });
//   });
});

$("#home-service-table tbody").on("click", ".s-delete", function(e){
//   s_deletes = document.getElementsByClassName('s-delete');
//   Array.from(s_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('s-hidId');
        id.value = e.target.id.substring(1,);
      
       if(confirm("Are you sure you want to delete this record?")){
       
        window.location = "./../DB_process/home_process.php?oper=delete-service&id="+id.value;
       }
//       });
//   });
});
// <!-- Benefit section Edit and Delete -->

$("#home-benefit-table tbody").on("click", ".b-edit", function(e){
//   b_edits = document.getElementsByClassName('b-edit');
//   Array.from(b_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('b-hidId');
       var heading = document.getElementById('heading-benefits');
       var smallContent = document.getElementById('smallContent-benefits');
       var moreContent = document.getElementById('moreContent-benefits');

       id.value = e.target.id;
    //    console.log(id.value);
    //    console.log(e.target.id);
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;

       $("#display-img-benefit").html(imgs);     
      
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
        moreContent.value = tr.getElementsByTagName('td')[4].innerHTML;
        $('#modal-lg-benefits').modal('toggle');

    //   });
//   });
});

$("#home-benefit-table tbody").on("click", ".b-delete", function(e){
//   b_deletes = document.getElementsByClassName('b-delete');
//   Array.from(b_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('b-hidId');
        id.value = e.target.id.substring(1,);
      
       if(confirm("Are you sure you want to delete this record?")){
       
        window.location = "./../DB_process/home_process.php?oper=delete-benefits&id="+id.value;
       }

      });
//   });
// });

});