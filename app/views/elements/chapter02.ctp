<!-- Start HTML - Horizontal Tabs -->

<body>


<div id="st_horizontal" class="st_horizontal">                                                                                      				                               

    <div class="st_tabs_container">
                    
        <a href="#prev" class="st_prev"></a>                
    
        <div class="st_slide_container">                                                                                                                                          
        
            <ul class="st_tabs">            
                <li><a href="#st_content_1" rel="tab_1" class="st_tab st_first_tab st_tab_active">Invasion of Castle Greymouth</a></li>
                <li><a href="#st_content_2" rel="tab_2" class="st_tab">The ultimate Prize</a></li>                  
            </ul>                                                                                                

        </div> <!-- /#st_slide_container -->
                    
    <a href="#next" class="st_next"></a>
    
    </div> <!-- /#st_tabs_container -->                                                                                             
    
    <div class="st_view_container">
    
        <div class="st_view">
                              
            <div id="st_content_1" class="st_tab_view st_first_tab_view">                
                <?php echo $html->para('story_format', $this->element('s02_c01'), null, false); ?>
            </div>                 
                
            <div id="st_content_2" class="st_tab_view">                
                <?php echo $html->para('story_format', $this->element('s02_c02'), null, false); ?>
            </div>            
    
        </div>  <!-- /#st_view_container -->
    
    </div> <!-- /#view_container --> 
     
                                          

</div> <!-- /#tabs_horizontal -->        
<!-- End HTML - Horizontal Tabs -->

</body>