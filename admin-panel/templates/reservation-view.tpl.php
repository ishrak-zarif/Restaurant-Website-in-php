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
      <h2>View Reservation</h2>
      </div>
      
      <div id="forms">
            <div class="form">
                <div class="fields">
                    <div class="field">
                        <div class="label label-select">
                            <label>Reservation Name:</label>
                        </div>
                        <div class="input">
                            <?php echo $this->reservation_info['reservation_name'];?>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>Reservation Date:</label>
                        </div>
                        <div class="input">
                            <?php echo $this->reservation_info['reservation_date'];?>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label label-textarea">
                            <label>No. of Tables:</label>
                        </div>
                        <div class="input">
                            <?php echo $this->reservation_info['no_of_tables'];?>
                        </div>
                    </div>
                    <div class="field">
                    		<div style="width:100%; float:left;">
                        <div class="label">
                            <label><strong>Customer Information:</strong></label>
                        </div>
                        </div>
                        <div class="customerInfo">
                          <div class="label label-textarea">
                              <label>Customer Name:</label>
                          </div>
                          <div class="textarea">
                              <?php echo $this->reservation_info['customer_name'];?>
                          </div>
                        </div>
                        <div class="customerInfo">
                          <div class="label label-textarea">
                              <label>Customer Phone:</label>
                          </div>
                          <div class="textarea">
                              <?php echo $this->reservation_info['customer_phone'];?>
                          </div>
                        </div>
                        <div class="customerInfo">
                          <div class="label label-textarea">
                              <label>Customer Email:</label>
                          </div>
                          <div class="textarea">
                              <?php echo $this->reservation_info['customer_eamil'];?>
                          </div>
                        </div>
                    </div>                    
                </div>
            </div>
    </div>
      <!-- end content boxes --> 
    </div>
    <!-- end right --> 
  </div>
</div>
<!-- end content -->
<?php require_once dirname(__FILE__) . '/footer.inc.php';?>