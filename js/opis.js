
    $('.registr-btn').click(function(e){

        e.preventDefault();

        $(`textarea`).removeClass('error_');

        let id_moto = $('input[name="id_moto"]').val(), 
        opisBike = $('textarea[name="opisBike"]').val(),
        harakterBuke = $('textarea[name="harakterBuke"]').val(),
        vikorBike = $('textarea[name="vikorBike"]').val(),
        shasiBike = $('textarea[name="shasiBike"]').val();

         $.ajax({
            url: '../modules/opis-moto-back.php',
            type: 'POST',
            dataType: 'json',
            data:{
                id_moto:id_moto,
                opisBike: opisBike,
                harakterBuke: harakterBuke,
                vikorBike: vikorBike,
                shasiBike: shasiBike
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