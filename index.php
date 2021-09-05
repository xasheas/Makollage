<!DOCTYPE html>

<html>

<head>

  <title>Makollage</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

<!-- divleri fotograf yapmamı saglayan script -->
	<script src="html2canvas.js"></script>

   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <style type="text/css">

    input[type=file]{

      display: inline;

    }

    #image_preview{

      border: 1px solid black;

      padding: 10px;

    }

    #image_preview img{

      width: 200px;

      padding: 5px;

    }

  </style>



</head>

<body>



<div >

  <h1>Makollage</h1>

  <form action="uploadFile.php" method="post" enctype="multipart/form-data">

      <input type="file" id="uploadFile" name="uploadFile[]" multiple/>

      <input type="submit"  name='submitImage' value="Upload Image"/>

  </form>



  <br/>

  <div id="image_preview" style="width:700px">  </div>

</div>



</body>



<script type="text/javascript">



  $("#uploadFile").change(function(){

     $('#image_preview').html("");

     var total_file=document.getElementById("uploadFile").files.length;



     for(var i=0;i<total_file;i++)

     {

      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

     }



  });

</script>

        <script type="text/javascript">
		$(function(){

			$('#savas').click(function(){

				div_content = document.querySelector("#image_preview")

				html2canvas(div_content).then(function(canvas) {

					data = canvas.toDataURL('image/jpeg');


					save_img(data);
				});
			});
		});

		function save_img(data){

			$.post('save_jpg.php', {data: data}, function(res){

				if(res != ''){
					yes = confirm('File saved in output folder, click ok to see it!');
					if(yes){

						location.href =document.URL+'output/'+res+'.png';
					}
				}
				else{
					alert('something wrong');
				}
			});
		}
    </script>

</html>
