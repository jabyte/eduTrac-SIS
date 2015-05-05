<?php if ( ! defined('BASE_PATH') ) exit('No direct script access allowed');
/**
 * Manage Courses View
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
?>

<ul class="breadcrumb">
	<li><?=_t( 'You are here' );?></li>
	<li><a href="<?=url('/');?>dashboard/<?=bm();?>" class="glyphicons dashboard"><i></i> <?=_t( 'Dashboard' );?></a></li>
	<li class="divider"></li>
	<li><?=_t( 'Courses' );?></li>
</ul>

<h3><?=_t( 'Search Course' );?></h3>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
		
			<div class="tab-pane" id="search-users">
				<div class="widget widget-heading-simple widget-body-white margin-none">
					<div class="widget-body">
						
						<div class="widget widget-heading-simple widget-body-simple text-right form-group">
							<form class="form-search text-center" action="<?=url('/');?>crse/<?=bm();?>" method="post" autocomplete="off">
							  	<input type="text" name="crse" class="form-control" placeholder="Search subject or course code . . . " /> 
							</form>
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="separator bottom"></div>
			
			<?php if(isset($_POST['crse'])) { ?>
			<!-- Table -->
			<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th class="text-center"><?=_t( 'Course Code' );?></th>
						<th class="text-center"><?=_t( 'Short Title' );?></th>
						<th class="text-center"><?=_t( 'Status' );?></th>
						<th class="text-center"><?=_t( 'Effective Date' );?></th>
						<th class="text-center"><?=_t( 'End Date' );?></th>
						<th class="text-center"><?=_t( 'Actions' );?></th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
				<?php if($crse != '') : foreach($crse as $k => $v) { ?>
                <tr class="gradeX">
                    <td class="text-center"><?=_h($v['courseCode']);?></td>
                    <td class="text-center"><?=_h($v['courseShortTitle']);?></td>
                    <td class="text-center"><?=_h($v['Status']);?></td>
                    <td class="text-center"><?=_h($v['startDate']);?></td>
                    <td class="text-center"><?=(_h($v['endDate']) > '0000-00-00' ? _h($v['endDate']) : '');?></td>
                    <td class="text-center">
                    	<div class="btn-group dropup">
                            <button class="btn btn-default btn-xs" type="button"><?=_t( 'Actions' ); ?></button>
                            <button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button">
                                <span class="caret"></span>
                                <span class="sr-only"><?=_t( 'Toggle Dropdown' ); ?></span>
                            </button>
                            <ul role="menu" class="dropdown-menu dropup-text pull-right">
                                <li><a href="<?=url('/');?>crse/<?=_h($v['courseID']);?>/<?=bm();?>"><?=_t( 'View' ); ?></a></li>
                                <li<?=ae('add_course');?>><a href="#crse<?=_h($v['courseID']);?>" data-toggle="modal"><?=_t( 'Clone' ); ?></a></li>
                                <?php if(_h($v['currStatus']) == _t( 'A' ) && _h($v['endDate']) == '0000-00-00') : ?>
                                <li<?=ae('add_course_sec');?>><a href="<?=url('/');?>sect/add/<?=_h($v['courseID']);?>/<?=bm();?>"><?=_t( 'Create Section' ); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </td>
                </tr>
				<?php } endif; ?>
				</tbody>
				<!-- // Table body END -->
				
			</table>
			<!-- // Table END -->
			
			<?php } ?>
			
			<?php if($crse != '') : foreach($crse as $k => $v) { ?>
		    <!-- Modal -->
            <div class="modal fade" id="crse<?=_h($v['courseID']);?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal heading -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title"><?=_h($v['courseShortTitle']);?> <?=_h($v['courseCode']);?></h3>
                        </div>
                        <!-- // Modal heading END -->
                        <!-- Modal body -->
                        <div class="modal-body">
                            <p><?=_t( "Are you sure you want to create a copy of this course?" );?></p>
                        </div>
                        <!-- // Modal body END -->
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="<?=url('/');?>crse/clone/<?=_h($v['courseID']);?>/<?=bm();?>" class="btn btn-default"><?=_t( 'Yes' );?></a>
                            <a href="#" class="btn btn-primary" data-dismiss="modal"><?=_t( 'No' );?></a> 
                        </div>
                        <!-- // Modal footer END -->
                    </div>
                </div>
            </div>
            <!-- // Modal END -->
			<?php } endif; ?>
		</div>
	</div>
	<div class="separator bottom"></div>
	<!-- // Widget END -->
	
</div>	
	
		
		</div>
		<!-- // Content END -->
<?php $app->view->stop(); ?>