<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-12 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->
                <div class="flat-page">
                    <div class="col-md-3 clear-paddings subnav">
                        <img src="<?=STOCK_IMAGE_URL . 'covers/' . $data[0]['book_id'] . '.jpg'?>" class="img-responsive" alt="<?=$data[0]['btitle']?>">                                
                    </div>
                    <div class="col-md-9 clear-paddings">
                        <!-- Breadcrumb will be inserted here -->
                        <ol class="breadcrumb">
                            <li>Home</li>
                            <li>The Literary Criterion</li>
                            <li>Special Issues</li>
                        </ol>

                        <h1><?=$data[0]['btitle']?></h1>
                        <h2>The Literary Criterion - A Special Issue</h2>
                        <?=$viewHelper->displayToc($data)?>
                        <div class="cover-image-carousel">

                        </div>
                    </div>                       
                </div>
            </div>
        </div>

<!-- <div class="container">
    <div class="row gap-above">
        <div class="col-sm-8 col-md-8 col-lg-8">
            
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <p><img class="img-thumbnail img-p" src="<?=STOCK_IMAGE_URL . '/covers/'. $data[0]['book_id'] . '.jpg'?>" alt="" /></p>
        </div>
    </div>
</div>    
 -->
