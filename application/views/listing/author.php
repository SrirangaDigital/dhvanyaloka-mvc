<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-12 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->
                <div class="flat-page">
                    <div class="col-md-3 clear-paddings subnav">
                       <ul class="">
                            <li><a class="active" href="<?=BASE_URL?>listing/books">Special Issues</a></li>
                            <li><a href="<?=BASE_URL?>The_Literary_Criterion/#Subscription">Subscription</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9 clear-paddings">
                        <!-- Breadcrumb will be inserted here -->
                        <ol class="breadcrumb">
                            <li>Home</li>
                            <li>The Literary Criterion</li>
                            <li>Special Issues</li>
                        </ol>

                        <h1><?=$data[0]['author']?></h1>
                        <h2>Written below list of Articles</h2>
                        <?=$viewHelper->displayTitles($data)?>
                        <div class="cover-image-carousel">

                        </div>
                    </div>                       
                </div>
            </div>
        </div>
