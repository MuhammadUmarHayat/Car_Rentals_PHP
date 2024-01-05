<?php
include("header.php");
include("nav.php");
include("carousel.php");
include 'config.php';
if(isset($_POST['submit']))// is clicked on submit button?
{
  //contactus form

$email = $_POST['email'];
$name = $_POST['name'];

  $msg = $_POST['msg'];
$msgDate=date("d/m/y");
$reply="";
$replyedBy="";


  $query="INSERT INTO `contactus`( `username`, `email`, `message`, `msgDate`, `reply`, `replyedBy`)
VALUES ('$name','$email','$msg','$msgDate','$reply','$replyedBy')";
$insert = mysqli_query($con,$query);//execute query
	
 
 
echo '<script>alert("Thanks for querying! you will be replyed very soon")</script>';

}


?>
   <main>
        <section id="about" class="about section-padding">

          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-12">
                <div class="about-img"> 
                  <br>
                  <img src="products/c2.jpg" alt="img-fluid">
                </div> 



              </div>

               <div class="col-lg-8 col-md-4 col-12 ps-lg-5 mt-md-5">
                      
                <div class="about-text">
                  <h2>We provide best Quality <br> Services ever</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates velit. Est iure illum deserunt magnam hic repudiandae praesentium optio maiores perspiciatis! Ex, exercitationem. Harum saepe ad exercitationem! Temporibus, aliquid!</p>
                  <a href="#" class="btn btn-warning">learn more</a>
                </div>
               </div>

            </div>
          </div>
        </section>

        <section id="services" class="sevices section-padding">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-header text-center pb-5">
                  <h2>Our  Services </h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates velit. <br> Est iure illum deserunt magnam hic repudiandae praesentium optio maiores perspiciatis! !</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="  col-12 col-md-12 col-lg-4">
                <div class="cars text-white text-center bg-dark pb-2">
                  <div class="card-body">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <h3 class="card-title">Best Quality</h3>
                    <p class="lead"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> <br> Recusandae eligendi mollitia unde accusantium aut omnis illo! Officiis, 
                      <button class="btn btn-warning text-dark">Read more</button>
                    </p>
                  </div>
                </div>
              </div>

              <div class="  col-12 col-md-12 col-lg-4">
                <div class="cars text-white text-center bg-dark pb-2">
                  <div class="card-body">
                    <i class="bi bi-stickies"></i>
                    <h3 class="card-title">Integrity</h3>
                    <p class="lead"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> <br> Recusandae eligendi mollitia unde accusantium aut omnis illo! Officiis
                      <button class="btn btn-warning text-dark">Read more</button>
                    </p>
                  </div>
                </div>
              </div>
              

              <div class="col-12 col-md-12 col-lg-4">
                <div class="cars text-white text-center bg-dark pb-2">
                  <div class="card-body">
                    <i class="bi bi-question-circle"></i>
                    <h3 class="card-title">Help</h3>
                    <p class="lead"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> <br> Recusandae eligendi mollitia unde accusantium aut omnis illo! Officiis
                      <button class="btn btn-warning text-dark">Read more</button>
                    </p>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </section>


        <section id="products" class="portfolio section-padding ">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-header text-center pb-5">
                  <h2>Our  projects </h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates velit. <br> Est iure illum deserunt magnam hic repudiandae praesentium optio maiores perspiciatis! !</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                     <img src="products/c1.jpg" alt="" class="img-fluid">
                    </div>
                    <h3 class="card-title">Tours</h3>
                    <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum ipsam nisi recusandae delectus iure ipsum voluptatem explicabo velit, consequatur neque?</p>
                    <button class="btn bg-warning text-dark">Learn more</button>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                     <img src="products/c3.jpg" alt="" class="img-fluid">
                    </div>
                    <h3 class="card-title">Super sonic</h3>
                    <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br> Eum ipsam nisi recusandae  delectus iure ipsum voluptatem explicabo velit,  consequatur neque?</p>
                    <button class="btn bg-warning text-dark">Learn more</button>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                     <img src="products/c4.jpg" alt="" class="img-fluid" >
                    </div>
                    <h3 class="card-title">Extra Comforts</h3>
                    <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit.  Eum ipsam nisi recusandae delectus iure ipsum voluptatem </p>
                    <button class="btn bg-warning text-dark">Learn more</button>
                  </div>
                </div>
              </div>

            </div>

            </div>
          </div>
        </section>

         <section id="portfolio" class="team section-padding">

          <div class="container">
         
            <div class="row">
              <div class="col-md-12">
                <div class="section-header text-center pb-5">
                  <h2>Port Folio </h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptates velit. <br> Est iure illum deserunt magnam hic repudiandae praesentium optio maiores perspiciatis! !</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="products/herbels.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">Tours</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique odit consequatur architecto accusamus incidunt consequuntur maxime nemo rerum  </p>
                    <p class="socials">
                      <i class="bi bi-twitter text-dark mx-1"></i>
                      <i class="bi bi-facebook text-dark mx-1"></i>
                      <i class="bi bi-linkedin text-dark mx-1"></i>
                      <i class="bi bi-instagram text-dark mx-1"></i>


                    </p>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="products/p4.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">Pick and Drop</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique odit consequatur architecto accusamus incidunt consequuntur maxime nemo rerum  </p>
                    <p class="socials">
                      <i class="bi bi-twitter text-dark mx-1"></i>
                      <i class="bi bi-facebook text-dark mx-1"></i>
                      <i class="bi bi-linkedin text-dark mx-1"></i>
                      <i class="bi bi-instagram text-dark mx-1"></i>
                    </p>
                  </div>
                </div>
              </div>


              <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="products/perfumes.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">Rentals</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique odit consequatur architecto accusamus incidunt consequuntur maxime nemo rerum  </p>
                    <p class="socials">
                      <i class="bi bi-twitter text-dark mx-1"></i>
                      <i class="bi bi-facebook text-dark mx-1"></i>
                      <i class="bi bi-linkedin text-dark mx-1"></i>
                      <i class="bi bi-instagram text-dark mx-1"></i>
                    </p>
                  </div>
                </div>
              </div>


              <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="products/fashion.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">Picnics</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique odit consequatur architecto accusamus incidunt consequuntur maxime nemo rerum  </p>
                    <p class="socials">
                      <i class="bi bi-twitter text-dark mx-1"></i>
                      <i class="bi bi-facebook text-dark mx-1"></i>
                      <i class="bi bi-linkedin text-dark mx-1"></i>
                      <i class="bi bi-instagram text-dark mx-1"></i>


                    </p>
                  </div>
                </div>
              </div>

            </div>
            
          </div>
         </section>


      <section id="contact" class="contact section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-header text-center pb-5">
                <h2> Contact </h2>
                <p>You can ask any question !</p>
              </div>
            </div>
          </div>
           <div class="row m-0">
            <div class="col-md-12 p-0 pt-4 pb-4">
              
              <form action="index.php" method="post" class="bg-light p-4.m-auto ">

                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="text" class="form-control" name="name" required placeholder="Your full name">
                    </div>
                  </div>
                
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" required placeholder="Your Email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <textarea  rows="3 required" class="form-control" name="msg"> Your query </textarea>
                    </div>
                  </div> 
                  <br>
                  <br> <br>
                
                  <button class="btn btn-warning btn-lg btn-block mt-3"  type="submit" name="submit">submit</button>
                
                </div>

              </form>
            
            </div>
           </div>
        </div>

    </section>
</main>
      
<?php
include("footer.php");
?>





