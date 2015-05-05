<?php if ( ! defined('BASE_PATH') ) exit('No direct script access allowed');
/**
 * View Staff View
 *  
 * PHP 5.4+
 *
 * eduTrac(tm) : Student Information System (http://www.7mediaws.org/)
 * @copyright (c) 2013 7 Media Web Solutions, LLC
 * 
 * @link        http://www.7mediaws.org/
 * @since       3.0.0
 * @package     eduTrac
 * @author      Joshua Parker <josh@7mediaws.org>
 */
$app = \Liten\Liten::getInstance();
$app->view->extend('_layouts/dashboard');
$app->view->block('dashboard');
$message = new \app\src\Messages;
?>

<script type="text/javascript">
$(".panel").show();
setTimeout(function() { $(".panel").hide(); }, 10000);
</script>

<ul class="breadcrumb">
	<li><?=_t( 'You are here' );?></li>
	<li><a href="<?=url('/');?>dashboard/<?=bm();?>" class="glyphicons dashboard"><i></i> <?=_t( 'Dashboard' );?></a></li>
	<li class="divider"></li>
	<li><a href="<?=url('/');?>staff/<?=bm();?>" class="glyphicons search"><i></i> <?=_t( 'Search Staff' );?></a></li>
    <li class="divider"></li>
	<li><?=_t( 'View Staff' );?></li>
</ul>

