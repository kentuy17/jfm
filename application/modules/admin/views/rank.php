							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											<?php if(isset($table_title)) echo $table_title;
												  else echo 'Table title'; ?>
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												<div class="dropdown dropdown-inline">
													<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="la la-download"></i> Export
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<ul class="kt-nav">
															<li class="kt-nav__section kt-nav__section--first">
																<span class="kt-nav__section-text">Choose an option</span>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-print"></i>
																	<span class="kt-nav__link-text">Print</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-copy"></i>
																	<span class="kt-nav__link-text">Copy</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-excel-o"></i>
																	<span class="kt-nav__link-text">Excel</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-text-o"></i>
																	<span class="kt-nav__link-text">CSV</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon la la-file-pdf-o"></i>
																	<span class="kt-nav__link-text">PDF</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
												&nbsp;
												<a href="<?php echo base_url('admin/rank?add') ?>">
													<button class="btn btn-brand btn-elevate btn-icon-sm" >
														<i class="la la-plus"></i>
														Add Rank
														<!--button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_1"> Launch Modal</button-->
													</button>
												</a>
											</div>
										</div>
									</div>
								</div>
								<form method="POST" action="">
									<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									    <div class="modal-dialog modal-dialog-centered" role="document">
									        <div class="modal-content">
									            <div class="modal-header">
									                <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
									                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
									            </div>
									            <div class="modal-body">
									                Are you sure you want to delete this rank?
									                <p class="debug-url"></p>
									            </div>
									            <div class="modal-footer">
									                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									                <a href="">
									                	<input type="submit" name="delete" class="btn btn-primary" value="Delete"/>
									                </a>
									            </div>
									        </div>
									    </div>
									</div>
								</form>
								<div class="kt-portlet__body" style="overflow-x: auto">
											<table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
										<thead>
											<tr>
												<th>ID</th>
												<th>Rank</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($ranks as $row):?>
											<tr>
												<td><?php echo $row->id;?></td>
												<td><?php echo $row->rank;?></td>
												<td nowrap>
													<a href="<?php echo base_url('admin/rank?edit&id='.$row->id);?>">
														<i class="fa fa-pen-alt"> </i>
													</a> &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
													<!--a href="#" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete">Delete record #23</a-->
													<a href="<?php echo base_url('admin/rank?delete&id='.$row->id);?>" data-href="" data-toggle="modal" data-target="#confirm-delete">
														<i class="fa fa-trash-alt"></i>
													</a>
													<script>
													    $('#confirm-delete').on('show.bs.modal', function(e) {
													        $(this).find('.btn-primary').attr('href', $(e.relatedTarget).data('href'));
													        
													        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-primary').attr('href') + '</strong>');
													    });
													</script>
												</td>
											</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
							</div>