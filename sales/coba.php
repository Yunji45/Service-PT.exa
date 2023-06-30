<form id="formD" name="formD" action="" method="post" enctype="multipart/form-data">
   Harga Satuan: <br> 
   <input type="text" name="harga" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"><br> 
  PPN 11% : <br>
  <input type="text" name="txtPPN" value="" readonly="readonly"><br>    
   Harga keseluruhan : <br>
   <input type="text" name="txtDisplay" value="" readonly="readonly">
</form>

<script>
function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
     return false;
  return true;
}

function OnChange(value){
  var harga = parseFloat(value);
  if(isNaN(harga)){
    harga = 0;
  }
  var ppn = harga * 0.11;
  var total = harga + ppn;
  
  document.formD.txtPPN.value = ppn.toFixed(2);
  document.formD.txtDisplay.value = total.toFixed(2);
}
</script>