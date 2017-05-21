<?php 
$use_richarea = true;
$width = 420;
$height = 200;
require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>Edit Category</h2>
      </div>
      <?php if (!empty($this->err)) {?>
      	<p class="errMsg"><?php echo $this->err;?></p>
      <?php } else if (!empty($this->msg)) {?>
      	<p class="successMsg"><?php echo $this->msg;?></p>
      <?php } ?>
      <div id="forms">
        <form action="<?php echo $this->action;?>" method="post">
            <div class="form">
                <div class="fields">
                    <div class="field">
                        <div class="label label-select">
                            <label for="category"><span class="star">*</span>Select Menu:</label>
                        </div>
                        <div class="select">
                            <?php if (!empty($this->menu_list) && is_array($this->menu_list) && count($this->menu_list)) {?>
                            <select id="menu_id" name="menu_id">
                            	<option value="">-- Selece menu --</option>
								<?php foreach($this->menu_list as $mkey=>$mval){
									?><option value="<?php echo $mval['id'];?>" <?php echo (!empty($this->err) && $this->menu_id == $mval['id'] ? 'selected' : (isset($this->category_info['menu_id']) && $this->category_info['menu_id'] == $mval['id'] ? 'selected' : ''));?>><?php echo $mval['title'];?></option><?php
								}//end foeach?>
                            </select>
                            <?php }//end if?>
                        </div>
                            <span class="star starForSelect">*</span>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label><span class="star">*</span>Title:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="title" value="<?php echo (!empty($this->err) ? $this->title : (isset($this->category_info['title']) ? $this->category_info['title'] : ''));?>" />
                            <span class="star">*</span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label label-textarea">
                            <label for="article">Short Desctiption:</label>
                        </div>
                        <div class="textarea">
                            <textarea id="short_description" name="short_description" class="inputRichArea" cols="50" rows="15"><?php echo (!empty($this->err) ? $this->short_description : (isset($this->category_info['short_description']) ? $this->category_info['short_description'] : ''));?></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>Sequence:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="sequence" value="<?php echo (!empty($this->err) ? $this->sequence : (isset($this->category_info['sequence']) ? $this->category_info['sequence'] : ''));?>" />
                        </div>
                    </div>
                    <div class="buttons">
                    	<input type="hidden" name="cid" value="<?php echo $this->cid;?>" />
                        <input type="submit" name="submit" value="Submit" />
                        <input type="reset" name="reset" value="Reset" />
                    </div>
                </div>
            </div>
        </form>
    </div>
      <!-- end content boxes --> 
    </div>
    <!-- end right --> 
  </div>
</div>
<!-- end content -->
<?php require_once dirname(__FILE__) . '/footer.inc.php';?>