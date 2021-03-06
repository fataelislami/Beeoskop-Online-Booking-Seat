<script src="<?php echo base_url()?>assets/plugins/summernote/dist/summernote.min.js"></script>

<!-- Sweet-Alert  -->
<script src="<?php echo base_url()?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/bioskop/admin/json/studio",
  "method": "GET",
  "headers": {
    "Cache-Control": "no-cache",
    "Postman-Token": "c06eb597-5993-4d9a-bf31-c6a1e83910e9"
  }
}

$.ajax(settings).done(function (response) {
  items=JSON.parse(response);
  var akhir=items.length-1;
  for(var i=0;i<=akhir;i++){
    $("#id_studio").append('<option value="'+items[i].id_studio+'">'+items[i].nama_studio+'</option>');
  }
});
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/bioskop/admin/json/film",
  "method": "GET",
}

$.ajax(settings).done(function (response) {
  items=JSON.parse(response);
  var akhir=items.length-1;
  for(var i=0;i<=akhir;i++){
    $("#id_film").append('<option value="'+items[i].id_film+'">'+items[i].judul_film+'</option>');
  }
});
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/bioskop/admin/json/jam_tayang",
  "method": "GET",
}

$.ajax(settings).done(function (response) {
  items=JSON.parse(response);
  var akhir=items.length-1;
  for(var i=0;i<=akhir;i++){
    $("#id_jam_tayang").append('<option value="'+items[i].id_jam_tayang+'">'+items[i].jam_tayang+'</option>');
  }
});
  });
</script>
<script>
jQuery(document).ready(function() {

    $('.summernote').summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });

    $('.inline-editor').summernote({
        airMode: true
    });

});

window.edit = function() {
        $(".click2edit").summernote()
    },
    window.save = function() {
        $(".click2edit").summernote('destroy');
    }
</script>

<!-- This is data table -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy'
    ]
});
</script>
