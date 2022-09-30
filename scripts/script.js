//ustawiam klucz w sesion storage na 0
window.addEventListener('DOMContentLoaded', (event) => {
    sessionStorage.setItem('key', 0);
});
//Modal

var modal = document.querySelector(".modal-add-product");
var close = document.getElementsByClassName("modal-add-product__close")[0];
var pageButton = document.querySelector(".page-button__add-product");
pageButton.onclick = () => {
    console.log("klikłeś przycisk")
}
pageButton.onclick = function () {
    modal.style.display = "flex";
}

close.onclick = function () {
    modal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//Wgrywanie zdjęcia produktu
function handleFileSelect(evt) {
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                var thumbnail = document.getElementById('image-thumbnail');
                thumbnail.innerHTML = ' <img class="thumb" src="' + e.target.result +
                    '" title="' + escape(theFile.name) + '"/>';
            };
        })(f);
        reader.readAsDataURL(f);
    }
}

document.getElementById('file').addEventListener('change', handleFileSelect, false);

var saveBtn = document.querySelector('.modal-add-product__footer-btn--save');

saveBtn.onclick = function (event) {
    event.preventDefault();
    var nazwa = document.querySelector('[name=product_name]').value;
    try {
        var zdjecieProduktu = document.querySelector('.thumb').src;
    }
    catch (e) {
    }
    var dataPrzydatnosci = document.querySelector('[name=expiration_date]').value;
    var lokalizacjaProduktu = document.querySelector('[name=product_location]').value;
    var kodKreskowy = document.querySelector('[name=bar_code]').value;
    var key = parseInt(sessionStorage.getItem('key'));
    ++key;
    sessionStorage.setItem('key', key);
    var table = document.querySelector('.page-content__table');
    table.innerHTML += '<div class="page-content__table-row"><div class="page-content__table-cell">' + key + '</div><div class="page-content__table-cell">' + nazwa +'</div><div class="page-content__table-cell"><img class="page-content__table-thumbnail" src="'+zdjecieProduktu+'" /></div><div class="page-content__table-cell">'+dataPrzydatnosci+'</div><div class="page-content__table-cell">'+lokalizacjaProduktu+'</div><div class="page-content__table-cell">'+kodKreskowy+'</div></div>'
    modal.style.display = "none";
    console.log(nazwa, dataPrzydatnosci, lokalizacjaProduktu, kodKreskowy, zdjecieProduktu);
}


