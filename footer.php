</main>
<footer class="footer mt-5">
<div class="container py-5">
<div class="row g-4">
<div class="col-md-4"><h5><?= e($settings['business_name'] ?? 'PowerLite') ?></h5><p>Reliable power backup, solar solutions and modern lighting products.</p></div>
<div class="col-md-2"><h6>Quick Links</h6><a href="<?= base_url('products.php') ?>">Products</a><a href="<?= base_url('about.php') ?>">About</a><a href="<?= base_url('offers.php') ?>">Offers</a><a href="<?= base_url('contact.php') ?>">Contact</a></div>
<div class="col-md-3"><h6>Categories</h6><a href="<?= base_url('category.php?slug=inverter-batteries') ?>">Inverter Batteries</a><a href="<?= base_url('category.php?slug=solar-batteries') ?>">Solar Batteries</a><a href="<?= base_url('category.php?slug=solar-lights') ?>">Solar Lights</a><a href="<?= base_url('category.php?slug=led-lights') ?>">LED Lights</a></div>
<div class="col-md-3"><h6>Contact</h6><p><?= e($settings['address'] ?? 'Your Business Address') ?><br><?= e($settings['phone'] ?? '+91 XXXXX XXXXX') ?><br><?= e($settings['email'] ?? 'info@example.com') ?></p></div>
</div><hr><div class="d-flex justify-content-between small"><span>© <?= date('Y') ?> <?= e($settings['business_name'] ?? 'PowerLite') ?></span><span>All Rights Reserved</span></div>
</div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</body></html>