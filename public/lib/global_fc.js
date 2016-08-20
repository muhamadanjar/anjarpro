function numeralsOnly(evt) {
			evt = (evt) ? evt : event;
			var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
			((evt.which) ? evt.which : 0));
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				   alert("Hanya Nomor yang bisa di input pada kolom ini.");
				   return false;
				}
			return true;
}

function lettersOnly(evt) {
		   evt = (evt) ? evt : event;
		   var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
			  ((evt.which) ? evt.which : 0));
		   if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
			  alert("Enter letters only.");
			  return false;
		   }
		   return true;
}

function ynOnly(evt) {
evt = (evt) ? evt : event;
var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 31 && charCode != 78 && charCode != 89 && charCode != 110 && charCode != 121) {
	alert("Enter \"Y\" or \"N\" only.");
	return false;
	}
	return true;
}