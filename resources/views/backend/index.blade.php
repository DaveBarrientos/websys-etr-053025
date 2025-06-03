@extends('backend.layouts.master') 
@section('title','NATIONAL BOOK STORE DASHBOARD') 
@section('main-content') 
<div class="container-fluid"> 
    @include('backend.layouts.notification') 
     
    <!-- Modern Page Header --> 
    <div class="row mb-4"> 
        <div class="col-12"> 
            <div class="d-flex align-items-center justify-content-between"> 
                <div> 
                    <h1 class="h3 mb-1 text-gray-800 font-weight-bold"> National Book Store 
Dashboard</h1> 
                     
                </div> 
                <div class="text-right"> 
                    <small class="text-muted">Last updated: <span id="lastUpdated"></span></small> 
                </div> 
            </div> 
        </div> 
    </div> 
 
    <!-- Enhanced Stats Cards with School Supplies Theme --> 
    <div class="row mb-4"> 
        <!-- Total Orders Card --> 
        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-0 shadow-sm h-100 stats-card" style="border-left: 4px solid 
#dc3545 !important;"> 
                <div class="card-body p-4"> 
                    <div class="d-flex align-items-center"> 
                        <div class="flex-grow-1"> 
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-2 
letter-spacing">Total Orders</div> 
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ 
\App\Models\Order::countActiveOrder() }}</div> 
                            <div class="text-xs text-success mt-1"> 
                                <i class="fas fa-arrow-up"></i> Active orders 
                            </div> 
                        </div> 
                        <div class="ml-3"> 
                            <div class="icon-circle bg-danger"> 
                                <i class="fas fa-receipt text-white"></i> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
 
        <!-- Products Card --> 
        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-0 shadow-sm h-100 stats-card" style="border-left: 4px solid 
#dc3545 !important;"> 
                <div class="card-body p-4"> 
                    <div class="d-flex align-items-center"> 
                        <div class="flex-grow-1"> 
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-2 
letter-spacing">Products Available</div> 
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ 
\App\Models\Product::countActiveProduct() }}</div> 
                            <div class="text-xs text-success mt-1"> 
                                <i class="fas fa-box"></i> Items in stock 
                            </div> 
                        </div> 
                        <div class="ml-3"> 
                            <div class="icon-circle bg-danger"> 
                                <i class="fas fa-boxes text-white"></i> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
 
        <!-- Categories Card --> 
        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-0 shadow-sm h-100 stats-card" style="border-left: 4px solid 
#dc3545 !important;"> 
                <div class="card-body p-4"> 
                    <div class="d-flex align-items-center"> 
                        <div class="flex-grow-1"> 
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-2 
letter-spacing">Categories</div> 
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ 
\App\Models\Category::countActiveCategory() }}</div> 
                            <div class="text-xs text-danger mt-1"> 
                                <i class="fas fa-tags"></i> Active categories 
                            </div> 
                        </div> 
                        <div class="ml-3"> 
                            <div class="icon-circle bg-danger"> 
                                <i class="fas fa-tags text-white"></i> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
 
        <!-- Reviews Card --> 
        <div class="col-xl-3 col-md-6 mb-4"> 
            <div class="card border-0 shadow-sm h-100 stats-card" style="border-left: 4px solid 
