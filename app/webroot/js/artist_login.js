
artist=$('#artist');
artist_infos=artist.find("#ttab1");
get_artist();


artist_infos.find('#save_artist').click(function(){

	var d = new Date();
var n = d.getTime();
	    ret="true"
		  presentation=artist_infos.find('textarea[title="presentation"]').val();
		 
		  talent=artist_infos.find('select option:selected').val();
		  styles=artist_infos.find('input[title="styles"]').val();
		   groupe=artist_infos.find('input[title="groupe"]').val();
		  
		 
		   jQuery.post("php/w_login.php",{ method:'setArtistInfos' , styles:styles,groupe:groupe,presentation:presentation,talent: talent , id:localStorage.user , token:localStorage.token ,date:n } ,
	                                                             function(data){
																	 if(data.etat=="false"){alert(data.message) ;return}
																else{ 
																alert(data.message) 
														 $().interstitial('close');
																
																} 
																
                                                                   },"json");
		  
	});	
		function get_artist(){
		var d = new Date();
var n = d.getTime();
	 jQuery.get("php/w_login.php",{ method:'getArtistbyID' , id_artist:localStorage.user ,id:localStorage.user , token:localStorage.token ,date:n} ,
	                                                             function(data){
															if(data.length==0){artist.find("#artist_videos").remove();
														artist.find("#artist_photos").remove();return;}		
get_videos_artist();
get_artist_photos();															
                                     artist.find("#infos_generales_artist input").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
									   artist.find("#infos_generales_artist textarea").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
										 artist.find("select[title='talent']").val(data[0]['talent']);		
						
                                                                   },"json");
	
	}
	
	function get_videos_artist(){
	var d = new Date();
var n = d.getTime();

	  jQuery.get("php/w_admin.php",{ method:'getVideos' , type:'artist' , source:localStorage.user , id:localStorage.user , token:localStorage.token , date: n} ,
	                                                             function(data){
																 artist.find("#artist_videos").show();
																 if(data.etat=="false"){alert(data.message) ; alert("22");	return}
																else{ 	
	 artist.find('#ttab2 #table_videos').html('<tbody><tr><th scope="col"></th> <th scope="col">cover</th><th scope="col">title</th>  </tr>');
											i=0;
											  while(i<data.content.length){  
										 artist.find('#ttab2 #table_videos').append('<tr><td width="100"><label style="width:20px" class="checkbox inline"><input type="checkbox" id_video="'+data.content[i].ID+'" value="3"></label></td><td  width="150"><img src="http://i1.ytimg.com/vi/' +data.content[i].url+'/default.jpg" alt=""></td> <td>'+data.content[i].title+'</td></tr>');
																 
																  
																  ;i++}
																
								
																
																} 
														
                                                                   },"json");
	}
	
	artist.find("#ttab2 #add_video").click(function(){
	var d = new Date();
var n = d.getTime();	
title=  artist.find('#ttab2 #title_video').val()
url=artist.find('#ttab2 #url_video').val()
	
if(title=="" || url==""){alert("veuillez completer les informations vidéo") ; return;}
 artist.find('#ttab2 #title_video').val("")
artist.find('#ttab2 #url_video').val("")
jQuery.post("php/w_admin.php",{ method:'add_video' ,type:'artist',url:url,title:title, id_artist:localStorage.artist , id:localStorage.user , token:localStorage.token ,date:n } ,
	                                                             function(data){ 
												 get_videos_artist();					 
                                    				
                                                                   },"json");

  })	
		artist.find("#ttab2 #delete_video").click(function(){ 
			var d = new Date();
var n = d.getTime();
 var videos="0";
artist.find('#ttab2 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_video'); })
	
if(videos=="0"){alert("veuillez selectionner les vidéos à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_videos' ,type:'artist',videos:videos, id_artist:localStorage.artist ,id:localStorage.user , token:localStorage.token , date: n} ,
	                                                             function(data){
												 get_videos_artist();					 
                                    				
                                                                   },"json");

  })	 
		artist.find("#newsletter #submit").click(function(){
		sujet_new=$("#newsletter #sujet_news").val()
		message_new=$("#newsletter #message_news").val()
		if(sujet_new==""|| message_new==""){alert("veuillez bien remplir les champs");return;}
		 jQuery.post("php/w_admin.php",{ method:'sendnewsletter' ,id_artist:localStorage.artist,sujet:sujet_new,message:message_new, id:0 , token:0 } ,
	                                                             function(data){
															$(this).find("sujet_news").val("")	
                                                      $(this).find("message_news").val("")	
alert(data.message)													  
                                      },"json");
		
		})
	
function get_artist_photos(){
	var d = new Date();
var n = d.getTime();
		jQuery.get("php/w_admin.php",{ method:'getPhotos' , source:localStorage.user , type:'artistes_gallery' ,id:localStorage.user , token:localStorage.token,date:n } ,
	             function(data){
					 if(data.lenght==0){alert("repertoire vide") ;return}
					 else{ artist.find("#artist_videos").show();
							artist.find(' #gallery').html('');
							i=0;
							while(i<data.content.length){  
							 artist.find(' #gallery').append("<div style='text-align:center; border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span4'><img src='"+data.content[i]+"' />' <label style='width:20px' class='checkbox inline'><input type='checkbox' id_photo='"+data.content[i]+"' value='3'></label><h5 style=';margin-top:5px'>"+data.title[i]+"</h5></div>");
							 ;i++
							}
						} 
														
                 },"json");
				 
				 
		}	
		
		artist.find('#ttab3  #add_photo_artiste').bind("change", function(){handleFiles(this,'artiste');});
		
		
				function handleFiles(input,type){


var file = input.files[0];
	
	if (!file.type.match(/image.*/)) {
 alert('not a photo') ;
};
var img = document.createElement("img");
var reader = new FileReader();  
img.onload=function(e){

 if (type=="artiste"){ artist.find('#ttab3 #gallery').append("<div style='text-align:center border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span4'><img src='"+img.src+"' />' <label style='width:20px' class='checkbox inline'><input type='checkbox' id_photo='"+img.src+"' value='3'></label><h5 style='fmargin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.user+"/" +file.name.split('.')[0],type)}


}
reader.onload = function(e) {img.src = e.target.result ;}; reader.readAsDataURL(file);	
 
	}	
	
	
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
	
		artist.find("#delete_photo_artiste").click(function(){ 
 var videos="0";
artist.find('#gallery .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_photo'); })
	
if(videos=="0"){alert("veuillez selectionner des photos à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_photos' ,source:videos ,id:0 , token:0 } ,
	                                                             function(data){
												 get_artist_photos();					 
                                    				
                                                                   },"json");

  })	