const knopkaOpis = document.querySelector(".srorynka-knopka-opis");
const knopkaHuract = document.querySelector(".srorynka-knopka-harakter");
const knopkaVidguk = document.querySelector(".srorynka-knopka-vidguk");
const textOpis = document.querySelector(".storinka-block-opis");
const textHuract = document.querySelector(".storinka-block-harackter");
const textVidguk = document.querySelector(".storinka-block-coments");

const blockYesNo = document.querySelector(".pidtverdt");
const blockYes = document.querySelector(".zakaz-div");
const blockNo = document.querySelector(".storynka-no");


knopkaOpis.addEventListener("click",function(e){
knopkaOpis.classList.add('active');
knopkaHuract.classList.remove('active');
knopkaVidguk.classList.remove('active');
textOpis.classList.remove('none');
textHuract.classList.add('none');
textVidguk.classList.add('none');
});

knopkaHuract.addEventListener("click",function(e){
knopkaOpis.classList.remove('active');
knopkaHuract.classList.add('active');
knopkaVidguk.classList.remove('active');
textOpis.classList.add('none');
textHuract.classList.remove('none');
textVidguk.classList.add('none');

});

knopkaVidguk.addEventListener("click",function(e){
    knopkaOpis.classList.remove('active');
    knopkaHuract.classList.remove('active');
    knopkaVidguk.classList.add('active');
    textOpis.classList.add('none');
    textHuract.classList.add('none');
    textVidguk.classList.remove('none');

});

blockYes.addEventListener("click",function(e){
    blockYesNo.classList.remove('none');
});

blockNo.addEventListener("click",function(e){
    blockYesNo.classList.add('none');
});

$('.button-new-koment').click(function(e){

    e.preventDefault();

    $(`textarea`).removeClass('error_');

    let id_moto = $('input[name="id_moto"]').val(), 
    userId = $('input[name="userId"]').val(),
    koment = $('textarea[name="koment"]').val();

     $.ajax({
        url: '../modules/new-koment-beck.php',
        type: 'POST',
        dataType: 'json',
        data:{
            id_moto:id_moto,
            userId: userId,
            koment: koment,
        },
        success (data){
            if(data.status){
                document.location.href = '../index.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field) {
                        $(`input[name="${field}"]`).addClass('error_');
                    });
                }
                $('.msg').removeClass('none').text(data.message);
            }
            
        }
     });

});