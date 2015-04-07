
var operation;
var    id_item;
artist=$('#artist')
projet=$('#projet')
salle=$('#salle')
localStorage.user='-1'
localStorage.token='-1'
localStorage.projet='-1'
localStorage.artist='-1'
localStorage.salle='-1'
$(document).ready(
	function() {  
		artist.find('#ttab0 #find').click(function(){
		cle= ""
		cle=  artist.find('#ttab0 #mot_cle').val()
		etat=artist.find('#ttab0 #etat option:selected').val()
		jQuery.get("php/w_admin.php",{ method:'getArtists' , cle:cle , etat:etat , id:0 , token:0 } ,
	       function(data){
			if(data.etat=="false"){alert(data.message) ;return}
																else{ 
	 artist.find('#ttab0 #table_artistes').html('<tbody><tr> <th scope="col">Nom</th><th scope="col">Prenom</th> <th scope="col">Date d\'inscription</th><th scope="col">etat</th> </tr>');
											i=0;
											  while(i<data.content.length){  
																   artist.find('#ttab0 #table_artistes').append('<tr class="item" id_artist="'+data.content[i].ID+'"><td>'+data.content[i].nom+' </td><td> '+data.content[i].prenom+'</td><td>'+data.content[i].date+'</td><td>'+data.content[i].etat+'</td></tr>');
																 
																  
																  ;i++}
																
								artist.find('#ttab0 #table_artistes tr.item').click(function(){get_artist($(this).attr('id_artist'))})	
																
																} 
														
                                                                   },"json");
		  
	  
	});
		
		function get_artist(id_artist){
	localStorage.artist=id_artist;
	 jQuery.get("php/w_admin.php",{ method:'getArtistbyID' , id_artist:id_artist ,id:0 , token:0 } ,
	                                                             function(data){
																	 
                                     artist.find("#infos_generales_artist input").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
									 artist.find("#infos_generales_artist select.etat").val(data[0]['etat'])
									  artist.find("#infos_generales_artist select.talent").val(data[0]['talent'])
									   artist.find("#infos_generales_artist textarea").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
												 artist.find('a[href="#ttab1"]').tab("show");	
			$("#title_user").html('<img alt="140x140" src="img/profils/'+data[0]['ID']+'.jpg" class="img-circle" width="50px" /> '+data[0]['prenom']+' '+data[0]['nom']+' ')				
                                                                   },"json");
	
	}
		artist.find('a[href="#ttab2"]').click(function(){get_videos_artist()})
		
		function get_videos_artist(){
	
	  jQuery.get("php/w_admin.php",{ method:'getVideos' , type:'artist' , source:localStorage.artist , id:0 , token:0 } ,
	                                                             function(data){
																	 if(data.etat=="false"){alert(data.message) ;return}
																else{ 
	 artist.find('#ttab2 #table_videos').html('<tbody><tr><th scope="col"></th> <th scope="col">cover</th><th scope="col">title</th>  </tr>');
											i=0;
											  while(i<data.content.length){  
										 artist.find('#ttab2 #table_videos').append('<tr><td width="100"><label class="checkbox inline"><input type="checkbox" id_video="'+data.content[i].ID+'" value="3"></label></td><td  width="150"><img src="http://i1.ytimg.com/vi/' +data.content[i].url+'/default.jpg" alt=""></td> <td>'+data.content[i].title+'</td></tr>');
																 
																  
																  ;i++}
																
								
																
																} 
														
                                                                   },"json");
	}
		artist.find("#ttab2 #add_video").click(function(){ 
title=  artist.find('#ttab2 #title_video').val()
url=artist.find('#ttab2 #url_video').val()
	
if(title=="" || url==""){alert("veuillez completer les informations vidéo") ; return;}
 artist.find('#ttab2 #title_video').val("")
artist.find('#ttab2 #url_video').val("")
jQuery.post("php/w_admin.php",{ method:'add_video' ,type:'artist',url:url,title:title, id_artist:localStorage.artist ,id:0 , token:0 } ,
	                                                             function(data){
												 get_videos_artist();					 
                                    				
                                                                   },"json");

  })	
		artist.find("#ttab2 #delete_video").click(function(){ 
 var videos="0";
artist.find('#ttab2 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_video'); })
	
if(videos=="0"){alert("veuillez selectionner les vidéos à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_videos' ,type:'artist',videos:videos, id_artist:localStorage.artist ,id:0 , token:0 } ,
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
		projet.find('#projet_0 #find').click(function(){
		
			cle= ""
			cle=  projet.find('#projet_0 #mot_cle').val()
			etat=projet.find('#projet_0 #etat option:selected').val()
			jQuery.get("php/w_admin.php",{ method:'getProjets' , cle:cle , etat:etat , id:0 , token:0 } ,
	        function(data){
				if(data.etat=="false"){alert(data.message) ;return}
				else{ 
						projet.find('#projet_0 #table_projets').html('<tbody><tr> <th scope="col">Titre</th><th scope="col">Date début</th> <th scope="col">Date fin</th><th scope="col">etat</th> <th scope="col">Montant cumulé</th><th scope="col">Montant total</th></tr>');
						i=0;
						while(i<data.content.length){  
																   projet.find('#projet_0 #table_projets').append('<tr class="item" id_projet="'+data.content[i].ID+'"><td>'+data.content[i].title+' </td><td> '+data.content[i].date_debut+'</td><td>'+data.content[i].date_fin+'</td><td>'+data.content[i].etat+'</td><td>'+data.content[i].montant_cumul+'</td><td>'+data.content[i].montant+'</td></tr>');
																 
																  
																  ;i++}
																
								projet.find('#projet_0 #table_projets tr.item').click(function(){get_projet($(this).attr('id_projet'))})	
																
																} 
														
                                                                   },"json");
		  
	  
	});
		function get_projet(id_projet){
			localStorage.projet=id_projet;
			jQuery.get("php/w_admin.php",{ method:'getProjetbyID' , id_projet:id_projet ,id:0 , token:0 } ,
	            function(data){
					projet.find("#infos_generales_projet input").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
					projet.find("#infos_generales_projet textarea").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
					projet.find("#infos_generales_projet select.etat").val(data[0]['etat'])
					projet.find("#infos_generales_projet select.taille").val(data[0]['taille'])
					projet.find('a[href="#projet_1"]').tab("show");	
					projet.find("#title_user").html(data[0]['title']+'<img alt="140x140" src="img/projets/'+data[0]['ID']+'/cover.jpg" class="" width="50px" /> ')				
projet.find("#name_ville").tokenInput("clear");
projet.find("#name_salle").tokenInput("clear");
					projet.find("#name_ville").tokenInput("add", {id: data[0]['ville'], nom: data[0]['ville']});       

projet.find("#name_salle").tokenInput("add", {id: data[0]['salle_id'], nom: data[0]['salle_nom']});             
				   },
				"json");
	
		}
		projet.find('a[href="#projet_2"]').click(function(){get_projets_artist()})
		projet.find('a[href="#projet_3"]').click(function(){get_projet_photos()})
		projet.find('a[href="#projet_4"]').click(function(){get_projet_participation()})
		salle.find('a[href="#salle_3"]').click(function(){get_salle_photos()})
		projet.find('#projet_0 #new').click(function(){
		            localStorage.projet=-1;
			        projet.find("#infos_generales_projet input").each(function(){   $(this).val("")  })  
					projet.find("#infos_generales_projet textarea").each(function(){   $(this).val( "")   })
					projet.find('a[href="#projet_1"]').tab("show");	
					projet.find("#title_user").html('<img alt="140x140" src="img/icons/menu/n03.png" class="img-circle" width="50px" /> '+'Nouveau projet')		
			
	  
	    });
	    projet.find('#projet_1 #save').click(function(){
		            idprojet=localStorage.projet;
		            idprojet=localStorage.projet;
			        etat=projet.find('#infos_generales_projet select.etat ').val();
					 taille=projet.find('#infos_generales_projet select.taille ').val();
					title=projet.find('#infos_generales_projet input[title="title"]').val();
					date_debut=projet.find('#infos_generales_projet input[title="date_debut"]').val();
					date_fin=projet.find('#infos_generales_projet input[title="date_fin"]').val();
					montant=projet.find('#infos_generales_projet input[title="montant"]').val();
					salle=projet.find('#infos_generales_projet input[title="salle"]').val();
					ville=projet.find('#infos_generales_projet input[title="ville"]').val();
				
					salle_prix=projet.find('#infos_generales_projet input[title="salle_prix"]').val();
					technique=projet.find('#infos_generales_projet input[title="technique"]').val();
					materiel=projet.find('#infos_generales_projet input[title="materiel"]').val(); 
					boisson=projet.find('#infos_generales_projet input[title="boisson"]').val();
					presentation=projet.find('#infos_generales_projet textarea[title="presentation"]').val();
				 jQuery.post("php/w_admin.php",{ method:'setProjetInfos' ,title:title, id_projet:idprojet ,etat:etat,date_debut:date_debut ,date_fin:date_fin,montant:montant,presentation:presentation,salle:salle,ville:ville,taille:taille, salle_prix:salle_prix , technique:technique, materiel:materiel , boisson:boisson,id:0 , token:0 } ,
	             function(data){
					alert(data.message)		; 
                    },
				"json");	
			
	  
     	}); 
		
		
		 artist.find('#save_artist').click(function(){
		            idartist=localStorage.artist;
		         
			        etat=artist.find('#infos_generales_artist select.etat ').val();
					
				 jQuery.post("php/w_admin.php",{ method:'setArtistInfos' , artist:idartist ,etat:etat,id:0 , token:0 } ,
	             function(data){
					alert(data.message)		; 
                    },
				"json");	
			
	  
     	}); 
		
		function get_projets_artist(){
	
			jQuery.get("php/w_admin.php",{ method:'getProjetsArtist' , source:localStorage.projet , id:0 , token:0 } ,
	             function(data){
					 if(data.etat=="false"){alert(data.message) ;return}
					 else{ 
							projet.find('#projet_2 #table_artists').html('<tbody><tr><th scope="col"></th> <th scope="col">cover</th><th scope="col">Nom</th>   </tr>');
							i=0;
							while(i<data.content.length){  
							 projet.find('#projet_2 #table_artists').append('<tr><td width="100"><label class="checkbox inline"><input type="checkbox" id_artist="'+data.content[i].ID+'" value="3"></label></td><td  width="150"><img class="img-circle"  src="img/profils/'+data.content[i].ID+'.jpg" alt=""></td> <td>'+data.content[i].nom+'</td></tr>');
							 ;i++
							}
						} 
														
                 },"json");
	}
		function get_projet_photos(){
		jQuery.get("php/w_admin.php",{ method:'getPhotos' , source:localStorage.projet , type:'projets' ,id:0 , token:0 } ,
	             function(data){
					 if(data.lenght==0){alert("repertoire vide") ;return}
					 else{ 
							projet.find('#projet_3 #gallery').html('');
							i=0;
							while(i<data.content.length){  
							 projet.find('#projet_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span2'><img src='"+data.content[i]+"' />' <label style='float:left' class='checkbox inline'><input type='checkbox' id_photo='"+data.content[i]+"' value='3'></label><h5 style='float:right;margin-top:5px'>"+data.title[i]+"</h5></div>");
							 ;i++
							}
						} 
														
                 },"json");
				 
				 
		}
		
		function get_projet_participation(){
		jQuery.get("php/w_admin.php",{ method:'getParticipations' , id_projet:localStorage.projet  ,id:0 , token:0 } ,
	             function(data){
					 if(data.lenght==0){alert("repertoire vide") ;return}
					 else{ 
							projet.find('#projet_4 #participer_table').html('');
							i=0;
							while(i<data.content.length){  
							 projet.find('#projet_4 #participer_table').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;text-align:center;' class='span2'><img class='img-circle'  src='img/profils/"+data.content[i].user_id
							 +".jpg' alt=''><h4 style='  margin: 10px;' >"+data.content[i].prenom+" "+data.content[i].nom+"</h4><h5 style='margin-top:5px'>"+data.content[i].montant+"€</h5><h5>Type : "+data.content[i].type_participation+"</h5> <label class='checkbox inline'><input type='checkbox' id_participation='"+
							 data.content[i].ID+"' value='3'></label></div>");
							 ;i++
							}
						} 
														
                 },"json");
				 
				 
		}
		function get_salle_photos(){
		jQuery.get("php/w_admin.php",{ method:'getPhotos' , source:localStorage.salle , type:'salles' ,id:0 , token:0 } ,
	             function(data){
					 if(data.lenght==0){alert("repertoire vide") ;return}
					 else{ 
							salle.find('#salle_3 #gallery').html('');
							i=0;
							while(i<data.content.length){  
							 salle.find('#salle_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span2'><img src='"+data.content[i]+"' />' <label style='float:left' class='checkbox inline'><input type='checkbox' id_photo='"+data.content[i]+"' value='3'></label><h5 style='float:right;margin-top:5px'>"+data.title[i]+"</h5></div>");
							 ;i++
							}
						} 
														
                 },"json");
		}
		projet.find("#name_artist").tokenInput("php/w_login.php?method=getlist&param=user&id="+localStorage.user+"&token="+localStorage.token , {tokenValue:'id' ,theme: "facebook"}); 
		projet.find("#name_client").tokenInput("php/w_login.php?method=getlist&param=user&id="+localStorage.user+"&token="+localStorage.token , {tokenValue:'id' ,theme: "facebook"}); 
		
		projet.find("#name_ville").tokenInput("php/w_login.php?method=getlist&param=cities&id="+localStorage.user+"&token="+localStorage.token , {tokenValue:'nom' ,theme: "facebook"}); 
		projet.find("#name_salle").tokenInput("php/w_login.php?method=getlist&param=salle&id="+localStorage.user+"&token="+localStorage.token , {tokenValue:'id' ,theme: "facebook"}); 
		
		projet.find("#projet_2 #add_artist").click(function(){ 
			id_artist=  projet.find('#projet_2 #name_artist').val()
			if(id_artist=="" ){alert("veuillez completer les informations : artiste") ; return;}
			if(localStorage.projet=='-1'){alert("veuillez selectionner un projet valide") ; return;}
			jQuery.post("php/w_admin.php",{ method:'add_artist_projet' ,type:'artist',id_artist:id_artist, id_projet:localStorage.projet ,id:0 , token:0 } ,
	                                                             function(data){
												                  get_projets_artist();					 
                                    				
                                                                   },"json");

  })	
  
  projet.find("#projet_4 #add_participation").click(function(){ 
			id_artist=  projet.find('#projet_4 #name_client').val()
			montant=  projet.find('#projet_4 #montant_participation').val()
			type=  projet.find('#projet_4 #type_participation').val()
			if(id_artist=="" ){alert("veuillez completer les informations : client") ; return;}
			if(localStorage.projet=='-1'){alert("veuillez selectionner un projet valide") ; return;}
			jQuery.post("php/w_admin.php",{ method:'add_participation_projet' ,montant:montant,type:type,id_artist:id_artist, id_projet:localStorage.projet ,id:0 , token:0 } ,
	                                                             function(data){
												                  get_projet_participation();					 
                                    				
                                                                   },"json");

  })
  
  
		projet.find("#projet_2 #delete_artist").click(function(){ 
 var videos="0";
projet.find('#projet_2 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_artist'); })
	
if(videos=="0"){alert("veuillez selectionner des artistes à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_artists_projet' ,id_artist:videos, id_projet:localStorage.projet ,id:0 , token:0 } ,
	                                                             function(data){
												 get_projets_artist();					 
                                    				
                                                                   },"json");

  })	 

		projet.find("#projet_4 #delete_participation").click(function(){ 
 var videos="0";
projet.find('#projet_4 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_participation'); })
	
if(videos=="0"){alert("veuillez selectionner des artistes à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_participation_projet' ,id_participation:videos, id_projet:localStorage.projet ,id:0 , token:0 } ,
	                                                             function(data){
												 get_projet_participation();					 
                                    				
                                                                   },"json");

  })

  
		projet.find("#projet_3 #delete_photo_projet").click(function(){ 
 var videos="0";
projet.find('#projet_3 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_photo'); })
	
if(videos=="0"){alert("veuillez selectionner des photos à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_photos' ,source:videos ,id:0 , token:0 } ,
	                                                             function(data){
												 get_projet_photos();					 
                                    				
                                                                   },"json");

  })	 

		projet.find('#projet_3  #add_photo_projet').bind("change", function(){handleFiles(this,'projet');});  
      artist.find('#ttab3  #add_photo_artiste').bind("change", function(){handleFiles(this,'artiste');});		
  
		function handleFiles(input,type){


var file = input.files[0];
	
	if (!file.type.match(/image.*/)) {
 alert('not a photo') ;
};
var img = document.createElement("img");
var reader = new FileReader();  
img.onload=function(e){
if(type=="projet"){
 projet.find('#projet_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span2'><img src='"+img.src+"' />' <label style='float:left' class='checkbox inline'><input type='checkbox' id_photo='"+img.src+"' value='3'></label><h5 style='float:right;margin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.projet+"/" +file.name.split('.')[0],type)
 }
 else if (type=="salle"){ salle.find('#salle_3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span2'><img src='"+img.src+"' />' <label style='float:left' class='checkbox inline'><input type='checkbox' id_photo='"+img.src+"' value='3'></label><h5 style='float:right;margin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.salle+"/" +file.name.split('.')[0],type)}
 else if (type=="artiste"){ artist.find('#ttab3 #gallery').append("<div style=' border: 1px solid rgb(134, 112, 112); padding: 5px;' class='span2'><img src='"+img.src+"' />' <label style='float:left' class='checkbox inline'><input type='checkbox' id_photo='"+img.src+"' value='3'></label><h5 style='float:right;margin-top:5px'>"+file.name.split('.')[0]+".jpg</h5></div>");
 upload_photo( img  ,localStorage.artist+"/" +file.name.split('.')[0],type)}


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
	    salle.find('#salle_0 #find').click(function(){
		
			cle= ""
			cle=  salle.find('#salle_0 #mot_cle').val()
			etat=salle.find('#salle_0 #etat option:selected').val()
			jQuery.get("php/w_admin.php",{ method:'getsalles' , cle:cle , etat:etat , id:0 , token:0 } ,
	        function(data){
				if(data.etat=="false"){alert(data.message) ;return}
				else{ 
						salle.find('#salle_0 #table_salles').html('<tbody><tr> <th scope="col">Titre</th><th scope="col">Reponsable</th> <th scope="col">Ville</th><th scope="col">Etat</th> </tr>');
						i=0;
						while(i<data.content.length){  
																   salle.find('#salle_0 #table_salles').append('<tr class="item" id_salle="'+data.content[i].ID+'"><td>'+data.content[i].title+' </td><td> '+data.content[i].responsable+'</td><td>'+data.content[i].ville+'</td><td>'+data.content[i].etat+'</td></tr>');
																 
																  
																  ;i++}
																
								salle.find('#salle_0 #table_salles tr.item').click(function(){get_salle($(this).attr('id_salle'))})	
																
																} 
														
                                                                   },"json");
		  
	  
	});
		function get_salle(id_salle){
			localStorage.salle=id_salle;
			jQuery.get("php/w_admin.php",{ method:'getsallebyID' , id_salle:id_salle ,id:0 , token:0 } ,
	            function(data){
					salle.find("#infos_generales_salle input").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
					salle.find("#infos_generales_salle textarea").each(function(){   $(this).val( data[0][ $(this).attr('title')]  )   })
					salle.find("#infos_generales_salle select").val(data[0]['etat'])
					salle.find('a[href="#salle_1"]').tab("show");	
					salle.find("#title_user").html(data[0]['title']+'<img alt="140x140" src="img/salles/'+data[0]['ID']+'/cover.jpg" class="" width="50px" /> ')				
                    },
				"json");
	
		}
		salle.find('#salle_0 #new').click(function(){
		            localStorage.salle=0;
			        salle.find("#infos_generales_salle input").each(function(){   $(this).val("")  })  
					salle.find("#infos_generales_salle textarea").each(function(){   $(this).val( "")   })
					salle.find('a[href="#salle_1"]').tab("show");	
					salle.find("#title_user").html('<img alt="140x140" src="img/icons/menu/n03.png" class="img-circle" width="50px" /> '+'Nouvelle salle')		
			
	  
	    });
	    salle.find('#salle_1 #save').click(function(){
		            idsalle=localStorage.salle;
		           
			        etat=salle.find('#infos_generales_salle select ').val();;
					title=salle.find('#infos_generales_salle input[title="title"]').val();
					adresse=salle.find('#infos_generales_salle input[title="adresse"]').val();
					ville=salle.find('#infos_generales_salle input[title="ville"]').val();
					latitude=salle.find('#infos_generales_salle input[title="latitude"]').val();
					longitude=salle.find('#infos_generales_salle input[title="longitude"]').val();
					responsable=salle.find('#infos_generales_salle input[title="responsable"]').val();
					
					presentation=salle.find('#infos_generales_salle textarea[title="presentation"]').val();
				 jQuery.post("php/w_admin.php",{ method:'setsalleInfos' ,title:title, id_salle:idsalle ,etat:etat,responsable:responsable ,longitude:longitude,latitude:latitude,ville:ville,adresse:adresse,presentation:presentation,id:0 , token:0} ,
	             function(data){
					alert(data.message)			
                    },
				"json");	
			
	  
     	}); 
		salle.find("#salle_3 #delete_photo_salle").click(function(){ 
 var videos="0";
salle.find('#salle_3 .checkbox input:checked').each(function(){ videos=videos+","+$(this).attr('id_photo'); })
	
if(videos=="0"){alert("veuillez selectionner des photos à supprimer") ; return;}
jQuery.post("php/w_admin.php",{ method:'delete_photos' ,source:videos ,id:0 , token:0 } ,
	                                                             function(data){
												 get_salle_photos();					 
                                    				
                                                                   },"json");

  })	 

		salle.find('#salle_3  #add_photo_salle').bind("change", function(){handleFiles(this,'salle');});  	
  
	});