<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    
    
    <div class="col-xs-12">
    <body>
	<nav class="navbar navbar-fixed">
           
<!-- NAVIGATION BAR -->
	
	<ul class="nav navbar-nav navbar-left">
		<a href="#myLocation" class="thumbnail img-rounded" data-toggle="modal" 
		style="background-image:url('image/Tie-Dye-Wallpaper.jpg'); padding:5px;">
                
                <img class="img-responsive" src="image/zc_location.png" alt="Locate Us!">
                </a>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<a href="#contactUs" class="thumbnail img-rounded" data-toggle="modal"
		style="background-image:url('image/Tie-Dye-Wallpaper.jpg'); padding:5px;">
		
		<img class="img-responsive" src="image/zc_contact.png" alt="Contact Us!">
		</a>
	</ul>
	<!--
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#myLocation" data-toggle="modal" style="padding-left:40px;">
                <span class="glyphicon glyphicon-globe"></span> <b>Locate Us!</b></a></li>
            </ul>
	
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#myModal" data-toggle="modal" style="padding-right: 40px;">
                <span class="glyphicon glyphicon-envelope"></span><b> Contact us!</b></a></li>
            </ul>
        -->
        

        </nav>      

        
            
                <div class="modal fade" id="myLocation" role="dialog">
                    <div class="modal-dialog img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
                        <div class="modal-content">
                        
                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-primary text-center">Locations</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="panel panel-default">
                                    <div class="panel-body text-justify">
                                    
                                        <div class="well">
                                            <a href="https://www.google.com/maps/place/584+Haight+St,+San+Francisco,+CA+94117/
                                               @37.7698259,-122.4522997,17z/data=!3m1!4b1!4m5!3m4!1s0x80858752532a6feb:0x378fa
                                               573b65f1729!8m2!3d37.7698259!4d-122.450111"
                                               target="_blank">
                                            <p><b>Come visit our Store!</b></p></a>
                                            <p>584 Haight St.</p>
                                            <p>San Francisco, CA 94117</p>
                                            <p>phone number</p>
                                        </div>
                                        
                                        <div class="well">
                                            <p>We are also at these shows! Come say hello!</p>
                                            <p>Date: </p>
                                            <p>Show address</p>
                                            <p>Booth number:</p>
                                        </div>
                                        
                                    </div> <!-- panel-body -->
                                </div> <!-- panel-dfault --> 
                            </div> <!-- modal-body -->
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-envelope"></span> Contact Us</button>
                            </div>
                            
                    </div> <!-- modal-content -->
                </div> <!-- modal-dialog -->
            </div> <!-- modal-fade -->
            
            <form action="email/" method="POST">
            <div class="modal fade" id="contactUs" role="dialog">
                    <div class="modal-dialog img-rounded" style="background-image:url('../image/Tie-Dye-Wallpaper.jpg'); padding:15px;">
                        <div class="modal-content">
                        
                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-primary text-center">How can we help you?</h4>
                            </div>
                            
                            
                            <div class="modal-body">
                                <div class="panel panel-default">
                                    <div class="panel-body text-justify">
                                    
                                        
                                        	<div class="form-group">
                                        		<label for="customer_contact">Your contact:</label>
                                        		<input type="email" class="form-control" id="customer_contact" 
                                        			name="customer_contact" placeholder="Enter your e-mail address" required>
                                        	</div>
                                        	<div class="form-group">
                                        		<label for="body">How can we help you?</label>
                                        		<textarea class="form-control" rows="10" id="body" name="body" required></textarea>
                                        	</div>
                                        
                                        
                                    </div> <!-- panel-body -->
                                </div> <!-- panel-dfault --> 
                            </div> <!-- modal-body -->
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-envelope"></span> Contact Us</button>
                            </div>
                            
                    </div> <!-- modal-content -->
                </div> <!-- modal-dialog -->
            </div> <!-- modal-fade -->
	    </form>
	    
</div> <!-- col-xs-12 -->
</body>
</html>