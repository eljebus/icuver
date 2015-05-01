//---------------------------------------------------

function uploadMain()
{

	var element;

	var imagen;


    this.uploadImage=function (event)
	{   
		element =  $(this).parent();

		var i = 0, len = this.files.length, img, reader, file;

		for(i=0 ; i < len; i++){

			file = this.files[i];

			if(!!file.type.match(/image.*/)){

				if(window.FileReader){

				  reader = new FileReader();

				  reader.onloadend = function(e){
				     
				    mostrarImagenSubida(e.target.result,file.name);

				  };

				  reader.readAsDataURL(file);
				  
				  imagen= file;

				}
			}

		}
	      	
	    
	    //$(this).prop('disabled', true);


	};
	

	function mostrarImagenSubida(source,name){
		

        var  	list 	= element,
            	img  	= document.createElement('img');

        img.src = source;

        $(list).append(img);

        $(list).find('.plus').css('display','none');

    }

}


