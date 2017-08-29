<h1>Fellowship</h1>
<h2>FASc: Fellow of the Indian Academy of Sciences</h2>

<div class="row">
    <div class="col-md-5">
        <nav>
        	<ul class="list-unstyled">
        		<li><a href="<?=BASE_URL . 'listing/fellows'?>">Present Fellows</a></li>
        		<li><a href="<?=BASE_URL . 'listing/fellows/women'?>">Present women Fellows</a></li>
                <li><a href="<?=BASE_URL . 'listing/fellows/deceased'?>">Deceased Fellows</a></li>
                <li><a href="<?=BASE_URL . 'listing/fellows/deceased,women'?>">Deceased women Fellows</a></li>
                <li><a href="<?=BASE_URL . 'listing/fellows/honorary'?>">Honorary Fellows</a></li>
                <li><a href="<?=BASE_URL . 'listing/fellows/deceased,honorary'?>">Deceased Honorary Fellows</a></li>
        	</ul>
        </nav>
    </div>
    <div class="col-md-6">
        <ul class="list-unstyled" style="margin-top: 20px">
            <li>
                <form method="post" action="<?=BASE_URL . 'search/fellow'?>" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-xs-2">Name</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label col-xs-2">Place</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" id="city" name="city" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="section" class="control-label col-xs-2">Section</label>
                        <div class="col-xs-10">
                            <select class="form-control" id="section" name="section">
                                <option value="">Select section</option>
                                <option value="Animal sciences">Animal sciences</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Earth &amp; planetary sciences">Earth &amp; planetary sciences</option>
                                <option value="Engineering &amp; technology">Engineering &amp; technology</option>
                                <option value="General biology">General biology</option>
                                <option value="Mathematical sciences">Mathematical sciences</option>
                                <option value="Medicine">Medicine</option>
                                <option value="Physics">Physics</option>
                                <option value="Plant sciences">Plant sciences</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="yearelected" class="control-label col-xs-2">Year</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" id="yearelected" name="yearelected" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <label for="togglePast"><input type="checkbox" id="togglePast"> Inlcude past Fellows</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="hidden" id="type" name="type" value="^$|^honorary$">
                            <button type="submit" class="btn btn-primary naked">Submit</button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <div class="col-md-1">&nbsp;</div>
</div>

<p class="gap-above-med">Choose from the above to retrieve corresponding list of profiles of Fellows, or use the search form below to retrieve profiles from list of present Fellows. Search may be performed by name or part of name of Fellow, place of work, section in which elected, and year of election, with an option to include past Fellows.</p>

<hr />

<h3>Information about nomination to the fellowship</h3>
<p>The <a href="<?=BASE_URL?>About_IASc/Statutes/#elections">process of election</a> of Fellows is described in the statutes.</p>
<ul>
    <li>Nomination forms are provided only to the Fellows and are not made available on the Academy website.</li>
    <li>Those pursuing research in India are eligible to be nominated.</li>
    <li>The last date for receipt of new nominations is 31st May.</li>
    <li>The Academy offers only fellowship and not membership against payment.</li>
</ul>
<p>List of founding fellows can be seen <a href="Founding_fellows">here.</a></p>
