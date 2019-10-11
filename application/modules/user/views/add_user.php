							<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<form class="form-horizontal" method="POST" action="">
											<div class="panel-body">
												<div class="form-group form-group-sm row" style="margin: auto;width: 100%;">
													<div class="col-xs-12 col-sm-4">
														<label for="last_name">Last Name:</label>
														<input class="form-control" type="text" name="last_name" id="last_name" value="" />
													</div>
													<div class="col-xs-12 col-sm-4">
														<label for="first_name">First Name:</label>
														<div>
															<input class="form-control" type="text" name="first_name" id="first_name" value="" />
														</div>
													</div>
													<div class="col-xs-12 col-sm-4">
														<label for="message-text" class="form-control-label">Middle Name:</label>
														<input class="form-control" name="middle_name">
													</div>
													<div class="col-xs-12 col-sm-6">
														<label for="message-text" class="form-control-label">Username:</label>
														<input type="text" class="form-control" name="username">
													</div>
													<div class="col-xs-12 col-sm-6">
														<label for="message-text" class="form-control-label">Email:</label>
														<input type="email" class="form-control" name="email">
													</div>
													<div class="col-xs-12 col-sm-6">
														<label for="message-text" class="form-control-label">Department:</label>
														<select class="form-control" name="department">
															<option></option>
															<?php foreach($department as $row){?>
																<option value="<?php echo $row->department;?>"><?php echo $row->department;?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col-xs-12 col-sm-6">
														<label for="message-text" class="form-control-label">Location:</label>
														<select class="form-control" name="location">
															<option></option>
															<?php foreach($location as $row){?>
																<option value="<?php echo $row->location;?>"><?php echo $row->location;?></option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<a href="?status=added">
													<input type="submit" name="add" class="btn btn-primary" value="Add"/>
												</a>
											</div>
										</form>
									</div>
								</div>
							</div>