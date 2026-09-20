<?php
require 'includes/header.php'; $slug=$_GET['slug']??'';$st=$pdo->prepare("SELECT * FROM categories WHERE slug=? AND active=1");$st->execute([$slug]);$c=$st->fetch();
if(!$c){http_response_code(404);die('Category not found');}
$title=$c['name']; $st=$pdo->prepare("SELECT p.*,c.name category FROM products p JOIN categories c ON c.id=p.category_id WHERE p.category_id=? AND p.active=1 ORDER BY p.id DESC");$st->execute([$c['id']]);$products=$st->fetchAll();
?>
<section class="page-head"><div class="container"><h1><?=e($c['name'])?></h1><p><?=e($c['description'])?></p></div></section><div class="container py-5"><div class="row g-4"><?php foreach($products as $p):include 'includes/product-card.php';endforeach;?></div></div>
<?php require 'includes/footer.php'; ?>