#dc3545 !important;"> 
                <div class="card-body p-4"> 
                    <div class="d-flex align-items-center"> 
                        <div class="flex-grow-1"> 
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-2 
letter-spacing">Customer Reviews</div> 
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ 
\App\Models\ProductReview::count() }}</div> 
                            <div class="text-xs text-warning mt-1"> 
                                <i class="fas fa-star"></i> Customer ratings 
                            </div> 
                        </div> 
                        <div class="ml-3"> 
                            <div class="icon-circle bg-danger"> 
                                <i class="fas fa-star text-white"></i> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
 
    <!-- Order Status Section --> 
    <div class="row mb-4"> 
        <div class="col-12"> 
            <div class="card border-0 shadow-sm"> 
                <div class="card-header bg-gradient-danger text-white border-0"> 
                    <h6 class="m-0 font-weight-bold text-white"> 
                        <i class="fas fa-chart-line mr-2"></i> Order Status Overview 
                    </h6> 
                </div> 
                <div class="card-body p-4"> 
                    <div class="row"> 
                        <!-- New Orders --> 
                        <div class="col-xl-3 col-md-6 mb-3"> 
                            <div class="order-status-card new-orders"> 
                                <div class="d-flex align-items-center justify-content-between"> 
                                    <div> 
                                        <div class="status-label">New Orders</div> 
                                        <div class="status-count">{{ 
\App\Models\Order::countNewReceivedOrder() }}</div> 
                                    </div> 
                                    <div class="status-icon"> 
                                        <i class="fas fa-shopping-cart"></i> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
 
                        <!-- Processing Orders --> 
                        <div class="col-xl-3 col-md-6 mb-3"> 
                            <div class="order-status-card processing-orders"> 
                                <div class="d-flex align-items-center justify-content-between"> 
                                    <div> 
                                        <div class="status-label">Being Prepared</div> 
                                        <div class="status-count">{{ 
\App\Models\Order::countProcessingOrder() }}</div> 
                                    </div> 
                                    <div class="status-icon"> 
                                        <i class="fas fa-box-open"></i> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
 
                        <!-- Delivered Orders --> 
                        <div class="col-xl-3 col-md-6 mb-3"> 
                            <div class="order-status-card delivered-orders"> 
                                <div class="d-flex align-items-center justify-content-between"> 
                                    <div> 
                                        <div class="status-label">Delivered</div> 
                                        <div class="status-count">{{ 
\App\Models\Order::countDeliveredOrder() }}</div> 
                                    </div> 
                                    <div class="status-icon"> 
                                        <i class="fas fa-shipping-fast"></i> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
 
                        <!-- Cancelled Orders --> 
                        <div class="col-xl-3 col-md-6 mb-3"> 
                            <div class="order-status-card cancelled-orders"> 
                                <div class="d-flex align-items-center justify-content-between"> 
                                    <div> 
                                        <div class="status-label">Cancelled</div> 
                                        <div class="status-count">{{ 
\App\Models\Order::countCancelledOrder() }}</div> 
                                    </div> 
                                    <div class="status-icon"> 
                                        <i class="fas fa-ban"></i> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
 
    <!-- Charts Section --> 
    <div class="row"> 
        <!-- Enhanced Earnings Chart --> 
        <div class="col-xl-8 col-lg-7"> 
            <div class="card border-0 shadow-sm mb-4"> 
                <div class="card-header bg-white border-0 py-3"> 
                    <div class="d-flex align-items-center justify-content-between"> 
                        <h6 class="m-0 font-weight-bold text-danger"> 
                            <i class="fas fa-chart-area mr-2"></i> Sales Revenue 
                        </h6> 
                         
                    </div> 
                </div> 
                <div class="card-body"> 
                    <div class="chart-area"> 
                        <canvas id="myAreaChart"></canvas> 
                    </div> 
                </div> 
            </div> 
        </div> 
 
        <!-- Enhanced Users Chart --> 
        <div class="col-xl-4 col-lg-5"> 
            <div class="card border-0 shadow-sm mb-4"> 
                <div class="card-header bg-white border-0 py-3"> 
                    <h6 class="m-0 font-weight-bold text-danger"> 
                        <i class="fas fa-users mr-2"></i> New Customers (Last 7 Days) 
                    </h6> 
                </div> 
                <div class="card-body" style="overflow:hidden"> 
                    <div id="pie_chart" style="width:100%; height:320px;"></div> 
                </div> 
            </div> 
        </div> 
    </div> 
 
    <!-- Quick Actions Section --> 
    <div class="row mt-4"> 
        <div class="col-12"> 
            <div class="card border-0 shadow-sm"> 
                <div class="card-header bg-gradient-danger text-white border-0"> 
                    <h6 class="m-0 font-weight-bold text-white"> 
                        <i class="fas fa-bolt mr-2"></i> Quick Store Actions 
                    </h6> 
                </div> 
                <div class="card-body p-4"> 
                    <div class="row"> 
                        <div class="col-md-3 col-sm-6 mb-3"> 
                            <a href="{{ route('product.create') }}" class="btn btn-outline-danger btn-block"> 
                                <i class="fas fa-plus mr-2"></i>Add New Product 
                            </a> 
                        </div> 
                        <div class="col-md-3 col-sm-6 mb-3"> 
                            <a href="{{ route('order.index') }}" class="btn btn-outline-danger btn-block"> 
                                <i class="fas fa-receipt mr-2"></i>View Orders 
                            </a> 
                        </div> 
                        <div class="col-md-3 col-sm-6 mb-3"> 
                            <a href="{{ route('category.create') }}" class="btn btn-outline-danger 
