let FotoBike = false;
$('input[name="FotoBike"]').change(function(e){
    FotoBike=e.target.files[0];
});

// ----------------------------------------Реєстрація

$('.registr-btn').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');

    let nameMoto = $('input[name="nameMoto"]').val(),
    brend = $('select[name="brend"]').val(),
    volumeBike = $('select[name="volumeBike"]').val(),
    maxPower = $('input[name="maxPower"]').val(),
    maxRevolution = $('input[name="maxRevolution"]').val(),
    fuelBike = $('input[name="fuelBike"]').val(),
    volumeFuelBike = $('input[name="volumeFuelBike"]').val(),
    transmissionBike = $('input[name="transmissionBike"]').val(),
    weigntBike = $('input[name="weigntBike"]').val(),
    KiklkistMoto = $('input[name="KiklkistMoto"]').val(),
    priceBike = $('input[name="priceBike"]').val(),
    systemBike = $('select[name="systemBike"]').val(),
    countryBike = $('select[name="countryBike"]').val(),
    maxSpeedBike = $('input[name="maxSpeedBike"]').val();

    let formData = new FormData();
            formData.append('nameMoto', nameMoto);
            formData.append('brend', brend);
            formData.append('volumeBike', volumeBike);
            formData.append('maxPower', maxPower);
            formData.append('maxRevolution', maxRevolution);
            formData.append('fuelBike', fuelBike);
            formData.append('volumeFuelBike', volumeFuelBike);
            formData.append('transmissionBike', transmissionBike);
            formData.append('weigntBike', weigntBike);
            formData.append('KiklkistMoto', KiklkistMoto);
            formData.append('priceBike', priceBike);
            formData.append('systemBike', systemBike);
            formData.append('countryBike', countryBike);
            formData.append('maxSpeedBike', maxSpeedBike);
            formData.append('FotoBike', FotoBike);

     $.ajax({
        url: '../modules/new-bike-beck.php',
        type: 'POST',
        dataType: 'json',
        processData:false,
        contentType:false,
        cache:false,
        data:formData,
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