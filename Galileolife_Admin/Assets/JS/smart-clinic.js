  $(document).ready( function () {
    $('#smartclinic-header-tbl').DataTable();
    $('#smart-clinic-pharmacy').DataTable();
    $('#smart-clinic-subhead-table').DataTable();
    $('#smart-clinic-card-tbl').DataTable();
    $('#smart-clinic-listscont-tbl').DataTable();
    $('#smart-clinic-list-tbl').DataTable();
    $('#smart-clinic-footer-tbl').DataTable();

    var hid =document.getElementById('h-hidId');
    hid.value = "";
    var mid =document.getElementById('m-hidId');
    mid.value = "";
    var shid =document.getElementById('sh-hidId');
    shid.value = "";
    var cid =document.getElementById('c-hidId');
    cid.value = "";
    var lsid =document.getElementById('ls-hidId');
    lsid.value = "";
    var lid =document.getElementById('l-hidId');
    lid.value = "";
    var fid =document.getElementById('f-hidId');
    fid.value = "";


    $('#modal-lg-upper').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-sch').html("");
    });
    $('#modal-lg-modal').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-subheader').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-card').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-card').html('');
    });
    $('#modal-lg-lists').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-lists').html("");
    });
    $('#modal-lg-list').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-footer').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-footer').html("");
    });

// 1.Upper Header
$('#smartclinic-header-tbl tbody').on('click', '.header-edit', function (e) {
// header_edits = document.getElementsByClassName('header-edit');
//   Array.from(header_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('h-hidId');
       var heading = document.getElementById('heading');
       var smallContent = document.getElementById('content');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;
       $("#display-img-sch").html(imgs);   
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
        $('#modal-lg-upper').modal('toggle');

  //     });
  // });
});
$('#smartclinic-header-tbl tbody').on('click', '.header-delete', function (e) {
  // header_deletes = document.getElementsByClassName('header-delete');
  // Array.from(header_deletes).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('h-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-heading&id="+id.value;
       }

  //     });
  // });
});

// 2.Modal smart-clinic-pharmacy
$("#smart-clinic-pharmacy tbody").on("click", ".modal-edit", function(e){
// modal_edits = document.getElementsByClassName('modal-edit');
// Array.from(modal_edits).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('m-hidId');
    var pharmacy_name = document.getElementById('pharmacy_name');
    var address = document.getElementById('address');
    var address_link = document.getElementById('address_link');
    var phone = document.getElementById('phone');
    var fax = document.getElementById('fax');
    var email = document.getElementById('email');
    id.value = e.target.id;
 
    pharmacy_name.value = tr.getElementsByTagName('td')[1].innerHTML;
    address.value = tr.getElementsByTagName('td')[2].innerHTML;
    address_link.value = tr.getElementsByTagName('td')[3].innerHTML;
    phone.value = tr.getElementsByTagName('td')[4].innerHTML;
    fax.value = tr.getElementsByTagName('td')[5].innerHTML;
    email.value = tr.getElementsByTagName('td')[6].innerHTML;
    $('#modal-lg-modal').modal('toggle');

//     });
// });
});

$("#smart-clinic-pharmacy tbody").on("click", ".modal-delete", function(e){
// modal_deletes = document.getElementsByClassName('modal-delete');
// Array.from(modal_deletes).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('m-hidId');
    id.value = e.target.id.substring(1,);
    if(confirm("Are you sure you want to delete this record?")){
    window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-modal&id="+id.value;
    }

//     });
// });
});

// 3.subcontent
$("#smart-clinic-subhead-table tbody").on("click", ".subcont-edit", function(e){
// subcont_edits = document.getElementsByClassName('subcont-edit');
// Array.from(subcont_edits).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('sh-hidId');
    var sub_heading = document.getElementById('sub-heading');
    var sub_content = document.getElementById('sub-content');
    id.value = e.target.id;
 
    sub_heading.value = tr.getElementsByTagName('td')[1].innerHTML;
    sub_content.value = tr.getElementsByTagName('td')[2].innerHTML;
    $('#modal-lg-subheader').modal('toggle');

//     });
// });
});
$("#smart-clinic-subhead-table tbody").on("click", ".subcont-delete", function(e){
// subcont_deletes = document.getElementsByClassName('subcont-delete');
// Array.from(subcont_deletes).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('sh-hidId');
    id.value = e.target.id.substring(1,);
    if(confirm("Are you sure you want to delete this record?")){
    window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-subcont&id="+id.value;
    }

//     });
// });
});
// 4. card
$("#smart-clinic-card-tbl tbody").on("click", ".card-edit", function(e){
// modal_edits = document.getElementsByClassName('card-edit');
// Array.from(modal_edits).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('c-hidId');
    var content = document.getElementById('card-content');
    var imgs=tr.getElementsByTagName('td')[1].innerHTML;
    $("#display-img-card").html(imgs);  
    id.value = e.target.id;
 
    content.value = tr.getElementsByTagName('td')[2].innerHTML;
    $('#modal-lg-card').modal('toggle');

//     });
// });
});