btn-block"> 
                                <i class="fas fa-tags mr-2"></i>Add Category 
                            </a> 
                        </div> 
                        <div class="col-md-3 col-sm-6 mb-3"> 
                            <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-block"> 
                                <i class="fas fa-users mr-2"></i>Manage Customers 
                            </a> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
 
<style> 
/* Enhanced Dashboard Styles with Red Theme */ 
.stats-card { 
    transition: all 0.3s ease; 
    background: linear-gradient(135deg, #fff 0%, #fff5f5 100%); 
} 
 
.stats-card:hover { 
    transform: translateY(-5px); 
    box-shadow: 0 0.5rem 1rem rgba(220, 53, 69, 0.15) !important; 
} 
 
.icon-circle { 
    width: 3rem; 
    height: 3rem; 
    border-radius: 50%; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    font-size: 1.2rem; 
} 
 
.letter-spacing { 
    letter-spacing: 0.05rem; 
} 
 
.order-status-card { 
    background: white; 
    border-radius: 10px; 
    padding: 1.5rem; 
    margin-bottom: 1rem; 
    border-left: 4px solid #e3e6f0; 
    transition: all 0.3s ease; 
} 
 
.order-status-card:hover { 
    transform: translateY(-2px); 
    box-shadow: 0 0.25rem 0.5rem rgba(220, 53, 69, 0.1); 
} 
 
.new-orders { 
    border-left-color: #dc3545 !important; 
} 
 
.processing-orders { 
    border-left-color: #fd7e14 !important; 
} 
 
.delivered-orders { 
    border-left-color: #28a745 !important; 
} 
 
.cancelled-orders { 
    border-left-color: #6c757d !important; 
} 
 
.status-label { 
    font-size: 0.875rem; 
    font-weight: 600; 
    color: #5a5c69; 
    text-transform: uppercase; 
    letter-spacing: 0.05rem; 
} 
 
.status-count { 
    font-size: 1.75rem; 
    font-weight: 700; 
    color: #2c3e50; 
    margin-top: 0.25rem; 
} 
 
.status-icon { 
    font-size: 1.5rem; 
    color: #858796; 
} 
 
.new-orders .status-icon { 
    color: #dc3545; 
} 
 
.processing-orders .status-icon { 
    color: #fd7e14; 
} 
 
.delivered-orders .status-icon { 
    color: #28a745; 
} 
 
.cancelled-orders .status-icon { 
    color: #6c757d; 
} 
 
.bg-gradient-danger { 
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); 
} 
 
.card { 
    border-radius: 0.75rem; 
} 
 
.btn { 
    border-radius: 0.5rem; 
    font-weight: 600; 
    transition: all 0.3s ease; 
} 
 
.btn:hover { 
    transform: translateY(-1px); 
} 
 
.btn-outline-danger:hover { 
    background-color: #dc3545; 
    border-color: #dc3545; 
    color: white; 
} 
 
.text-danger { 
    color: #dc3545 !important; 
} 
 
@media (max-width: 768px) { 
    .stats-card { 
        margin-bottom: 1rem; 
    } 
     
    .order-status-card { 
        margin-bottom: 0.5rem; 
    } 
} 
</style> 
 
<script> 
// Update timestamp 
document.getElementById('lastUpdated').textContent = new Date().toLocaleTimeString(); 
 
// Refresh timestamp every minute 
setInterval(function() { 
    document.getElementById('lastUpdated').textContent = new Date().toLocaleTimeString(); 
}, 60000); 
</script> 
 
@endsection 
 
@push('scripts') 
<script src="https://unpkg.com/axios/dist/axios.min.js"></script> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
{{-- pie chart --}} 
<script type="text/javascript"> 
  var analytics = <?php echo $users; ?> 
 
  google.charts.load('current', {'packages':['corechart']}); 
  google.charts.setOnLoadCallback(drawChart); 
 
  function drawChart() 
  { 
      var data = google.visualization.arrayToDataTable(analytics); 
      var options = { 
          title: 'New Customer Registration Trends', 
          titleTextStyle: { 
              fontSize: 16, 
              fontName: 'Nunito', 
              color: '#5a5c69' 
          }, 
          backgroundColor: 'transparent', 
          chartArea: { 
              left: 20, 
              top: 40, 
              width: '90%', 
              height: '80%' 
          }, 
          colors: ['#dc3545', '#fd7e14', '#ffc107', '#28a745', '#6c757d'], 
          legend: { 
              position: 'bottom', 
              textStyle: { 
                  fontSize: 12, 
                  fontName: 'Nunito' 
              } 
          } 
      }; 
      var chart = new google.visualization.PieChart(document.getElementById('pie_chart')); 
      chart.draw(data, options); 
  } 
