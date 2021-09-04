  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

<!-- divleri fotograf yapmamı saglayan script -->
	<script src="html2canvas.js"></script>

   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<div id="Savas" style="width:600px;float:left">

  <?php

if(isset($_POST['submitImage']))

{

	for($i=0;$i<count($_FILES["uploadFile"]["name"]);$i++)

	{

		$uploadfile=$_FILES["uploadFile"]["tmp_name"][$i];

		$folder="media/";



		move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], "$folder".$_FILES["uploadFile"]["name"][$i]);
		$Savas="$folder".$_FILES["uploadFile"]["name"][$i];

echo "<img style='float:left;width:300px;height:200px;' src='$Savas'>";
	}



}



?>
</div>
</script>
<hr style="width:100%;padding-top:20px">
<a id="capture" href="" download="image">Resmi İndir</a>

  <script type="text/javascript">
        $(function(){


            //butona tıklandıgında div'i ss alarak html'e dönüstüren kısım

                //div'deki içerigi alıyor
                div_content = document.querySelector("#savas")
                //içerigi html5 canvasa ceviriyor
                html2canvas(div_content).then(function(canvas) {
                    //canvası jpeg'e cevirip kaydediyor
                    data = canvas.toDataURL('image/jpeg');

                    //php ile resmi kaydediyor
                    save_img(data);
                });

        });


        //canvas resmi kaydetmek icin
        function save_img(data){
            //ajax method.
            $.post('save_jpg.php', {data: data}, function(res){
                //iptal ettim
                if(res != ''){

                   					   var Savas =  'output/'+res+'.png';
$("#capture").attr("href","http://localhost/savas/"+Savas);
                }
                else{
					   var Savas =  'output/'+res+'.png';
$("#capture").attr("href","http://localhost/savas/"+Savas);

                }
            });
        }
    </script>
