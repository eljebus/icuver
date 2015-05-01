
function Mail() {

	this.element      = '#contact';

        this.gif          = '/image/ajax-loader.gif';

        this.errorMassage = 'Ha ocurrido un error intenta más tarde';

        this.url          = '/processForm';

        this.funcion      = null;


        this.sendData = function(){

                var gif    = this.gif,
                element    = this.element,
                error      = this.errorMassage,
                url        = this.url,
                funcion    = this.funcion,
                parametros = $(element).serialize();
                console.log(parametros);

                $.ajax({

                        data:  parametros,
                        url:   url,
                        type:  'post',
                        processData : false,
                        contentType: 'application/x-www-form-urlencoded',
                        headers: {

                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        beforeSend: function () {
                                $(element).html("<center>Procesando, espere por favor...<br><img src='"+gif+"'></center>");
                        },
                        success:  function (response) {

                               if(response.Error == false){

                                        funcion();
                                }
                                else
                                      $(element).html(error); 
                                        
                        }
                });

        }

}