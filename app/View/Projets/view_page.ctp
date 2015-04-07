<?php
  //debug($projet);
  $citie = $projet['Citie'];
  $participations = $projet['Participation'];
  $artists = $projet['Artist'];
  $projet = $projet['Projet'];
?>
<button type="button" id="participer" value="login2" class="m-btn purple participer "
    style="float: right;margin-top: 8px;height: 47px;border: 1px solid whitesmoke;" >Je participe</button>
<div type="button" id="" value="share" data-title="<?= $projet['titre'];?>" data-desc="<?= $projet['presentation'];?>"
    data-img="http://openingstage.com/img/projets/<?= $projet['id'];?>/cover.jpg"
    data-url="http://openingstage.com/?type=projet_<?= $projet['id'];?>" class="m-btn share"
    style="float: right;border: 1px solid whitesmoke;color: black;">
    <img style="  width: 15px;" src="img/icons/like.png" style=""> Partager
</div>
<h2 style="text-align: left; border-bottom: 1px solid; padding-bottom: 20px;" ><?= $projet['titre'];?></h2>
<div class="span12 content projet" style="margin-left: 0;">
    <div class="span12 " style="min-height: 470px;
        position:relative;">
        <ul class="nav nav-tabs" id="myTab_projet">
            <li class="active"><span href="#project_presentation">Presentation</span></li>
            <li><span href="#project_participations">Participations</span></li>
            <li><span href="#project_comments">Commentaires</span></li>
        </ul>
        <div class="" id="_projets">
            <ul style="margin:0px;margin-top:20px;padding:0px;">
                <h3> <span> Presentation</span></h3>
                <p><?= $projet['presentation'];?></p>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="project_artists">
                <ul style="margin:0px;margin-top:20px;padding:0px;">
                    <h3>Artistes participants</h3>
                    <div id="gallery-artists" style="margin-top: 10px;" class="carousel slide horizontal span6 ">
                        <div class="carousel-inner ">
                          <?php foreach ($artists as $key=>$artist): ?>
                            <?php if ($key == 0): ?>
                              <div class="item active">
                                  <div class="row" style="text-align: center;">
                              <?php endif; ?>
                              <?php if ($key != 0 && ($key % 3) == 0): ?>
                              <div class="item inactive">
                                  <div class="row" style="text-align: center;">
                              <?php endif; ?>
                                    <div class="span2">
                                        <img class="img-circle" src="img/profils/0.jpg" alt="">
                                        <br/><br/>
                                        <span><?= $artist['groupe'];?></span>
                                    </div>
                              <?php if (($key % 3) == 2 || ($key == count($artists) - 1)): ?>
                                  </div>
                              </div>
                            <?php endif; ?>
                          <?php endforeach;?>
                        </div>
                        <button class="carousel-control left m-btn icn-only" href="#gallery-artists" data-slide="prev">
                        <i class="icon-chevron-left"></i>
                        </button>
                        <button class="carousel-control right m-btn icn-only" href="#gallery-artists" data-slide="next">
                        <i class="icon-chevron-right"></i>
                        </button>
                    </div>
                </ul>
            </div>
        </div>

        <!--
        <div class=" span6 divide" style="text-align: center;margin-top: 2%;">
          <div class="progressbar" value="'.$arr['infos'][0]->montant_cumul.'" final="'.$arr['infos'][0]->montant.'">
            <div class="progress-label">Loading...</div>
          </div>
          <div class="infos">
              <p style="display:none" class="invested">  </p>
              <p  class="timeleft">
                <strong >'.$arr['infos'][0]->days.' <small>days</small></strong>
                </br>
                <span id=""> restant </span><strong></strong>
              </p>
          </div>
          <div id="gallery_projet" style="margin-top: 10px;" class="carousel slide horizontal">
              <div class="carousel-inner" style="max-height:330px">
                  '.$html.'
              </div>
              <button class="carousel-control left m-btn icn-only" href="#gallery_projet" data-slide="prev"><i class="icon-chevron-left"></i></button>
              <button class="carousel-control right m-btn icn-only" href="#gallery_projet" data-slide="next"><i class="icon-chevron-right"></i></button>
          </div>
        </div>
        <div class="tab-pane" id="_projets">
            <ul style="margin:0px;margin-top:20px;padding:0px;">
                <h3> <span> Presentation</span></h3>
                <p><?= $projet['presentation'];?></p>
            </ul>
        </div>
        <div class="tab-pane " style="  overflow-y: auto;height: 432px;" id="project_participations">'.$participation.'</div>
        <div class="tab-pane" id="project_comments">
            <div class="commentaires" comment="'.$arr['infos'][0]->token.'">
                <div class="text">
                    '.get_comments($arr['infos'][0]->token).'
                </div>
                <div>
                    <textarea class="form-control comment_saisie color1" comment="'.$arr['infos'][0]->token.'" placeholder="Votre commentaire...." rows="3"></textarea>
                    <h4 id="comment_btn" comment="'.$arr['infos'][0]->token.'" class="m-btn purple" style="cursor: pointer;border-radius: 53px;padding: 30px 15px;">send</h4>
                </div>
            </div>
        </div>
        -->
        <script>
            $(function () {   
              $("#myTab_projet span").click(function(){
                $(this).tab("show");
              });  
              $("#participer").bind("click", function () {
                if (localStorage.user != "-1") {
                  $().interstitial("open", {
                    "url" : "html/participez.html"
                  });
                } else {
                  alert("veuillez vous enregistrer pour acceder à cette rubrique")
                }
              })
              localStorage.projet='.$param.'
            })
        </script> 
    </div>
</div>
