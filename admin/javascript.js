function tambah(){
var x=document.forms['order']['produk'].value;
var y=document.forms['order']['nama_supplier'].value;
var z=document.forms['order']['harga'].value;
var a=document.forms['order']['jumlah'].value;
 
if(x==null || x=="")
{
  document.getElementById("produk").innerHTML="<font color='red'><b>* Harap Isi Kolom NIM Dengan Benar</b></font>";

  if(y==null || y=="") {
  document.getElementById("nama_supplier").innerHTML="<font color='red'><b>* Harap Isi Kolom NAMA Dengan Benar</b></font>";   
  } else {
  document.getElementById("nama_supplier").innerHTML="<font color='purple'>* Benar</font>";
  }
} else {
 
document.getElementById("produk").innerHTML="<font color='purple'>* Benar</font>";

if(y==null || y=="") {
  document.getElementById("nama_supplier").innerHTML="<font color='red'><b>* Harap Isi Kolom NAMA Dengan Benar</b></font>";   
  } else {
 
    document.getElementById("nama_supplier").innerHTML="<font color='purple'>* Benar</font>";

    var tabel = document.getElementById("tabel");
    var row = tabel.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = x;
    cell2.innerHTML = y;
    cell3.innerHTML = z;
  }
}
}