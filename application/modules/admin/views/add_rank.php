								<div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
									<form method="POST" action="">
										<div class="kt-portlet__head kt-portlet__head--lg">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">Add Location <small>some text here...</small></h3>
											</div>
											<div class="kt-portlet__head-toolbar">
												<a href="<?php echo site_url('admin/rank');?>" class="btn btn-clean kt-margin-r-10">
													<i class="la la-arrow-left"></i>
													<span class="kt-hidden-mobile">Back</span>
												</a>
												<div class="btn-group">
													<a href="?action=continue">
														<input type="submit" name="add" class="btn btn-brand" value="Add"/>
													</a>													
													<button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<ul class="kt-nav">
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon flaticon2-reload"></i>
																	<span class="kt-nav__link-text">Save & continue</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon flaticon2-power"></i>
																	<span class="kt-nav__link-text">Save & exit</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon flaticon2-edit-interface-symbol-of-pencil-tool"></i>
																	<span class="kt-nav__link-text">Save & edit</span>
																</a>
															</li>
															<li class="kt-nav__item">
																<a href="#" class="kt-nav__link">
																	<i class="kt-nav__link-icon flaticon2-add-1"></i>
																	<span class="kt-nav__link-text">Save & add new</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-portlet__body">
												<div class="row">
													<div class="col-xl-3"></div>
													<div class="col-xl-6">
														<div class="kt-section kt-section--first">
															<div class="kt-section__body">
																<h3 class="kt-section__title kt-section__title-lg">Rank Info:</h3>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Rank</label>
																	<div class="col-9">
																		<input class="form-control" type="text" name="rank">
																	</div>
																</div>
															</div>
														</div>
														<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
														<div class="kt-section kt-section--last">
															<div class="kt-section__body">
																<h3 class="kt-section__title kt-section__title-lg">Security:</h3>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Login verification</label>
																	<div class="col-9">
																		<button type="button" class="btn btn-outline-primary btn-sm kt-margin-t-5 kt-margin-b-5">Setup login verification</button>
																		<span class="form-text text-muted">
																			After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
																			<a href="#" class="kt-link">Learn more</a>.
																		</span>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-3 col-form-label">Password reset verification</label>
																	<div class="col-9">
																		<div class="kt-checkbox-single">
																			<label class="kt-checkbox">
																				<input type="checkbox"> Require personal information to reset your password.
																				<span></span>
																			</label>
																		</div>
																		<span class="form-text text-muted">
																			For extra security, this requires you to confirm your email or phone number when you reset your password.
																			<a href="#" class="kt-link">Learn more</a>.
																		</span>
																	</div>
																</div>
																<div class="form-group row kt-margin-t-10 kt-margin-b-10">
																	<label class="col-3 col-form-label"></label>
																	<div class="col-9">
																		<button type="button" class="btn btn-outline-danger btn-sm kt-margin-t-5 kt-margin-b-5">Deactivate your account ?</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<div class="col-xl-3"></div>
											</div>
										</div>
									</form>
								</div>