salle=$('#salle')
  localStorage.salle=0; 
get_salle();

		function get_salle(){
			var d = new Date();
var n = d.getTime();

			
			jQuery.get("php/w_admin.php",{ method:'getsallebyUser' , id_salle:localStorage.user ,id:localStorage.user , token:localStorage.token,date:n } ,
	            function(data){
				if(data.length==0){salle.find('#menu_salle_3').remove();return;}
					salle.find("#infos_generales_salle input").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
					salle.find("#infos_generales_salle textarea").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
					salle.find("#title_user").html(data[0]['title']+'<img alt="140x140" src="img/salles/'+data[0]['ID']+'/cover.jpg" class="" width="50px" /> ')				
                  localStorage.salle=data[0]['ID'];  },
				"json");
	
		}
	 salle.find('#salle_1 #save').click(function(){
	 
	 var d = new Date();
var n = d.getTime();
		            idsalle=localStorage.salle;
		           
			        etat=salle.find('#infos_generales_salle select ').val();;
					title=salle.find('#infos_generales_salle input[title="title"]').val();
					adresse=salle.find('#infos_generales_salle input[title="adresse"]').val();
					ville=salle.find('#infos_generales_salle input[title="ville"]').val();
					latitude=salle.find('#infos_generales_salle input[title="latitude"]').val();
					longitude=salle.find('#infos_generales_salle input[title="longitude"]').val();
					responsable=salle.find('#infos_generales_salle input[title="responsable"]').val();
					presentation=salle.find('#infos_generales_salle textarea[title="presentation"]').val();
					phone=salle.find('#infos_generales_salle input[title="phone"]').val();
					programmation=salle.find('#infos_generales_salle textarea[title="programmation"]').val();
				 jQuery.post("php/w_admin.php",{ method:'setsalleInfos' ,title:title, id_salle:idsalle ,etat:etat,responsable:responsable ,longitude:longitude,latitude:latitude,ville:ville,adresse:adresse,presentation:presentation,id:localStorage.user , token:localStorage.token,date:n ,phone:phone,programmation:programmation } ,
	             function(data){
					alert(data.message)		;	$().interstitial('close');
                    },
				"json");	
			
	  
     	}); 
		salle.find("#salle_3 #delete_photo_salle").click(function(){ 
		var d = new Date();
var n = d.getTime();
 var videos="0";
salle.find('#salle_3 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_photo'); })
	
if(videos=="0"){alert("veuillez selectionner des photos à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_photos' ,source:videos ,id:localStorage.user , token:localStorage.token ,date:n} ,
	                                                             function(data){
												 get_salle_photos();					 
                                    				
                                                                   },"json");

  })	 

		salle.find('#salle_3  #add_photo_salle').bind("change", function(){handleFiles(this,'salle');});  	
  
  
  function handleFiles(input,type){


var file = input.files[0];
	
	if (!file.type.match(/image.*/)) {
 alert('not a photo') ;
};
var img = document.createElement("img");
var reader = new FileReader();  
img.onload=function(e){
if(type=="projet"){
 projet.find('#projet_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px; text-align:center' class='span2'><img src='"+img.src+"' />' <label style='' class='checkbox inline'><input type='checkbox' style='width:20px' id_photo='"+img.src+"' value='3'></label><h5 style=';margin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.projet+"/" +file.name.split('.')[0],type)
 }
 else if (type=="salle"){ salle.find('#salle_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;text-align:center' class='span2'><img src='"+img.src+"' />' <label style='float:' class='checkbox inline'><input type='checkbox' style='width:20px'  id_photo='"+img.src+"' value='3'></label><h5 style='float:;margin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.salle+"/" +file.name.split('.')[0],type)}
 else if (type=="artiste"){ artist.find('#ttab3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: text-align:center'  class='span2'><img src='"+img.src+"' />' <label style='float:' class='checkbox inline'><input type='checkbox' id_photo='"+img.src+"' value='3'></label><h5 style='float:;margin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.artist+"/" +file.name.split('.')[0],type)}


}
reader.onload = function(e) {img.src = e.target.result ;}; reader.readAsDataURL(file);	
 
	}	
	
	function get_salle_photos(){
	var d = new Date();
var n = d.getTime();
		jQuery.get("php/w_admin.php",{ method:'getPhotos' , source:localStorage.salle , type:'salles' ,id:localStorage.user , token:localStorage.token ,date:n} ,
	             function(data){
					 if(data.lenght==0){alert("repertoire vide") ;return}
					 else{ 
							salle.find('#salle_3 #gallery').html('');
							i=0;
							while(i<data.content.length){  
							 salle.find('#salle_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;text-align:center' class='span2'><img src='"+data.content[i]+"' />' <label style='float:' class='checkbox inline'><input type='checkbox'  style='width:20px' id_photo='"+data.content[i]+"' value='3'></label><h5 style='float:;margin-top:5px'>"+data.title[i]+"</h5></div>");
							 ;i++
							}
						} 
														
                 },"json");
		}
		salle.find('a[href="#salle_3"]').click(function(){get_salle_photos()})
		function upload_photo( img  , name,type){
var canvas = document.createElement("canvas");
var ctx = canvas.getContext("2d");
var MAX_WIDTH = 480;
var MAX_HEIGHT = 510;
var width = img.naturalWidth;
var height = img.naturalHeight;

if (width > height) {
  if (width > MAX_WIDTH) {
    height *= MAX_WIDTH / width;
    width = MAX_WIDTH;
  }
} else {
  if (height > MAX_HEIGHT) {
    width *= MAX_HEIGHT / height;
    height = MAX_HEIGHT;
  }
} 
canvas.width = MAX_WIDTH;
canvas.height = MAX_HEIGHT;
ctx.drawImage(img, 0, 0 , MAX_WIDTH ,MAX_HEIGHT);


var fd = new FormData();
var dataurl = canvas.toDataURL("image/jpg");
var url =" php/upload.php" ;
fd.append("method", "upload");
fd.append("nom", name);
fd.append("photo", dataurl);
fd.append("rep", type);
fd.append("key", "××××××××××××");
var xhr = new XMLHttpRequest();
xhr.open("POST", url); 
xhr.send(fd); 




	
	}
	   
		