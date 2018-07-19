<script type="text/javascript">
  $(document).ready(function(){

    function load(){
      var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/bioskop/belajar/getData",
  "method": "GET",
  "headers": {
    "Cache-Control": "no-cache",
    "Postman-Token": "f4ab6f44-299a-402e-9be9-736f111d5222"
  }
}

$.ajax(settings).done(function (response) {
  items=JSON.parse(response);
  console.log(items[1].nama);
  for(var i=0;i<items.length;i++){
    $("#table-body").append("<tr><td>"+items[i].id+"</td><td>"+items[i].nama+"</td><td>"+items[i].alamat+"</td><td>"+items[i].umur+"</td></tr>");
  }
});
    }

    load();

    function changeRow(){
      var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/bioskop/belajar/getData",
  "method": "GET",
}

$.ajax(settings).done(function (response) {
  items=JSON.parse(response);
  var akhir=items.length-1;

    $("#table-body").append("<tr><td>"+items[akhir].id+"</td><td>"+items[akhir].nama+"</td><td>"+items[akhir].alamat+"</td><td>"+items[akhir].umur+"</td></tr>");

});
    }

    $("#btn1").click(function(){
      var nama=$("#nama").val();
      var alamat=$("#alamat").val();
      var umur=$("#umur").val();

      var form = new FormData();
form.append("nama", nama);
form.append("alamat", alamat);
form.append("umur", umur);

var settings = {
"async": true,
"crossDomain": true,
"url": "<?php echo base_url();?>belajar/create_action",
"method": "POST",
"processData": false,
"contentType": false,
"mimeType": "multipart/form-data",
"data": form
}

$.ajax(settings).done(function (response) {
alert("SUKSES");
changeRow();
});
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#btnTest").click(function(){
  
    var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/bioskop/belajar/getData",
  "method": "GET",
  "headers": {
    "Cache-Control": "no-cache",
    "Postman-Token": "51381a28-7257-4c78-919b-37c46fae9248"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
  });
});

</script>