<h3><?=get_name(_h($staff[0]['staffID']));?>: <?=_t( 'ID#' );?> <?=_h($staff[0]['staffID']);?></h3>
<div class="innerLR">
    
    <?=$message->flashMessage();?>

	<!-- Form -->
	<form class="form-horizontal margin-none" action="<?=url('/');?>v1/staff/staffID/<?=_h($staff[0]['staffID']);?>/" id="validateSubmitForm" method="post" autocomplete="off">
		
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
		
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading"><font color="red">*</font> <?=_t( 'Indicates field is required' );?></h4>
			</div>
			<!-- // Widget heading END -->
            
            <!-- Tabs Heading -->
            <div class="tabsbar">
                <ul>
                    <li class="glyphicons user"><a href="<?=url('/');?>hr/<?=_h($staff[0]['staffID']);?>/"><i></i> <?=get_name(_h($staff[0]['staffID']));?></a></li>
                    <li class="glyphicons nameplate active"><a href="<?=url('/');?>staff/<?=_h($staff[0]['staffID']);?>/" data-toggle="tab"><i></i> <?=_t( 'Staff Record' );?></a></li>
                    <li class="glyphicons folder_open tab-stacked"><a href="<?=url('/');?>hr/positions/<?=_h($staff[0]['staffID']);?>/"><i></i> <?=_t( 'View Positions' );?></a></li>
                    <li class="glyphicons circle_plus tab-stacked"><a href="<?=url('/');?>hr/add/<?=_h($staff[0]['staffID']);?>/"><i></i> <span><?=_t( 'Add Position' );?></span></a></li>
                </ul>
            </div>
            <!-- // Tabs Heading END -->
			
			<div class="widget-body">
			
				<!-- Row -->
				<div class="row">
					<!-- Column -->
					<div class="col-md-6">
						
						<!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="address"><?=_t( 'Address' );?></label>
                            <div class="col-md-8">
                                <input class="form-control col-md-3" type="text" readonly value="<?=_h($addr[0]['address1']);?> <?=_h($addr[0]['address2']);?>" />
                                <input class="form-control col-md-3" type="text" readonly value="<?=_h($addr[0]['city']);?> <?=_h($addr[0]['state']);?> <?=_h($addr[0]['zip']);?>" />
                            </div>
                        </div>
                        <!-- // Group END -->
						
						<!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Title' );?></label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control" value="<?=getStaffJobTitle(_h($staff[0]['staffID']));?>" />
                            </div>
                        </div>
                        <!-- // Group END -->
						
						<!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Building' );?></label>
                            <div class="col-md-8">
                                <select name="buildingCode"<?=staio();?> class="selectpicker form-control" data-style="btn-info" data-size="10" data-live-search="true">
                                    <option value="NULL">&nbsp;</option>
                                    <?php table_dropdown('building','buildingCode <> "NULL"','buildingCode','buildingCode','buildingName',_h($staff[0]['buildingCode'])); ?>
                                </select>
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Office' );?></label>
                            <div class="col-md-8">
                                <select name="officeCode"<?=staio();?> class="selectpicker form-control" data-style="btn-info" data-size="10" data-live-search="true">
                                    <option value="NULL">&nbsp;</option>
                                    <?php table_dropdown('room','roomCode <> "NULL"','roomCode','roomCode','roomNumber',_h($staff[0]['officeCode'])); ?>
                                </select>
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Office Phone' );?></label>
                            <div class="col-md-8">
                                <input type="text" name="office_phone"<?=staio();?> class="form-control" value="<?=_h($staff[0]['office_phone']);?>" />
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'School' );?></label>
                            <div class="col-md-8">
                                <select name="schoolCode"<?=staio();?> class="selectpicker form-control" data-style="btn-info" data-size="10" data-live-search="true">
                                    <option value="NULL">&nbsp;</option>
                                    <?php table_dropdown('school','schoolCode <> "NULL"','schoolCode','schoolCode','schoolName',_h($staff[0]['schoolCode'])); ?>
                                </select>
                            </div>
                        </div>
                        <!-- // Group END -->
						
					</div>
					<!-- // Column END -->
					
					<!-- Column -->
					<div class="col-md-6">
						
						<!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><font color="red">*</font> <?=_t( 'Department' );?></label>
                            <div class="col-md-8">
                                <select name="deptCode"<?=staio();?> class="selectpicker form-control" data-style="btn-info" data-size="10" data-live-search="true" requied>
                                    <option value="NULL">&nbsp;</option>
                                    <?php table_dropdown('department','deptCode <> "NULL"','deptCode','deptCode','deptName',_h($staff[0]['deptCode'])); ?>
                                </select>
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><font color="red">*</font> <?=_t( 'Status' );?></label>
                            <div class="col-md-8">
                                <select name="status"<?=staio();?> class="selectpicker form-control" data-style="btn-info" data-size="10" data-live-search="true" required>
                                    <option value="">&nbsp;</option>
                                    <option value="A"<?=selected('A',_h($staff[0]['status']),false);?>><?=_t( 'A Active' );?></option>
                                    <option value="I"<?=selected('I',_h($staff[0]['status']),false);?>><?=_t( 'I Inactive' );?></option>
                                </select>
                            </div>
                        </div>
                        <!-- // Group END -->
					    
					    <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Email' );?></label>
                            <div class="col-md-8">
                                <input type="text" readonly class="form-control" value="<?=_h($addr[0]['email']);?>" />
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Add Date' );?></label>
                            <div class="col-md-8">
                                <input type="text" readonly value="<?=date('D, M d, o',strtotime(_h($staff[0]['addDate'])));?>" class="form-control" />
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Approved By' );?></label>
                            <div class="col-md-8">
                                <input type="text" readonly value="<?=get_name(_h($staff[0]['approvedBy']));?>" class="form-control" />
                            </div>
                        </div>
                        <!-- // Group END -->
                        
                        <!-- Group -->
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?=_t( 'Last Update' );?></label>
                            <div class="col-md-8">
                                <input type="text" readonly value="<?=date('D, M d, o @ h:i A',strtotime(_h($staff[0]['LastUpdate'])));?>" class="form-control" />
                            </div>
                        </div>
                        <!-- // Group END -->
						
					</div>
					<!-- // Column END -->
				</div>
				<!-- // Row END -->
				
				<hr class="separator" />
				
				<!-- Form actions -->
				<div class="form-actions">
					<button type="submit"<?=staids();?> class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?=_t( 'Save' );?></button>
					<button type="button" class="btn btn-icon btn-primary glyphicons circle_minus" onclick="window.location='<?=url('/');?>staff/<?=bm();?>'"><i></i><?=_t( 'Cancel' );?></button>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->
		
	</form>
	<!-- // Form END -->
	
</div>	
		
		</div>
		<!-- // Content END -->
<?php $app->view->stop(); ?>