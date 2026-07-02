 <?php  include 'header.php'; ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><!--<img src="images/logo.png" alt="Logo">-->24/7 WorkMan</a>
                    <a class="navbar-brand hidden" href="./"><!--<img src="images/logo2.png" alt="Logo">-->24/7 WorkMan</a>
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
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">View Enquiry Details</div>
                        <div class="card-body card-block">
                              
                            <?php
												include_once 'class.php';
												$user = new User();
												$eid=$_GET['id'];
												
												
												$res = $user->getFetchRequrest($eid);
												$reqTechId=$res['alloted_technician_id'];
												$eId=$res['e_id'];

												
                            ?>
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    
                                    <div class="form-group">
                                         <label for="exampleFormControlTextarea1">Id</label>
                                    <div class="input-group">
                                       
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="ID" value="<?php echo $res['e_id'] ?>" name="ID" placeholder="ID" class="form-control" readonly>
                                    </div>
                                     </div>
                                    
                                     <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Service Name</label>
                                     <div class="input-group">
                                     
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" value="<?php echo $res['s_name'] ?>"  placeholder="Service Name" class="form-control" readonly>
                                    </div>
                                     </div>
                                    
                                     <div class="form-group">
                                           <label for="exampleFormControlTextarea1">Cust. First Name</label>
                                     <div class="input-group">
                                      
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" value="<?php echo $res['c_first_name'] ?>"  placeholder="Cust. First Name" class="form-control" readonly>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Cust. Last Name</label>
                                     <div class="input-group">
                                    
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" value="<?php echo $res['c_last_name'] ?>"  placeholder="Cust. Last Name" class="form-control" readonly>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                                           <label for="exampleFormControlTextarea1">Email</label>
                                     <div class="input-group">
                                     
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" value="<?php echo $res['c_email'] ?>" placeholder="Email" class="form-control" readonly>
                                    </div>
                                     </div>
                                    
                                          <div class="form-group">
                                               <label for="exampleFormControlTextarea1">Phone Number</label>
                                    <div class="input-group">
                                       
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" value="<?php echo $res['c_phone'] ?>" placeholder="Phone Number" class="form-control" readonly>
                                    </div>
                                     </div>
                                    
                                       <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Details</label>
                                    <div class="input-group">
                                     
                                              <textarea  class="form-control" id="exampleFormControlTextarea1" name="des" rows="3" readonly><?php echo $res['details'] ?></textarea>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                         <label for="exampleFormControlTextarea1">Please allot Technician by Admin Only.</label>
                                    <div class="input-group">
                                       
                                         <select name="Professional" id="Professional" class="form-control-sm form-control">
                                                <option value="0">Please Select Technician</option>
                                              <?php
													include_once 'class.php';
													$user = new User();
													$res = $user->getTech();
													while($row=mysqli_fetch_array($res))
													{?>
													<option value="<?php echo $row['t_id'];?>"><?php echo $row['tech_name'];?></option>
													<?php
													$tId=$row['t_id'];
													
													?>
													<?php } ?>
													
                                            </select>
                                            <input type='hidden' id='myhidden' value='<?php echo $_POST['Professional']; ?>'>
                                    </div>
                                </div>
                                    
                                    
  
                                   
                                   
                                </div>
                                
                                <?php
                                
                                if($reqTechId>0)
                                {
                                ?>
                                 <input type="hidden" id="techidheddin" name="techidheddin" value="<?php echo $reqTechId; ?>">
                                                                 <div class="form-actions form-group"><button onClick = " getSelectId('<?php echo $reqTechId; ?>')" class="btn btn-success btn-sm">View Fault Analysis</button></div>
                                                               
                                                               <?php 
                                }else {?>
                                <div class="form-actions form-group"><button onClick = "assignedTech('<?php echo $eId;  ?>')" class="btn btn-success btn-sm">Accepted / Assign Technician</button></div>
                                <?php } ?>
                            </form>
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
   
   // var inputVal = document.getElementById("techidheddin").value;
  
      function assignedTech(reqId){
var e = document.getElementById("Professional");
var techId = e.options[e.selectedIndex].value;
  



alert(techId);

       //  alert(inputVal);
      $.ajax({
     	url: 'asssignedTech.php',
           		type: 'POST',
        
        		data:{techId:techId,reqId:reqId},
        		success:function(data){
             alert(data);
              
                		}
                  });
                  location.reload();
               // event.preventDefault(); 
              
      
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
