<?=template_header('Place Order')?>

<div class="info-text">
    

    <?php if(isset($_SESSION['loggedin'])) : ?>
        <div>
            <br>
            <a href="index.php?page=profile"><i class="fas fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            <br>
            <br>
        </div>
    <?php endif; ?>


</div>

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
</div>

<?=template_footer()?>