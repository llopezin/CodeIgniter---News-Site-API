<h2><?php echo $category; ?></h2>


<?php foreach($articles_by_category as $article) : ?>

    <span><cite><?php echo $article['author']; ?></cite></span>
    <span class="article-date"> <?php echo substr($article['date'], 0, -9); ?> </span>

	
<h3><a href="<?php echo base_url().'article'.$article['id']?>" target="_blank"><?php echo $article['title']; ?></a></h3>

        	




		
<?php endforeach; ?>