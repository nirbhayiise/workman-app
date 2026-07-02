 <?php  include 'header.php'; ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><!--<img src="images/logo.png" alt="Logo">-->24/7 WorkMan</a>
                    <a class="navbar-brand hidden" href="./"><!--<img src="images/logo2.png" alt="Logo">--> 24/7 WorkMan</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                 
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sevice Acceptance</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                        <?php
												include_once 'class.php';
												$user = new User();
												$res = $user->getrequrestList();
												
												while($row=mysqli_fetch_array($res))
												{
													$cat_id=$row['e_id'];
													$scan_flag=$row['scan_flag'];
													$cat_status = isset($row['cat_status']) ? $row['cat_status'] : '';
														$work_status=$row['work_status'];
															$cancellation_flag=$row['cancellation_flag'];
															$accept_tech=$row['accept_tech'];
													
												?>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card shadow-sm border-0 h-100" style="border-radius: 12px; overflow: hidden; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                                            <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                                                <strong class="text-primary">#<?php echo $row['e_id']; ?> <span class="text-muted" style="font-size: 0.8em;">(<?php echo $row['security_code']; ?>)</span></strong>
                                                <small class="text-muted"><i class="fa fa-calendar"></i> <?php echo date('M d, Y', strtotime($row['e_created'])); ?></small>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-dark mb-1 font-weight-bold"><?php echo $row['pro_name']; ?></h5>
                                                <h6 class="card-subtitle mb-3 text-info"><?php echo $row['s_name']; ?></h6>
                                                
                                                <div class="customer-info mb-3 p-2 rounded" style="background: #f8f9fa;">
                                                    <strong class="d-block mb-1 text-dark"><i class="fa fa-user"></i> <?php echo $row['c_first_name'].' '.$row['c_last_name']; ?></strong>
                                                    <div class="text-muted" style="font-size: 0.9em;">
                                                        <div><i class="fa fa-envelope-o"></i> <?php echo $row['c_email']; ?></div>
                                                        <div><i class="fa fa-phone"></i> <?php echo $row['c_phone']; ?></div>
                                                        <div class="mt-1"><i class="fa fa-map-marker"></i> <?php echo $row['c_address']; ?></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <strong class="text-dark" style="font-size:0.9em;">Details:</strong>
                                                    <p class="text-muted mb-0" style="font-size:0.85em; line-height:1.4;"><?php echo $row['details']; ?></p>
                                                </div>
                                                
                                                <div class="d-flex mb-3">
                                                    <a role="button" data-toggle="modal" data-target="#largeImgBox" style="cursor:pointer" class="mr-2">
                                                        <img onclick='$("#model_img").attr("src","<?php echo empty($row['photo1'])? 'https://workman247.com/serviceadmin/upload/defaultpic.jpg' : 'https://workman247.com/serviceadmin/upload/'.$row['photo1']; ?>")' src="<?php echo empty($row['photo1'])? 'https://workman247.com/serviceadmin/upload/defaultpic.jpg' : 'https://workman247.com/serviceadmin/upload/'.$row['photo1']; ?>" class="rounded shadow-sm" width="70" height="70" style="object-fit:cover; border: 2px solid #fff;" />
                                                    </a>
                                                    <a role="button" data-toggle="modal" data-target="#largeImgBox" style="cursor:pointer">
                                                        <img onclick='$("#model_img").attr("src","<?php echo empty($row['photo2'])? 'https://workman247.com/serviceadmin/upload/defaultpic.jpg' : 'https://workman247.com/serviceadmin/upload/'.$row['photo2']; ?>")' src="<?php echo empty($row['photo2'])? 'https://workman247.com/serviceadmin/upload/defaultpic.jpg' : 'https://workman247.com/serviceadmin/upload/'.$row['photo2']; ?>" class="rounded shadow-sm" width="70" height="70" style="object-fit:cover; border: 2px solid #fff;" />
                                                    </a>
                                                </div>

                                                <div class="status-actions mb-3">
                                                    <?php if($work_status=='1'){ ?>
                                                        <?php if($cancellation_flag==-1 && $accept_tech==-1){ ?>
                                                            <span class="badge badge-danger p-2 rounded-pill">Rejected By Technician</span>
                                                        <?php }else if($cancellation_flag==1 && $accept_tech==1){ ?>
                                                            <span class="badge badge-danger p-2 rounded-pill">Rejected By Customer</span>
                                                        <?php }else{ ?>
                                                            <span class="badge badge-warning p-2 rounded-pill text-white shadow-sm">Waiting</span>
                                                        <?php } ?>
                                                    <?php } else if($work_status=='2') { ?>
                                                        <span class="badge badge-primary p-2 rounded-pill shadow-sm">Alloted Tech Waiting</span>
                                                    <?php } else if($work_status=='3') { ?>
                                                        <span class="badge badge-info p-2 rounded-pill shadow-sm">Tech Accepted</span>
                                                    <?php } else if($work_status=='4') { ?>
                                                        <a class="btn btn-danger btn-sm text-light rounded-pill shadow-sm" onClick="faultanaly('<?php echo $cat_id;?>')"><i class="fa fa-wrench"></i> Fault Analysis</a>
                                                    <?php } else if($work_status=='5') { ?>
                                                        <span class="badge badge-success p-2 rounded-pill shadow-sm"><i class="fa fa-check"></i> Completed</span>
                                                    <?php } ?>
                                                </div>

                                                <hr style="border-color: rgba(0,0,0,0.05);">
                                                
                                                <div class="action-buttons d-flex flex-wrap" style="gap: 8px;">
                                                    <?php if($work_status=='4'){ ?>
                                                        <a class="btn btn-outline-success btn-sm rounded" onClick="faultanaly('<?php echo $cat_id;?>')">View Fault List</a>
                                                    <?php } ?>
                                                    
                                                    <?php if($work_status=='3'){ ?>
                                                        <a class="btn btn-outline-success btn-sm rounded" onClick="faultanaly('<?php echo $cat_id;?>')">View Fault Analysis</a>
                                                    <?php } ?>
                                                    
                                                    <?php if($work_status=='5'){ ?>
                                                        <a class="btn btn-outline-success btn-sm rounded" onClick="faultanaly('<?php echo $cat_id;?>')">Fault Analysis</a>
                                                        <a class="btn btn-outline-info btn-sm rounded" onClick="invoiceview('<?php echo $cat_id;?>')">Invoice</a>
                                                        <a class="btn btn-outline-secondary btn-sm rounded" onClick="feedbackview('<?php echo $cat_id;?>')">FeedBack</a>
                                                    <?php } ?>
                                                    
                                                    <?php if($cancellation_flag==1 && $accept_tech==1){ ?>
                                                        <a class="btn btn-outline-primary btn-sm rounded" onClick="vw('<?php echo $cat_id;?>')">Re-Assign</a>
                                                    <?php }else if($cancellation_flag==-1 && $accept_tech==-1){ ?>
                                                        <a class="btn btn-outline-primary btn-sm rounded" onClick="vw('<?php echo $cat_id;?>')">Re-Assign</a>
                                                    <?php }else{ ?>
                                                        <a class="btn btn-primary btn-sm rounded shadow-sm" onClick="vw('<?php echo $cat_id;?>')"><i class="fa fa-eye"></i> View</a>
                                                        <?php if($scan_flag=="0"){ ?>
                                                            <a class="btn btn-outline-secondary btn-sm rounded" onClick="byPassQR('<?php echo $cat_id;?>')">By Pass QR</a>
                                                        <?php }else{ ?>
                                                            <a class="btn btn-secondary btn-sm rounded text-light" style="pointer-events: none;" onClick="byPassQR('<?php echo $cat_id;?>')">QR Bypassed</a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                  <div class="modal animated zoomIn" id="largeImgBox" tabindex="-1" aria-labelledby="largeImgBox" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div style="text-align: right;padding: 0px 20px;font-size: 35px;line-height: 0px;">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                          </div>     
                          <div class="modal-body p-1">
                                <img id="model_img" src="data:image/jpeg;ba" width="100%" />
                          </div>
                        </div>
                      </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
              
                <!-- /Widgets -->
                <!--  Traffic  -->
            
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
      
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
          
                <!-- /To Do and Live Chat -->
                <!-- Calender Chart Weather  -->
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        
        <!-- Footer -->
       
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
<!-- Large Image Box -->

<div class="modal animated zoomIn" id="largeImgBox" tabindex="-1" aria-labelledby="largeImgBox" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div style="text-align: right;padding: 0px 20px;font-size: 35px;line-height: 0px;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>     
      <div class="modal-body p-1">
            <img id="model_img" src="data:image/jpeg;ba" class="img-fluid" />
      </div>
    </div>
  </div>
</div> 

<!-- End large image box -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    <script>
    
     function invoiceview(sid){
     
      window.location.href = "generateinvoice.php?id="+sid;
     
      
          }
          
           function feedbackview(sid){
     
      window.location.href = "viewfeedback.php?id="+sid;
     
      
          }
        function vw(sid){
     
      window.location.href = "requrestviewdeatils.php?id="+sid;
     
      
          }
            function byPassQR(sid){
   
     
        $.ajax({
     	url: 'UpdateQRScanStatus.php',
          		type: 'POST',
        
        		data:{reqId:sid},
        		success:function(data){
              alert(data);
              
                		}
                  });
                  location.reload();
      //window.location.href = "requrestviewdeatils.php?id="+sid;
     
      
          }
          
          function faultanaly(eid){
     
      window.location.href = "fault_analysis_admin.php?id="+eid;
     
      
          }
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
