   @include('admin.adminheader')
   {{-- <!-- partial -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- content-wrapper ends -->
    <section id="main-content">
      <section class="wrapper">
        <!-- //market-->
    <div class="agile-last-grids">
      <div class="col-md-4 agile-last-left">
        <div class="agile-last-grid">
          <div class="area-grids-heading">
            <h3>Users</h3>
          </div>
          <div id="graph7">
            <canvas id="report-chart"></canvas>
          </div>
          
          <script> 



 
    fetch("http://localhost:8000/api/questiondata").then(response=>response.json()).then((res)=>{
        // console.log(res);
        const labels = res.map(question => question.id);
        const scores = res.map(question => question.user_id);

        const ctx = document.getElementById('report-chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'id',
                    data: scores,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
                        
        });
       
  
          </script>
          

        </div>
      </div>
    </section></section> --}}
@include('admin.adminfooter')

