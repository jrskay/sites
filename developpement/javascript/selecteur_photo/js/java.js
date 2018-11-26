var photo = document.querySelectorAll('.photo');
var list = document.querySelector('.list');


console.log(photo);

function addSelected() {
  this.classList.toggle('selected');
}

for (var i = 0; i < photo.length; i ++) {
  var tof =  photo[i];
tof.addEventListener('click', addSelected);
}

for (var add =0; add < photo.length; add ++)
{
  if (photo[i] = tof)
    add = add++ ;

  else {
    add = add;
  }
   console.log(tof);
}