</script> 
{{-- line chart --}} 
<script type="text/javascript"> 
    const url = "{{route('product.order.income')}}"; 
    Chart.defaults.global.defaultFontFamily = 'Nunito', 
'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'; 
    Chart.defaults.global.defaultFontColor = '#858796'; 
 
    function number_format(number, decimals, dec_point, thousands_sep) { 
      number = (number + '').replace(',', '').replace(' ', ''); 
      var n = !isFinite(+number) ? 0 : +number, 
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals), 
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep, 
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point, 
        s = '', 
        toFixedFix = function(n, prec) { 
          var k = Math.pow(10, prec); 
          return '' + Math.round(n * k) / k; 
        }; 
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.'); 
      if (s[0].length > 3) { 
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep); 
      } 
      if ((s[1] || '').length < prec) { 
        s[1] = s[1] || ''; 
        s[1] += new Array(prec - s[1].length + 1).join('0'); 
      } 
      return s.join(dec); 
    } 
 
    var ctx = document.getElementById("myAreaChart"); 
 
    axios.get(url) 
          .then(function (response) { 
            const data_keys = Object.keys(response.data); 
            const data_values = Object.values(response.data); 
            var myLineChart = new Chart(ctx, { 
              type: 'line', 
              data: { 
                labels: data_keys, 
                datasets: [{ 
                  label: "Sales Revenue", 
                  lineTension: 0.3, 
                  backgroundColor: "rgba(220, 53, 69, 0.05)", 
                  borderColor: "rgba(220, 53, 69, 1)", 
                  pointRadius: 3, 
                  pointBackgroundColor: "rgba(220, 53, 69, 1)", 
                  pointBorderColor: "rgba(220, 53, 69, 1)", 
                  pointHoverRadius: 3, 
                  pointHoverBackgroundColor: "rgba(220, 53, 69, 1)", 
                  pointHoverBorderColor: "rgba(220, 53, 69, 1)", 
                  pointHitRadius: 10, 
                  pointBorderWidth: 2, 
                  data: data_values, 
                }], 
              }, 
              options: { 
                maintainAspectRatio: false, 
                layout: { 
                  padding: { 
                    left: 10, 
                    right: 25, 
                    top: 25, 
                    bottom: 0 
                  } 
                }, 
                scales: { 
                  xAxes: [{ 
                    time: { 
                      unit: 'date' 
                    }, 
                    gridLines: { 
                      display: false, 
                      drawBorder: false 
                    }, 
                    ticks: { 
                      maxTicksLimit: 7 
                    } 
                  }], 
                  yAxes: [{ 
                    ticks: { 
                      maxTicksLimit: 5, 
                      padding: 10, 
                      callback: function(value, index, values) { 
                        return '₱' + number_format(value); 
                      } 
                    }, 
                    gridLines: { 
                      color: "rgb(234, 236, 244)", 
                      zeroLineColor: "rgb(234, 236, 244)", 
                      drawBorder: false, 
                      borderDash: [2], 
                      zeroLineBorderDash: [2] 
                    } 
                  }], 
                }, 
                legend: { 
                  display: false 
                }, 
                tooltips: { 
                  backgroundColor: "rgb(255,255,255)", 
                  bodyFontColor: "#858796", 
                  titleMarginBottom: 10, 
                  titleFontColor: '#6e707e', 
                  titleFontSize: 14, 
                  borderColor: '#dddfeb', 
                  borderWidth: 1, 
                  xPadding: 15, 
                  yPadding: 15, 
                  displayColors: false, 
                  intersect: false, 
                  mode: 'index', 
                  caretPadding: 10, 
                  callbacks: { 
                    label: function(tooltipItem, chart) { 
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ''; 
                      return datasetLabel + ': $' + number_format(tooltipItem.yLabel); 
                    } 
                  } 
                } 
              } 
            }); 
          }) 
          .catch(function (error) { 
          console.log(error) 
          }); 
</script> 
@endpush