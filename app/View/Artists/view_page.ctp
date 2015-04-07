<?php //debug($artist);?>


<div type="button" id="" value="login" like="token" class="m-btn like"
     style="float: right;border: 1px solid whitesmoke;color: black;">

     <img src="img/icons/like.png" style=""> 1298 </div>

<div type="button" id="" value="share" data-title="<?= $artist['Artist']['groupe'];?>"
     data-desc="<?= $artist['Artist']['introduction'];?>"
     data-img="http://openingstage.com/img/profils/smthing.jpg"
     data-url="http://openingstage.com/?type=artist_2" class="m-btn share"
     style="float: right;border: 1px solid whitesmoke;color: black;">

  <img style="width: 15px;" src="img/icons/like.png" style=""> Partager</div>
  <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>

<h2 style="text-align: left;
  border-bottom: 1px solid;
  padding-bottom: 20px;" ><?= $artist['Artist']['groupe'];?></h2>
<div class="span12 content projet" style="margin-left: 0;">
  <div class="span12 content artist" style="margin-left: 0;">
    <div class="span12 " style="min-height: 470px;
      position:relative;">
      <ul class="nav nav-tabs" id="myTab_artist">
        <li class="active"><span href="#_presentation">Presentation</span></li>
        <li><span href="#_projets">Projets</span></li>
        <li><span href="#_comments">Commentaires</span></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="_presentation">
          <ul style="margin:0px;margin-top:20px;padding:0px;">
          <img src="img/profils/0.jpg" class="img-circle cover"  >
          <h3>Presentation</h3>
          <p> <?= $artist['Artist']['presentation'];?> </p>
          <!--
          <ul style="margin:0px;margin-top:20px;padding:0px;">
            <h3> <span>Informations personnelles</span></h3>
            <li ><span>Date de naissance :</span> </li>
            <li ><span>ville :</span> </li>
            <li ><span>Genre : </span> </li>
            <li ><span>groupe :</span> </li>
          </ul>
        -->
        </div>
        <div class="tab-pane" id="_projets">
          <ul style="margin:0px;margin-top:20px;padding:0px;">
            <img src="img/profils/PARAM.jpg" class="img-circle cover"  >
            <h3> <span> Projets</span></h3>
            <p> </p>
            
          </ul>
        </div>
        <div class="tab-pane" comment="token" id="_comments">
          <div class="commentaires" comment="token">
            <div class="text">
              
            </div>
            <div>
              <textarea class="form-control comment_saisie color1" comment="token" placeholder="Votre commentaire...." rows="3"></textarea>
              <h4 id="comment_btn" comment="token" class="m-btn purple" style="cursor: pointer;border-radius: 53px;padding: 30px 15px;">send</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<div class=" span5 divide" style="text-align: center;margin-top: 0px;">
  <ul class="nav nav-tabs" id="myTab_artista">
    <li class="active"><span href="#artist_videos">Videos</span></li>
    <li><span href="#artist_photos">Photos</span></li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="artist_videos">
      <div id="ecran">
        <iframe width="100%" height="300" src="http://www.youtube.com/embed/VIDEO?&wmode=transparent&showinfo=0&theme=dark&frameborder=0&hd=1"></iframe>
      </div>
      <div id="carousel_horizontal_slide" style="margin-top: 10px;" class="carousel slide horizontal">
        <div class="carousel-inner">
          VIDEO
        </div>
        <button class="carousel-control left m-btn icn-only" href="#carousel_horizontal_slide" data-slide="prev"><i class="icon-chevron-left"></i></button>
        <button class="carousel-control right m-btn icn-only" href="#carousel_horizontal_slide" data-slide="next"><i class="icon-chevron-right"></i></button>
      </div>
    </div>
    <div class="tab-pane" id="artist_photos">
      <div id="gallery_projet" style="margin-top: 10px;" class="carousel slide horizontal">
        <div class="carousel-inner" style="max-height:330px">
          HTML
        </div>
        <button class="carousel-control left m-btn icn-only" href="#gallery_projet" data-slide="prev"><i class="icon-chevron-left"></i></button>
        <button class="carousel-control right m-btn icn-only" href="#gallery_projet" data-slide="next"><i class="icon-chevron-right"></i></button>
      </div>
    </div>
  </div>
</div>
-->
<script>
  $(function () {
	$("#myTab_artist span").click(function(){
	$(this).tab("show");});
	  $("#myTab_artista span").click(function(){
	  $(this).tab("show");});	 
	  /*$("meta[property=\'og\\:title\']").attr("content", '.'"'.$arr['infos'][0]->prenom.' '.$arr['infos'][0]->nom.'");
	  $("meta[property=\'og\\:description\']").attr("content", '.'"'.$arr['infos'][0]->biographie.'"'.');
	  $("meta[property=\'og\\:image\']").attr("content", '.'"img/profils/'.$param.'.jpg");
  $("meta[property=\'og\\:url\']").attr("content", '.'"http://openingstage.com/?type=artist&id='.$id_artist.'");*/
  
  
  })
</script>	
</div>