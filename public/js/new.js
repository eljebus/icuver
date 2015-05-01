
       $(document).on('ready',iniciar);

       var imagenes;

     function iniciar(){



		if(window.FormData){

			imagenes = new uploadNew();

		}



	
		$('#add-imagen').on('change',imagenes.uploadImage);

		$('#articleForm').on('submit',save);
	}


	function save(e){

		e.preventDefault();

		var form =  imagenes.setImages();

		var seccion = $('#section').val()

		form.append('seccion',seccion);

		
		$('#articleForm').html('<center><H4 class="header">Espera un momento por favor</H4><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></center>');


		$.ajax({

			url : '/Admin/addPhotos',
			type : 'POST',
			data : form,
			processData : false, 
			contentType : false, 
			success : function(res){

				console.log(res.Error);
				if(res.Error ==  'false')
					window.location.href = "/Admin/"+seccion;
			},
			headers: {
		       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }


		}); 
	}
