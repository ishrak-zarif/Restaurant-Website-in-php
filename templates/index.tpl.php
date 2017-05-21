<?php require_once dirname(__FILE__) . '/header.inc.php';?>
    <div class="index_mid_images">
        <!--
        <div class="index_pics"> <img src="images/pic-1.png" alt="food image" border="0" width="255" height="150"/> </div>
        <div class="index_pics"> <img src="images/pic-2.png" alt="food image" border="0" width="255" height="150"/> </div>
        <div class="index_pics"> <img src="images/pic-3.png" alt="food image" border="0" width="255" height="150"/> </div>
        -->
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        	<div class="item active">
          	<img src="images/pic-1.png" alt="pic-1" width="850" height="350">
            <div class="carousel-caption">
            </div>
         	</div>
          <div class="item">
            <img src="images/pic-2.png" alt="pic-2" width="850" height="350">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="images/pic-3.png" alt="pic-3" width="850" height="350">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        	<span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
       </div>
       
      </div>
      
      <div class="index_main_body_content">
        <div class="welcome_text_area">
          <table width="93%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="welcome_title"> Welcome to BIG BUN </td>
              <td class="welcome_title_bg">&nbsp;</td>
            </tr>
          </table>
          <div class="werlcome_text">
          <?php echo (!empty($this->welcome_info['content']) ? html_entity_decode($this->welcome_info['content']) : '');?>
            
          </div>
        </div>
      </div>
      
  <?php require_once dirname(__FILE__) . '/footer.inc.php';?>