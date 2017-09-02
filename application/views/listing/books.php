<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-12 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->
                <div class="flat-page">
                    <div class="col-md-3 clear-paddings subnav">
                        <ul class="">
                            <li><a class="active" href="Special_Issues">Special Issues</a></li>
                            <li><a href="../The_Literary_Criterion/#Subscription">Subscription</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9 clear-paddings">
                        <!-- Breadcrumb will be inserted here -->
                        <ol class="breadcrumb">
                            <li>Home</li>
                            <li>The Literary Criterion</li>
                            <li>Special Issues</li>
                        </ol>

                        <h1>Special Issues</h1>
                        <h2>The Literary Criterion</h2>

                        <p>The Literary Criterion, the most influential journal as we all know, has made significant contribution to the growth of English studies in India. It has consistently promoted Indian writing in English and poetics, American Literature, Commonwealth Literature, Translation and the study of Regional literatures.</p>
                        <p>The special issues that figures here are 29 in number out of more than 35 produced in print. A sample of 3 such special issues, first three in order,</p>
                        <ol>
                            <li>F.R. Leavis Birth Centenary Essays</li>
                            <li>Problems Of Translation</li>
                            <li>Nobel Laureates In Literature</li>
                        </ol>

                        <p>are accessible for free view. If the subscribers are interested in other special issues, the may contact the editor to send the same by DD at Rs. 300/- each. The contents of all special issues are accessible.</p>

                        <div class="cover-image-carousel">

<?php foreach($data as $row) { ?>
                            <a href="<?=BASE_URL . 'listing/toc/'. $row['book_id']?>" title="<?=$row['btitle']?>">
                                <img src="<?=STOCK_IMAGE_URL . 'covers/' . $row['book_id'] . '.jpg'?>" class="img-responsive" alt="<?=$row['btitle']?>">
                                <p><?=$row['btitle']?></p>
                            </a>
<?php } ?>
                        </div>
                    </div>                       
                </div>
            </div>
        </div>