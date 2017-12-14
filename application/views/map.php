<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alokasi Booth</title>
    <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
   <script src="assets/js/jquery.min.js" > </script>
   <script src="assets/js/d3.min.js" > </script>
   <script src="assets/js/bootstrap.min.js" ></script>
   <script src="assets/js/handlebars.js" ></script>
  </head>
  <body>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default ">
      <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Indonesia Fashion Week</a>
         </div>
         <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
               <li><a href="#">Home</a></li>
               <li class="active"><a href="#">Perhisasan</a></li>
               <li><a href="#">Pakaian</a></li>
               <li><a href="#">Aksesoris</a></li>
               <!-- <li><a href="#"><span class="glyphicon glyphicon-shopping-cart icon-large" aria-hidden="true"></span>Keranjang</a></li> -->
            </ul>
         </div><!--/.nav-collapse -->
         </div>
      </div>
    </nav>

    <!-- Begin page content -->

    <!-- Modal -->
    <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">

      </div>
      </div>
    </div>
  </div>
  <div class="container">
      <h2 class="center-align">Perhisasan</h2>
      <button id="reset">reset zoom</button>
      <div id="root" class="center-align"></div>
   </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Fashion Week 2018</p>
      </div>
    </footer>
    <!-- <script type="text/javascript" src="assets/dist/app.bundle.js"></script> -->
   <script type="text/javascript">
      var svg = d3.select('#root')
                  .append('svg')
                  .attr('width','1000px')
                  .attr('height', '800px')
                  .attr('x','0px')
                  .attr('y', '0px');
                  // .call()
      var g = svg.append("g");

      var zoom =  d3.zoom()
                     .scaleExtent([1 / 5, 4])
                     .on("zoom", function () {
                     g.transition()
                        .duration(400)
                        .attr("transform",  d3.event.transform);
                  })
      var arr_dt, template_body, template_header;

      $(function(){
         template_body = Handlebars.compile($('#spec_template').html());
         template_header = Handlebars.compile($('#modal_title_template').html());
      })

      svg.call(zoom);

      d3.json('/floorplan/index.php?/data/location', (error, dataset) => {
         g.selectAll('rect')
            .remove()
            .data(dataset.arr_prop)
            .enter()
            .append('rect')
            .attr('id', function(d) { return d.idx })
            .attr('transform', function(d) { return d.transform; } || 0)
            .attr('x',function(d) { return d.x - 100; })
            .attr('y',function(d) { return d.y - 100; } )
            .attr('fill',function(d) { return d.booth_state == "free"?d.fill:d.booth_state == "booked"?"yellow":"red"; })
            .attr('width',function(d) { return d.width; })
            .attr('height',function(d) { return d.height; })
            .attr('stroke', 'black')
            .on("click",handle_click)
      });

      function resetted() {
         svg.transition()
            .duration(400)
            .call(zoom.transform, d3.zoomIdentity);
      }

      d3.select("#reset")
        .on("click", resetted);

      function handle_click(d){
         $('.modal-body').html('');
         $('.modal-header').html('');
         d.btn = "Pesan";
         if(d.booth_state == 'sold'){
            var html_header = template_header({"title":"Booth Sudah Terjual"});
            $('.modal-header').html(html_header);
            $('#myModal').modal('show');
            return;
         }

         if(d.booth_state == 'booked'){
            d.btn = "Daftar Waitinglist";
            var html_header = template_header({"title":"Booth Sudah Dipesan"});
            var html_body = template_body(d);
            $('.modal-header').html(html_header);
            $('.modal-body').html(html_body);
            $('#myModal').modal('show');
            return;
         }
         var html_body = template_body(d);
         var html_header = template_header({"title":"Detail Booth"});
         $('.modal-body').html(html_body);
         $('.modal-header').html(html_header);
         $('#myModal').modal('show');
      }

   </script>
   <script id="spec_template" type="text/x-handlebars-template">
      <h4 class="modal-title">Booth No {{idx}}</h4>
         <table class="table">
            <tr>
               <td class="col-lg-2">Luas :</td>
               <td>{{booth_spec.luas}}</td>
            </tr>
            <tr>
               <td class="col-lg-2">listrik :</td>
               <td>{{booth_spec.listrik}}</td>
            </tr>
            <tr>
               <td class="col-lg-2">Meja :</td>
               <td>{{booth_spec.Meja}}</td>
            </tr>
            <tr>
               <td class="col-lg-2">Kursi :</td>
               <td>{{booth_spec.Kursi}}</td>
            </tr>
            <tr>
               <td class="col-lg-2">Harga :</td>
               <td>{{booth_price}}</td>
            </tr>
            <tr>
               <td colspan="2" align="right"><a href="<?=base_url()?>index.php?/pesan/index/{{idx}}" class="btn btn-primary">{{btn}}</a></td>
            </tr>
         </table>
   </script>

   <script id="modal_title_template" type="text/x-handlebars-template">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h2 class="modal-title">{{title}}</h2>
   </script>

  </body>
</html>
