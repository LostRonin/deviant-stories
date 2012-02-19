<!-- Start HTML - Horizontal Tabs -->

<body>


<div id="tabs_horizontal">                                                                                      				                               
                    
    <a href="#prev" class="prev"></a>                
    
    <div id="tabs_container">                                                                                                                                          
        
        <ul class="tabs">            
            <li><a href="#content_1" id="tab_1" class="tab active">A look back</a></li>
            <li><a href="#content_2" id="tab_2" class="tab">Delivery</a></li>
            <li><a href="#content_3" id="tab_2" class="tab">Test 1</a></li>
            <li><a href="#content_4" id="tab_2" class="tab">Test 2</a></li>
        </ul>                                                                                                
    
    </div> <!-- /#tabs_container -->
                    
    <a href="#next" class="next"></a>                                                                                             
    
    <div id="content">
    
        <div class="view_container">
                              
            <div id="content_1" class="tab_view">          
                <?php $chapters = ClassRegistry::init('Chapter')->getChapter(1,1); ?>
                
                <?php foreach ($chapters as $chapter): ?>

                    <p class="story_format"><?php echo nl2br(h($chapter['Chapter']['content'])); ?></p>
                
                    <?php if(!empty($chapter['Chapter']['image_class']))
                    { ?>   
                    
                    <span class="<?php echo $chapter['Chapter']['image_class']; ?>">                        
                        <?php echo $lightbox->img($chapter['Image']['small'], $chapter['Image']['large']); ?>
                    </span><?php } ?>

                <?php endforeach; ?>
                
                
                                                                                     
            </div>
            
    
            
            <div id="content_2" class="tab_view">          
                <?php $chapters = ClassRegistry::init('Chapter')->getChapter(1,2); ?>
                
                <?php foreach ($chapters as $chapter): ?>

                    <p class="story_format"><?php echo nl2br(h($chapter['Chapter']['content'])); ?></p>
                
                    <?php if(!empty($chapter['Chapter']['image_class']))
                    { ?>   
                    
                    <span class="<?php echo $chapter['Chapter']['image_class']; ?>">                        
                        <?php echo $lightbox->img($chapter['Image']['small'], $chapter['Image']['large']); ?>
                    </span><?php } ?>

                <?php endforeach; ?>  
            </div>
            
        
        </div> <!-- /#view_container --> 
     
    </div> <!-- /#content -->                                          

</div> <!-- /#tabs_horizontal -->        
<!-- End HTML - Horizontal Tabs -->


</body>