$("#smart-clinic-card-tbl tbody").on("click", ".card-delete", function(e){
// modal_deletes = document.getElementsByClassName('card-delete');
// Array.from(modal_deletes).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('c-hidId');
    id.value = e.target.id.substring(1,);
    if(confirm("Are you sure you want to delete this record?")){
    window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-card&id="+id.value;
    }

//     });
// });
});
// 5. lists about
$("#smart-clinic-listscont-tbl tbody").on("click", ".desc-list-edit", function(e){
// desc_edits = document.getElementsByClassName('desc-list-edit');
// Array.from(desc_edits).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('ls-hidId');
    var imgs=tr.getElementsByTagName('td')[1].innerHTML;
    $("#display-img-lists").html(imgs);  
    var lists_heading = document.getElementById('lists-heading');
    var lists_content = document.getElementById('lists-content');
    id.value = e.target.id;
 
    lists_heading.value = tr.getElementsByTagName('td')[2].innerHTML;
    lists_content.value = tr.getElementsByTagName('td')[3].innerHTML;
    $('#modal-lg-lists').modal('toggle');

//     });
// });
});
$("#smart-clinic-listscont tbody").on("click", ".desc-list-delete", function(e){
// desc_deletes = document.getElementsByClassName('desc-list-delete');
// Array.from(desc_deletes).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('ls-hidId');
    id.value = e.target.id.substring(1,);
    if(confirm("Are you sure you want to delete this record?")){
    window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-lists-desc&id="+id.value;
    }

//     });
// });
});
// 6.list
$("#smart-clinic-list-tbl tbody").on("click", ".list-edit", function(e){
// l_edits = document.getElementsByClassName('list-edit');
// Array.from(l_edits).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('l-hidId');
    var list_content = document.getElementById('list-content');
    id.value = e.target.id;
 
    list_content.value = tr.getElementsByTagName('td')[1].innerHTML;
    $('#modal-lg-list').modal('toggle');

//     });
// });
});
$("#smart-clinic-list-tbl tbody").on("click", ".list-delete", function(e){
// l_deletes = document.getElementsByClassName('list-delete');
// Array.from(l_deletes).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('l-hidId');
    id.value = e.target.id.substring(1,);
    if(confirm("Are you sure you want to delete this record?")){
    window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-list-segment&id="+id.value;
    }

//     });
// });
});
// 7.footer
$("#smart-clinic-footer-tbl tbody").on("click", ".footer-edit", function(e){
// f_edits = document.getElementsByClassName('footer-edit');
// Array.from(f_edits).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('f-hidId');
    
    var imgs=tr.getElementsByTagName('td')[1].innerHTML;
    $("#display-img-footer").html(imgs);  
    var heading = document.getElementById('footer-heading');
    var content = document.getElementById('footer-content');
    id.value = e.target.id;
 
    heading.value = tr.getElementsByTagName('td')[2].innerHTML;
    content.value = tr.getElementsByTagName('td')[3].innerHTML;
    $('#modal-lg-footer').modal('toggle');

//     });
// });
});
$("#smart-clinic-footer-tbl tbody").on("click", ".footer-delete", function(e){
// f_deletes = document.getElementsByClassName('footer-delete');
// Array.from(f_deletes).forEach(function(element) {
//     element.addEventListener('click', (e)=> {
    tr= e.target.parentNode.parentNode;
    var id =document.getElementById('f-hidId');
    id.value = e.target.id.substring(1,);
    if(confirm("Are you sure you want to delete this record?")){
    window.location = "./../DB_process/service_process.php?oper=delete-smartclinic-footer&id="+id.value;
    }

//     });
// });
});


});