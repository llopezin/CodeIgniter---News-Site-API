<!DOCTYPE html>
<head>
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>

<body>
<header>
    <nav>
        <ul>
        <li><a href="<?php echo base_url();?>/home">News</a></li>
            <li><a href="<?php echo base_url();?>/category/sports">Sports</a></li>
            <li><a href="<?php echo base_url();?>/category/art">Art</a></li>
            <li><a href="<?php echo base_url();?>/category/culture">Culture</a></li>
            <li><a href="<?php echo base_url();?>/category/health">Health</a></li>
            <li><a href="<?php echo base_url();?>/category/f1">f1</a></li>
            <li><a href="<?php echo base_url();?>/category/politics">Politics</a></li>
            <li><a href="<?php echo base_url();?>/category/wheather">Wheather</a></li>
            <li><a href="<?php echo base_url();?>/category/advice">Advice</a></li>
            <li><a href="<?php echo base_url();?>/category/economy">Economy</a></li>
            <li><a href="<?php echo base_url();?>/category/household">Household</a></li>
            <li><a href="<?php echo base_url();?>/category/travel">Travel</a></li>
            <li><button><a href="<?php echo base_url();?>content/add_article">Manage Content</a></button></li>
        </ul>
    </nav>

</header>


<main>



<h1>Edit, update or create content</h1>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>

