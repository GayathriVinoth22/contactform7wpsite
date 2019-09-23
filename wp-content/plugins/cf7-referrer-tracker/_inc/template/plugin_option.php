

<div class="container">
   <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#home">Setting</a></li>
        <li><a data-toggle="pill" href="#menu1">Help</a></li>
  </ul>
  
   <div class="tab-content">
        <div id="home" class="tab-pane fade in active"  >
                <h3>Setting </h3> 
                                <p>Track following HTTP header's</p> <br>
                                
                        <form method="post"  >
                        <p style="display:inline;">Include HTTP header(s) in admin email</p>

                                <select name="include_http_header_in_admin_email">
                                        <option <?php echo $selectOption=="Automatic"?"selected":""; ?> value="Automatic">Automatic</option>
                                        <option <?php echo $selectOption=="Manual"?"selected":""; ?> value="Manual">Manual</option>
                                </select><br><br>
                                <?php
                                   $i=0;     
                                   while(sizeof($bitss_track_http_headers) > $i) {   
                                        $name= $bitss_track_http_headers[$i];   
                                        if(in_array($name,$cf7rt_selected_http_headers)){
                                                echo "<label><Input checked type='Checkbox' id='".strtolower($name)."' name='track_http_headers[]' 
                                                 value=". $name."> ".$name."</label></br>";
                                        }else{
                                                echo "<label><Input type='Checkbox' id='".strtolower($name)."' name='track_http_headers[]' 
                                                value=". $name."> ".$name."</label></br>";
                                        }
                                        $i=$i+1;   
                                   }                                   
                                  ?> 
                                  <br><?php
                                  submit_button(); 
                                ?>
                               <br>  

                         </form>       
            </div>
        <div id="menu1" class="tab-pane fade">
                <h3>Help</h3>
                        <div >
                                <div class="wrapconent">
                                        <h2><i> Steps to send Referer from Contact forms: </i></h2>
                                        <h3 style="display:inline">1.</h3> <p id="div1p"> Add hidden field in the contact form from which you wish to send referrer.</p> <br><br>
                                        <img src="<?php echo esc_url( plugins_url( 'img/hidden_val.JPG', __DIR__ )); ?>" style="margin-left: 8%;" alt="bitss" />

                                                <br>
                                                <strong style="margin-left: 4%; font-size: large">code :</strong>
                                                        <table style="align-content: center;margin-left: 5%;font-size: medium">
                                                                <tr><td>
                                                                        [hidden referer-page]</td>
                                                                </tr>
                                                                <tr><td>
                                                                        [hidden current-page] </td>
                                                                <tr>
                                                        </table>    
                                </div>

                                <div class="wrapconent">
                                        <h3 style="display:inline">2.</h3> <p id="div2p"> Add the hidden field calue in emails:   <br>
                                                <img src="<?php echo esc_url( plugins_url( 'img/refer.jpg', __DIR__ ) ); ?>" alt="bitss" /><br>
                                                <strong style="margin-left: 4%;font-size: large">code :</strong> 
                                                        <table style="align-content: center;margin-left: 5%;font-size: medium">
                                                                <tr><td>
                                                                        Referer: [referer-page]</td>
                                                                </tr>
                                                        </table>                                                              
                                                </p>
                                </div>

                                <div class="wrapconent">
                                        <h3 style="display:inline">3.</h3><p id="div3p"> Save and test.</p>
                                </div>
                        </div>
                 </div>
         </div>
</div>
