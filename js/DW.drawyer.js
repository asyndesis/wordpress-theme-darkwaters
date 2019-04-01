if (typeof DW == 'undefined') {
	var DW = {};
}
DW.drawyer = {};

DW.drawyer.isOpen = false;

DW.drawyer.init = function() {
  let drawyer = document.getElementById( 'dw-drawyer' );
  let buttonHole = document.querySelector('div.dw-drawyer div.dw-cap p');
  let btnSubmit = document.querySelector('.dw-drawyer .wpcf7-submit');
  let btn = document.createElement("button");
  let btnText = document.createTextNode("Contact");
  let inputs = document.getElementsByName('your-name');
  btn.type = 'button';
  btn.className = 'btn btn-primary dw-cancel';
  btn.appendChild(btnText);
  btnSubmit.style.display = "none";

  btn.addEventListener('click', function(event){
    if (DW.drawyer.isOpen){
      DW.drawyer.isOpen = false;
      btn.innerHTML = 'Contact';
      btn.classList.remove("btn-dark");
      btn.classList.add("btn-primary");
      document.body.classList.remove("drawyer-open");
      btnSubmit.style.display = "none";
    }else{
      inputs[0].focus();
      DW.drawyer.isOpen = true;
      btn.innerHTML = 'Cancel';
      btn.classList.remove("btn-primary");
      btn.classList.add("btn-dark");
      document.body.classList.add("drawyer-open");
      btnSubmit.style.display = "inline-block";
    }
  });

  buttonHole.appendChild(btn);
}


DW.drawyer.init();