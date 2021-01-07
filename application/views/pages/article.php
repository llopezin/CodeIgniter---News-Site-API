
<h2><?php echo $article['title']; ?></h2>

<div class = 'date'><span class="article-date"> <?php echo substr($article['date'], 0, -9); ?> </span></div>

<p><cite><?php echo $article['author']; ?></cite></p>
<div class="image-wrap"><img src="<?php echo base_url()?>/assets/uploads/images/<?php echo $article['image']; ?>" alt="">
</div>
<?php echo $article['content']; ?>
	