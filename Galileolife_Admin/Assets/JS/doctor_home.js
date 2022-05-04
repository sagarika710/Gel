  $(document).ready(function(){
    
    $('#header-table').DataTable();
    $('#modal-table').DataTable();
    $('#subheader-table').DataTable();
    $('#accordian-table').DataTable();
    $('#paragraph-table').DataTable();

    var hid =document.getElementById('h-hidId');
    hid.value = "";
    var mid =document.getElementById('m-hidId');
    mid.value = "";
    var scid =document.getElementById('sc-hidId');
    scid.value = "";
    var aid =document.getElementById('a-hidId');
    aid.value = "";
    var paid =document.getElementById('pa-hidId');
    paid.value = "";
 
    $('#modal-lg-header').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img').html('');
    });
    $('#modal-lg-modal').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-subcontent').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
 
    $('#modal-lg-accordian').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-accordian').html('');
    });
    $('#modal-lg-accordian-paragraph').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });


  // <!-- Heading section Edit and Delete -->
  $('#header-table tbody').on('click', '.header-edit', function(e){
//   h_edits = document.getElementsByClassName('header-edit');
//   Array.from(h_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('h-hidId');
       var heading = document.getElementById('heading');
       var smallContent = document.getElementById('content');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;
       $("#display-img").html(imgs); 
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
        $('#modal-lg-header').modal('toggle');

//       });
//   });
});
$('#header-table tbody').on('click', '.header-delete', function(e){
//   h_deletes = document.getElementsByClassName('header-delete');
//   Array.from(h_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('h-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-doctor-at-home-header&id="+id.value;
       }

//       });
//   });
});


  // <!-- modal section Edit and Delete -->
$('#modal-table tbody').on('click', '.modal-edit', function(e){
//   m_edits = document.getElementsByClassName('modal-edit');
//   Array.from(m_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('m-hidId');
       var phone = document.getElementById('phone');
       var smaemailllContent = document.getElementById('email');
       id.value = e.target.id;
       phone.value = tr.getElementsByTagName('td')[1].innerHTML;
       email.value = tr.getElementsByTagName('td')[2].innerHTML;
        $('#modal-lg-modal').modal('toggle');

//       });
//   });
});
$('#modal-table tbody').on('click', '.modal-delete', function(e){
//   m_deletes = document.getElementsByClassName('modal-delete');
//   Array.from(m_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('m-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-doctor-at-home-modal&id="+id.value;
       }

//       });
//   });
});
// <!-- sub section Edit and Delete -->
$('#subheader-table tbody').on('click', '.subcontent-edit', function(e){
// sc_edits = document.getElementsByClassName('subcontent-edit');
//   Array.from(sc_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('sc-hidId');
       var heading = document.getElementById('sub-heading');
       var content = document.getElementById('sub-content');
       var more_content = document.getElementById('more-content');
       id.value = e.target.id;
       heading.value = tr.getElementsByTagName('td')[1].innerHTML;
       content.value = tr.getElementsByTagName('td')[2].innerHTML;
       more_content.value = tr.getElementsByTagName('td')[3].innerHTML;
        $('#modal-lg-subcontent').modal('toggle');

//       });
//   });

});
$('#subheader-table tbody').on('click', '.subcontent-delete', function(e){
//   sc_deletes = document.getElementsByClassName('subcontent-delete');
//   Array.from(sc_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('sc-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-doctor-at-home-content&id="+id.value;
       }

//       });
//   });
});
// <!-- accordian section Edit and Delete -->
$('#accordian-table tbody').on('click', '.accordian-edit', function(e){
// a_edits = document.getElementsByClassName('accordian-edit');
//   Array.from(a_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('a-hidId');
       var heading = document.getElementById('accordian-heading');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;
       $("#display-img-accordian").html(imgs); 
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
        $('#modal-lg-accordian').modal('toggle');

//       });
//   });
});
$('#accordian-table tbody').on('click', '.accordian-delete', function(e){
//   a_deletes = document.getElementsByClassName('accordian-delete');
//   Array.from(a_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('a-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-doctor-at-home-accordian&id="+id.value;
       }

//       });
//   });
});
// <!-- paragraph section Edit and Delete -->
$('#paragraph-table tbody').on('click', '.para-edit', function(e){
// para_edits = document.getElementsByClassName('para-edit');
//   Array.from(para_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('pa-hidId');
       var content = document.getElementById('para-content');
       id.value = e.target.id;
       content.value = tr.getElementsByTagName('td')[1].innerHTML;
        $('#modal-lg-accordian-paragraph').modal('toggle');

//       });
//   });
});
$('#paragraph-table tbody').on('click', '.para-delete', function(e){
//   para_deletes = document.getElementsByClassName('para-delete');
//   Array.from(para_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('pa-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-doctor-at-home-paragraph&id="+id.value;
       }

//       });
//   });
});

});

