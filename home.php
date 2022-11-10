<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="info-text">
    

    <?php if(isset($_SESSION['loggedin'])) : ?>
        <div>
            <br>
            <p>Welcome back, <?=$_SESSION['name']?>!</p>
            <a href="index.php?page=profile"><i class="fas fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            <br>
            <br>
        </div>
    <?php endif; ?>


</div>

<div class="featured">
    <h2>Our Dawa</h2>
    <p>Home for all your medical needs.</p>

    <?php if(!isset($_SESSION['loggedin'])) : ?>
        <div>
            <br>
            <br>
            <a class="login-button" href="index.php?page=login">Login</a>
            <a class="register-button" href="index.php?page=register">Register</a>
        </div>
    <?php endif; ?>


</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>