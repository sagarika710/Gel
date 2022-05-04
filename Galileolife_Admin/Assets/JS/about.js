  $(document).ready( function () {
    $('#about-heading-table').DataTable();
    $('#about-subsection-table').DataTable();
    $('#about-accordian-table').DataTable();
    var hid =document.getElementById('h-hidId');
    hid.value = "";
    var sid =document.getElementById('s-hidId');
    sid.value = "";
    var aid =document.getElementById('a-hidId');
    aid.value = "";

    $('#modal-lg-heading').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-subcontent').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
    $('#modal-lg-accordian').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    });
});

// <!-- Heading section Edit and Delete -->
$("#about-heading-table tbody").on("click", ".main-edit", function(e){
//   main_edits = document.getElementsByClassName('main-edit');
//   Array.from(main_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('h-hidId');
       var heading = document.getElementById('heading');
       var smallContent = document.getElementById('content');
       id.value = e.target.id;
       heading.value = tr.getElementsByTagName('td')[1].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[2].innerHTML;
        $('#modal-lg-heading').modal('toggle');

//       });
//   });
});

$("#about-heading-table tbody").on("click", ".main-delete", function(e){
//   main_deletes = document.getElementsByClassName('main-delete');
//   Array.from(main_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('h-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/about_process.php?oper=delete-heading&id="+id.value;
       }

//       });
//   });
});


// <!-- Sub section Edit and Delete -->

$("#about-subsection-table tbody").on("click", ".sub-edit", function(e){
//   sub_edits = document.getElementsByClassName('sub-edit');
//   Array.from(sub_edits).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('s-hidId');
       var heading = document.getElementById('sub-heading');
       var smallContent = document.getElementById('smallContent');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;

      $("#display-img-sub").html(imgs);  
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
      $('#modal-lg-subcontent').modal('toggle');

//       });
//   });
});

$("#about-subsection-table tbody").on("click", ".sub-delete", function(e){
//   sub_deletes = document.getElementsByClassName('sub-delete');
//   Array.from(sub_deletes).forEach(function(element) {
//       element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('s-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/about_process.php?oper=delete-subcontent&id="+id.value;
       }
//       });
//   });
});


// <!-- Accordian section Edit and Delete about-accordian-table -->

  $("#about-accordian-table tbody").on("click", ".accordian-edit", function(e){
  // accordian_edits = document.getElementsByClassName('accordian-edit');
  // Array.from(accordian_edits).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('a-hidId');
       var heading = document.getElementById('accordian-heading');
       var smallContent = document.getElementById('accordian-smallContent');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;
       $("#display-img-accordian").html(imgs);     
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
        $('#modal-lg-accordian').modal('toggle');

  //     });
  // });
});

$("#about-accordian-table tbody").on("click", ".accordian-delete", function(e){
  // accordian_deletes = document.getElementsByClassName('accordian-delete');
  // Array.from(accordian_deletes).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('a-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/about_process.php?oper=delete-accordian&id="+id.value;
       }

  //     });
  // });
});
