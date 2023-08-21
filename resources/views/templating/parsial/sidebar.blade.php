<div id="sidebar" class="app-sidebar">
<!-- BEGIN scrollbar -->
<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
<!-- BEGIN menu -->
<div class="menu">
					<div class="menu-profile">
						<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
							<div class="menu-profile-cover with-shadow"></div>
							<div class="menu-profile-image">
								<img src="img/user/user-13.jpg" alt="">
							</div>
							<div class="menu-profile-info">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										{{ Auth::user()->name }}
									</div>
									{{--  <div class="menu-caret ms-auto"></div>  --}}
								</div>
							</div>
						</a>
					</div>
					<div id="appSidebarProfileMenu" class="collapse">
						{{--  <div class="menu-item pt-5px">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-cog"></i></div>
								<div class="menu-text">Settings</div>
							</a>
						</div>  --}}
						{{--  <div class="menu-item">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
								<div class="menu-text"> Send Feedback</div>
							</a>
						</div>
						<div class="menu-item pb-5px">
							<a href="javascript:;" class="menu-link">
								<div class="menu-icon"><i class="fa fa-question-circle"></i></div>
								<div class="menu-text"> Helps</div>
							</a>
						</div>  --}}
						<div class="menu-divider m-0"></div>
					</div>
					<div class="menu-header">Navigation</div>
					<div class="menu-item">
						<a href="dashboard" class="menu-link">
							<div class="menu-icon">
								<i class="bi bi-grid"></i>
							</div>
							<div class="menu-text">Dashboard</div>
						</a>
					</div>
					<div class="menu-item has-sub">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
							<i class="fa fa-server"></i>
							</div>
							<div class="menu-text">Master Data</div>
							<div class="menu-caret"></div>
						</a>
		<div class="menu-submenu">
	    <div class="menu-item">
        <a class="menu-link" href="{{ route('operator.index') }}">
        <div class="menu-text">Data Operator</div>
        </a>
		</div>
		<div class="menu-item">
        <a class="menu-link" href="{{ route('equipment.index') }}">
        Data Equipment
         </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('location.index') }}">
                                    Data Location
                                  </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('factor.index') }}">
                                    Data Site Factor
                                   </a>

							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('customer.index') }}">
                                    Data Customer
                                    </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('site.index') }}">
                                    Data Site
                                  </a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="{{ route('users.index') }}">
                                    Data User
                                  </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('roles.index') }}">
                                    Roles User
                                  </a>
							</div>

						</div>
					</div>

                    <div class="menu-item has-sub">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
								<i class="bi bi-keyboard-fill"></i>
							</div>
							<div class="menu-text">Actual Data</div>
							<div class="menu-caret"></div>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
                    <a class="menu-link" href="{{ route('ritasi.index') }}">
                    Data Ritasi
                    </a>

							</div>

							<div class="menu-item">
                                <a class="menu-link" href="{{ route('rainslippery.index') }}">
                                    Data Rain & Slippery
                                  </a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="{{ route('statusunit.index') }}">
                                    Data Status Unit
                                  </a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="{{ route('breakdown.index') }}">
                                    Data Breakdown
                                  </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('fuel.index') }}">
                                    Data Fuel
                                   </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('hourmeter.index') }}">
                                    Data Hourmeter
                                   </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="{{ route('jointsurvey.index')}}">
                                    Data Joint Survey
                                  </a>
							</div>
							{{--  <div class="menu-item">
                                <a class="menu-link" href="#">
                                    Data Coal Expose
                                   </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="#">
                                    Data Drill
                                  </a>
							</div>
							<div class="menu-item">
                                <a class="menu-link" href="#">
                                    Data Payload
                                   </a>  --}}


                    </div>
                    </div>
                           <div class="menu-item has-sub">
                                    <a href="javascript:;" class="menu-link">
                                        <div class="menu-icon">
                                            <i class="bi bi-clipboard2-data-fill"></i>
                                        </div>
                                        <div class="menu-text">Plan Data</div>
                                        <div class="menu-caret"></div>
                                    </a>
                                    <div class="menu-submenu">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('planloader.index') }}">
                                                Plan Performance Loader
                                              </a>
                                        </div>
                                        <div class="menu-item">
                                          <a class="menu-link" href="{{ route('planhauler.index') }}">
                                              Plan Performance Hauler
                                            </a>
                                      </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('plansupport.index') }}">
                                                Plan Performance Support
                                              </a>
                                        </div>
                                        {{--  <div class="menu-item">
                                            <a class="menu-link" href="{{ route('planratio.index') }}">
                                                Plan Performance Fuel Ratio
                                              </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('planusage.index') }}">
                                                Plan Performance Fuel Usage
                                              </a>

                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('plandistance.index') }}">
                                                Plan Performance Distance
                                               </a>
                                        </div>  --}}
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('planweather.index') }}">
                                                Plan Performance Weather
                                              </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href=" {{ route('planproduksi.index') }}">
                                                Plan Performance Production
                                              </a>
                                        </div>

                                        </div>
                                      </div>
  <div class="menu-item has-sub">
  <a href="javascript:;" class="menu-link">
  <div class="menu-icon">
  <i class="bi bi-speedometer2"></i>
  </div>
 <div class="menu-text"> Report Data </div>
  <div class="menu-caret"></div>
  </a>
  <div class="menu-submenu">
  <div class="menu-item">
  <a class="menu-link" href="{{ route('hourly.index')  }}">
   Table Hourly
  </a>
   </div>
     {{--  <div class="menu-item">
   <a class="menu-link" href="{{ route('pca.index') }}">
    Production Capacity Analysis
    </a>
    </div>
    <div class="menu-item">
   <a class="menu-link" href="">
     Table Equiper
    </a>
   </div>  --}}
     {{--  <div class="menu-item">
       <a class="menu-link" href="">
    Table Summary
    </a>
    </div>
     <div class="menu-item">
      <a class="menu-link" href="">
      Month
      </a>
      </div>
  <div class="menu-item">
  <a class="menu-link" href="">
  Year
  </a>
   </div>
   <div class="menu-item">
    <a class="menu-link" href="#">
   Payload
     </a>

     </div>  --}}

     </div>
      </div>
     <div class="menu-item has-sub">
     <a href="javascript:;" class="menu-link">
      <div class="menu-icon">
      <i class="bi bi-gear-fill"></i>
     </div>
     <div class="menu-text"> Setup Data </div>
      <div class="menu-caret"></div>
     </a>
       <div class="menu-submenu">
      <div class="menu-item">
      <a class="menu-link" href="{{ route('time.index') }}" >
        Time Category
      </a>
    </div>
     {{--  <div class="menu-item">
      <a class="menu-link " href="{{ route('equipcategori.index') }}" >
     Equipment Category
      </a>
       </div>  --}}
      <div class="menu-item">
       <a class="menu-link" href="{{ route('dedicated.index') }}" >
        Dedicated Type
      </a>
      </div>
           {{--  <div class="menu-item">
         <a class="menu-link" href="{{ route('equipmodel.index') }}" >
           Equipment Model
            </a>
        </div>  --}}
     {{--  <div class="menu-item">
     <a class="menu-link" href="{{ route('faktor.index') }}" >
         Truck Factor Type
     </a>

    </div>  --}}
    {{--  <div class="menu-item">
  <a class="menu-link " href="{{ route('lokasi.index') }}" >
   Location Type
   </a>
   </div>  --}}
      <div class="menu-item">
     <a class="menu-link" href="{{ route('material.index') }}">
     Material Type
   </a>

  </div>
   <div class="menu-item">
    <a class="menu-link" href="{{ route('downtime.index') }}">
   Down Time Category
  </a>

 </div>
 <div class="menu-item">
 <a class="menu-link " href="{{ route('problem.index') }}" >
 Problem Type
 </a>

 </div>
 <div class="menu-item">
 <a class="menu-link" href="{{ route('shift.index') }}" >
 Shift Code
 </a>
</div>
     {{--  <div class="menu-item">
   <a class="menu-link" href="{{ route('performance.index') }}" >
         Plan Performance Item
   </a>

    </div>
     <div class="menu-item">

    <a class="menu-link" href="{{ route('activity.index') }}" >
     Plan Activity Type
    </a>  --}}

    </div>
    </div>
	</div>
	<!-- BEGIN minify-button -->
	<div class="menu-item d-flex">
	<a href="javascript:;" class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
	</div>
	<!-- END minify-button -->
	</div>
	<!-- END menu -->
</div>
<!-- END scrollbar -->
</div>

