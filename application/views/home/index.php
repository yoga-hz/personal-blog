	<section class="hero is-medium is-dark" id="bg-section">
	    <div class="hero-body">
	        <div class="container">
	            <h1 class="title is-1">
	                Yoga Hilmi's Blog 👋🏽
	            </h1>
	            <h2 class="subtitle is-3">
	                Welcome to my Personal Blog
	            </h2>
	        </div>
	    </div>
	</section>
	<div class="container">
	    <article>
	        <div class="columns">
	            <div class="column is-three-quarters-desktop is-three-quarters-tablet">
	                <section class="section">
	                    <h2 class="title is-2">📄 Posts</h2>
	                    <hr>
	                    <?php foreach ($posts as $row) : ?>
	                    <div class="box">
	                        <div class="level">
	                            <div class="level-left">
	                                <h4 class="title"><?= $row['title'] ?></h4>
	                            </div>
	                            <div class="level-right">
	                                <div class="tag"><i class="fas fa-tag"></i>&nbsp;<?= $row['category'] ?></div>
	                            </div>
	                        </div>
	                        <p class="content"><?= substr($row['post'], 0, 140) . "..." ?></p>
	                        <a href="<?= base_url() . "story/stories/" . $row['slug'] ?>" class="button is-info">Read more</a>
	                    </div>
	                    <?php endforeach; ?>
	                </section>
	            </div>

	            <div class="column is-one-quarter-desktop is-one-quarter-tablet ">
	                <div class="panel is-radiusless is-shadowless" style="margin-top: 1em;">
	                    <div class="panel-heading">
	                        Categories
	                    </div>
	                    <?php foreach ($category as $row) : ?>
	                    <a href="<?= base_url() ?>story/category/<?= $row['category'] ?>" class="panel-block">
	                        <span class="panel-icon">
	                            <i class="mdi mdi-chevron-right-circle"></i>
	                        </span>
	                        <?= ucfirst($row['category']) ?>
	                    </a>
	                    <?php endforeach; ?>
	                </div>

	            </div>
	        </div>
	    </article>
	</div>
	<footer class="footer has-background-dark has-text-white">
	    <div class="container">
	        <div class="level">
	            <div class="level-item has-text-centered">
	                <div>
	                    <p class="heading">Read</p>
	                    <p class="title has-text-white"><i class="mdi mdi-book-open"></i></p>
	                </div>
	            </div>
	            <div class="level-item has-text-centered">
	                <div>
	                    <p class="heading">Share</p>
	                    <p class="title has-text-white"><i class="mdi mdi-share-variant"></i></p>
	                </div>
	            </div>
	            <div class="level-item has-text-centered">
	                <div>
	                    <p class="heading">Like</p>
	                    <p class="title has-text-white"><i class="mdi mdi-thumb-up"></i></p>
	                </div>
	            </div>
	            <div class="level-item has-text-centered">
	                <div>
	                    <p class="heading">Comments</p>
	                    <p class="title has-text-white"><i class="mdi mdi-chat"></i></p>
	                </div>
	            </div>
	        </div>
	    </div>
	</footer> 